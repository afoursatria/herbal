<?php

/**
 * This is the model class for table "ref".
 *
 * The followings are the available columns in table 'ref':
 * @property integer $ref_id
 * @property string $ref_name
 * @property integer $ref_insert_by
 * @property string $ref_insert_date
 * @property integer $ref_update_by
 * @property string $ref_update_date
 * @property integer $ref_verified_by
 * @property string $ref_verified_date
 */
class Ref extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ref_name, ref_source', 'required', 'message'=>Yii::t('main_data','{attribute} cannot be blank')),
			array('ref_insert_by, ref_update_by, ref_verified_by', 'numerical', 'integerOnly'=>true),
			array('ref_name', 'length', 'max'=>100),
			array('ref_insert_date, ref_update_date, ref_verified_date', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ref_id, ref_name, ref_insert_by, ref_insert_date, ref_update_by, ref_update_date, ref_verified_by, ref_verified_date', 'safe', 'on'=>'search'),
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
			'ref' => array(self::BELONGS_TO, 'ref_id', 'ref_name'),
			// 'ref_local'=>array(self::HAS_MANY, 'Localname', 'ref_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ref_id' => 'Ref',
			'ref_name' => Yii::t('main_data','Reference Name'),
			'ref_source'=> Yii::t('main_data','Reference Source'),
			'ref_insert_by' => 'Ref Insert By',
			'ref_insert_date' => 'Ref Insert Date',
			'ref_update_by' => 'Ref Update By',
			'ref_update_date' => 'Ref Update Date',
			'ref_verified_by' => 'Ref Verified By',
			'ref_verified_date' => 'Ref Verified Date',
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

		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('ref_name',$this->ref_name,true);
		$criteria->compare('ref_insert_by',$this->ref_insert_by);
		$criteria->compare('ref_insert_date',$this->ref_insert_date,true);
		$criteria->compare('ref_update_by',$this->ref_update_by);
		$criteria->compare('ref_update_date',$this->ref_update_date,true);
		$criteria->compare('ref_verified_by',$this->ref_verified_by);
		$criteria->compare('ref_verified_date',$this->ref_verified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ref the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getRefName() {
      // presuming PostCode, City and Province are fields
      return $this->ref_name; 
 	}

 	public function beforeSave()
    {
    	if ($this->isNewRecord) {
			$this->ref_insert_by = Yii::app()->user->role;
    		$this->ref_insert_date = new CDbExpression('NOW()');
    	}

    	else{
    		if (Yii::app()->user->hasState('role')) {
	    		$this->ref_update_by = Yii::app()->user->role;
    			$this->ref_update_date = new CDbExpression('NOW()');
    		}    		
    	}
    	
		return true;
    }


}
