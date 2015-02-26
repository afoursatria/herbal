<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	const ERROR_USERNAME_INACTIVE=1;

public function authenticate()
	{

		$user=User::model()->findByAttributes(array('use_username' => $this->username ));
		if($user===null)
		{
            $this->_id='user Null';
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if(md5($this->password)!==$user->use_password)
		{	
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else if($user->use_is_active == 0 )
		{
			$this->errorCode=self::ERROR_USERNAME_INACTIVE;
			// $this->addError('use_is_active','Your account is not activated');
			$this->errorMessage='Your account is not activated';
            return $this->errorCode;
		}
		else
		{
			$this->_id=$user->use_username;
			$this->setState('no', $user->use_id);	
			// $this->setState('username', $user->use_username);
			// $this->setState('password', $user->use_password);
			$this->setState('role', $user->rol_id);		
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
    }
}