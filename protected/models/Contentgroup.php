<?php

/**
 * This is the model class for table "contentgroup".
 *
 * The followings are the available columns in table 'contentgroup':
 * @property integer $contgroup_id
 * @property string $contgroup_code
 * @property string $contgroup_name
 * @property integer $contgroup_insert_by
 * @property string $contgroup_insert_date
 * @property integer $contgroup_update_by
 * @property string $contgroup_update_date
 * @property integer $contgroup_verified_by
 * @property string $contgroup_verified_date
 */
class Contentgroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contentgroup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contgroup_code, contgroup_name', 'required', 'message'=>Yii::t('main_data','{attribute} cannot be blank')),
			array('contgroup_insert_by, contgroup_update_by, contgroup_verified_by', 'numerical', 'integerOnly'=>true),
			array('contgroup_code, contgroup_insert_date, contgroup_update_date, contgroup_verified_date', 'length', 'max'=>20),
			array('contgroup_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contgroup_id, contgroup_code, contgroup_name, contgroup_insert_by, contgroup_insert_date, contgroup_update_by, contgroup_update_date, contgroup_verified_by, contgroup_verified_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contgroup_id' => 'Contgroup',
			'contgroup_code' => Yii::t('main_data','Code'),
			'contgroup_name' => Yii::t('main_data','Group Name'),
			'contgroup_insert_by' => 'Contgroup Insert By',
			'contgroup_insert_date' => 'Contgroup Insert Date',
			'contgroup_update_by' => 'Contgroup Update By',
			'contgroup_update_date' => 'Contgroup Update Date',
			'contgroup_verified_by' => 'Contgroup Verified By',
			'contgroup_verified_date' => 'Contgroup Verified Date',
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

		$criteria->compare('contgroup_id',$this->contgroup_id);
		$criteria->compare('contgroup_code',$this->contgroup_code,true);
		$criteria->compare('contgroup_name',$this->contgroup_name,true);
		$criteria->compare('contgroup_insert_by',$this->contgroup_insert_by);
		$criteria->compare('contgroup_insert_date',$this->contgroup_insert_date,true);
		$criteria->compare('contgroup_update_by',$this->contgroup_update_by);
		$criteria->compare('contgroup_update_date',$this->contgroup_update_date,true);
		$criteria->compare('contgroup_verified_by',$this->contgroup_verified_by);
		$criteria->compare('contgroup_verified_date',$this->contgroup_verified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contentgroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
    	if ($this->isNewRecord) {
			$this->contgroup_insert_by = Yii::app()->user->role;
    		$this->contgroup_insert_date = new CDbExpression('NOW()');
    	}

    	else{
    		if (Yii::app()->user->hasState('role')) {
	    		$this->contgroup_update_by = Yii::app()->user->role;
    			$this->contgroup_update_date = new CDbExpression('NOW()');
    		}    		
    	}
    	
		return true;
    }
}
