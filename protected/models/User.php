<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $use_id
 * @property string $use_fullname
 * @property string $use_email
 * @property integer $use_gender
 * @property string $use_birthdate
 * @property integer $use_occupation
 * @property integer $use_country
 * @property integer $use_city
 * @property string $use_address
 * @property string $use_foto
 * @property string $use_cv
 * @property integer $rol_id
 * @property string $use_username
 * @property string $use_password
 * @property string $use_pass_ori
 * @property integer $use_is_active
 * @property string $use_update_date
 * @property integer $use_update_by
 * @property string $use_reg_date
 * @property string $use_last_login_ip
 * @property string $use_last_login_date
 */

class User extends CActiveRecord
{	
	public $repeat_password;
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;
    public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('use_username', 'length', 'min'=>6, 'max'=>12, 'tooShort'=>Yii::t('user','Username doesn\'t meet criteria'),'tooLong'=>Yii::t('user','Username doesn\'t meet criteria'), 'on'=>'register'),
			array('use_password', 'match', 'pattern'=>'/^[\*a-zA-Z0-9]{6,12}$/', 'message' =>Yii::t('user','Password doesn\'t meet criteria'), 'on'=>'register'),
			array('use_username, use_password', 'required', 'on'=>'register, login', 'message'=>Yii::t('user','{attribute} is required')),
			array('use_username, use_email', 'unique', 'message'=>Yii::t('user','This {attribute} is already registered')),	
			array('use_fullname, use_email, rol_id, use_birthdate, use_gender' , 'required', 'on'=>'register, update', 'message'=>Yii::t('user','{attribute} is required')),
			array('use_email', 'email', 'message'=>Yii::t('user','Email is not valid')),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'register', 'message'=>Yii::t('user','Verification code is invalid')),
			array('repeat_password', 'required', 'on'=>'register', 'message'=>'Please repeat your password'),
			// array('use_gender, use_occupation, use_country, use_city, rol_id, use_is_active, use_update_by', 'numerical', 'integerOnly'=>true),
			array('use_fullname, use_email', 'length', 'max'=>25),
			array('use_birthdate', 'length', 'max'=>10),
			array('use_username, use_update_date', 'length', 'max'=>15),
			array('use_foto', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update, register'), // this will allow empty field when page is update
            array('use_cv', 'file', 'types'=>'pdf', 'allowEmpty'=>true, 'on'=>'update'),
			array('use_password','compare', 'compareAttribute'=>'repeat_password', 'on'=>'users'),
			array('use_last_login_ip', 'length', 'max'=>15),
			array('use_is_active', 'safe'),
			// The following rule is used by searchedrch().
			// @todo Please remove those attributes that should not be searched.
			array('use_id, use_fullname, use_email, use_gender, use_birthdate, use_occupation, use_country, use_city, use_address, use_foto, use_cv, rol_id, use_username, use_password, use_pass_ori, use_is_active, use_update_date, use_update_by, use_reg_date, use_last_login_ip, use_last_login_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			    'roles' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'use_id' => 'Use',
			'use_fullname' => Yii::t('user','Fullname'),
			'use_email' => Yii::t('user','Email'),
			'use_gender' => Yii::t('user','Gender'),
			'use_birthdate' => Yii::t('user','Birthdate'),
			'use_address' => 'Address',
			'use_foto' => Yii::t('user','Photo'),
			'use_cv' => 'Curriculum Vitae',
			'rol_id' => Yii::t('user','Role'),
			'use_username' => 'Username',
			'use_password' => 'Password',
			'verifyCode' => Yii::t('user','Verification Code'),
			'use_is_active' => Yii::t('user','Status'),
			'use_update_date' => 'Use Update Date',
			'use_update_by' => 'Use Update By',
			'use_reg_date' => Yii::t('user','Registration Date'),
			'use_last_login_ip' => 'Use Last Login Ip',
			'use_last_login_date' => 'Use Last Login Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('use_id',$this->use_id);
		$criteria->compare('use_fullname',$this->use_fullname,true);
		$criteria->compare('use_email',$this->use_email,true);
		$criteria->compare('use_gender',$this->use_gender);
		$criteria->compare('use_birthdate',$this->use_birthdate,true);
		$criteria->compare('use_address',$this->use_address,true);
		$criteria->compare('use_foto',$this->use_foto,true);
		$criteria->compare('use_cv',$this->use_cv,true);
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('use_username',$this->use_username,true);
		$criteria->compare('use_password',$this->use_password,true);
		$criteria->compare('use_is_active',$this->use_is_active);
		$criteria->compare('use_update_date',$this->use_update_date,true);
		$criteria->compare('use_update_by',$this->use_update_by);
		$criteria->compare('use_reg_date',$this->use_reg_date,true);
		$criteria->compare('use_last_login_ip',$this->use_last_login_ip,true);
		$criteria->compare('use_last_login_date',$this->use_last_login_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {

    	if ($this->isNewRecord) {
    		$pass = md5($this->use_password);
			$this->use_password = $pass;
			$this->use_reg_date = new CDbExpression('NOW()');
    	}
    	
		return true;
    }

    public function beforeValidate()
    {
    	if (!$this->isNewRecord) {
    		$this->use_update_date=new CDbExpression('NOW()');
			$this->use_update_by=Yii::app()->user->getState('no');
    	}

    	return parent::beforeValidate();
    }

    public function verifyUser()
    {
    	$this->use_is_active = 1;
    	return true;
    }

 //    public function notVerifiedUser() 
 //    {

	// 	$criteria=new CDbCriteria;
	// 	$criteria->condition = "use_is_active = 0";

	// 	return new CActiveDataProvider($this, array(
	// 		'criteria'=>$criteria,
	// 	));
	// }

	// public function verifiedUser() 
 //    {

	// 	$criteria=new CDbCriteria;
	// 	$criteria->condition = "use_is_active = 1";

	// 	return new CActiveDataProvider($this, array(
	// 		'criteria'=>$criteria,
	// 	));
	// }
}