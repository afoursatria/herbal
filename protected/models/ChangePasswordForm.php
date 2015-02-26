<?php
// models/ChangePasswordForm.php

class ChangePasswordForm extends CFormModel
{

    public $currentPassword;

    public $newPassword;

    public $newPasswordRepeat;

    /**
     * Validation rules for this form.
     *
     * @return array
     */

    private $_user;

    public function rules()
    {
        return array(
            array('currentPassword', 'validateCurrentPassword'),
            array('currentPassword, newPassword, newPasswordRepeat', 'required', 'on'=>'changePassword', 'message'=>Yii::t('user','{attribute} cannot be blank')),
            array('newPasswordRepeat', 'compare', 'compareAttribute'=>'newPassword'),
            // array('newPassword', 'match', 'pattern'=>'/^[a-z0-9_\-]{5,}/i', 'message'=>'Your password does not meet our password complexity policy.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'currentPassword'=>Yii::t('user','Current Password'),
            'newPassword'=>Yii::t('user','New Password'),
            'newPasswordRepeat'=>Yii::t('user','Repeat New Password'),
        );
    }

    public function init()
    {
    $this->_user = User::model()->findByAttributes( array( 'use_username'=>Yii::app()->user->id ) );
    }

    /**
     * Saves the new password.
     */
    public function changePassword()
    {
        $this->_user->use_password = md5($this->newPassword);
        if( $this->_user->save() )
          return true;
        return false;

    }

    /**
     * Validates current password.
     *
     * @return bool Is password valid
     */
    public function validateCurrentPassword($attribute,$params)
    {
        if( md5($this->currentPassword) !== $this->_user->use_password )
        {
            $this->addError($attribute,Yii::t('user','Your current password does not match'));
        }
    }
}
