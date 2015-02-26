<?php
/**
* 
*/

class ResetPasswordForm extends CFormModel
{
	
	public $email;

	public $verifyCode;

    private $newPass; 

	private $_user;

	public function rules()
    {
        return array(
            array('email', 'required', 'message'=>Yii::t('user','{attribute} is required')),
            array('email', 'validateEmail'),
            // array('email', 'required', 'message'=>Yii::t('user','{attribute} is required')),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message'=>Yii::t('user','Verification code is invalid')),
        );
    }

    public function init()
    {
    	// $this->_user = User::model()->find( 'use_email=:use_email',array( 'use_email'=>$this->email ) );
        $this->newPass = $this->generateRandomPass();

    }

    public function validateEmail($attribute,$params)
    { 
  
        $this->_user = User::model()->findByAttributes( array( 'use_email'=>    $this->email ) );
        if($this->_user === Null)
        {
            $this->addError($attribute,Yii::t('user', 'Your Email is not registered'));         
        }
    }

    public function resetPass()
    {
        $this->_user->use_password = md5($this->newPass);
        if ($this->_user->save())
            return true;
        return false;
    }

    private function generateRandomPass($length = 8)
    {
         $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ";
         $validCharLength = strlen($validCharacters);
         $validNumber = "0123456789";
         $validNumberLength = strlen($validNumber);

         $result = "";

         for ($i=0; $i < $length; $i++) { 
            $charIndex = mt_rand(0, $validCharLength-1);
            $numberIndex = mt_rand(0, $validNumberLength-1);

            if ($i%2 === 0) {
                $result .= $validCharacters[$charIndex]; 
            }

            else $result .= $validNumber[$numberIndex];
        }

        return $result;
    }

    public function getNewPassword()
    {
        return $this->newPass;
    }

    public function getEmail()
    {
        return $this->_user;
    }
}
