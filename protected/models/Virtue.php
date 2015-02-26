<?php

/**
 * This is the model class for table "virtue".
 *
 * The followings are the available columns in table 'virtue':
 * @property integer $vir_id
 * @property integer $spe_id
 * @property integer $hp_code
 * @property string $vir_type
 * @property string $vir_value
 * @property string $vir_value_en
 * @property string $vir_value_latin
 * @property integer $ref_id
 * @property integer $vir_insert_by
 * @property string $vir_insert_date
 * @property integer $vir_update_by
 * @property string $vir_update_date
 * @property integer $vir_verified_by
 * @property string $vir_verified_date
 */
class Virtue extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'virtue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spe_id, hp_code, vir_value, ref_id', 'required', 'on'=>'insert','message'=>Yii::t('main_data','{attribute} cannot be blank')),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vir_id, spe_id, hp_code, vir_type, vir_value, vir_value_en, vir_value_latin, ref_id, vir_insert_by, vir_insert_date, vir_update_by, vir_update_date, vir_verified_by, vir_verified_date', 'safe', 'on'=>'search'),
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
			'species'=>array(self::BELONGS_TO, 'Species','spe_id'),
			'herbal_part'=>array(self::BELONGS_TO, 'HerbalPart', 'hp_code'),
			'ref' => array(self::BELONGS_TO, 'ref', 'ref_id'), //ref id foreign fro re_id
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vir_id' => 'Vir',
			'spe_id' => Yii::t('main_data','Species'),
			'hp_code' => Yii::t('main_data','Herbal Part'),
			'vir_type' => Yii::t('main_data','Virtue Type'),
			'vir_value' => Yii::t('main_data','Virtue'),
			'vir_value_en' => Yii::t('main_data','Virtue (English)'),
			'vir_value_latin' => Yii::t('main_data','Virtue (Latin)'),
			'ref_id' => Yii::t('main_data','Reference'),
			'vir_insert_by' => 'Vir Insert By',
			'vir_insert_date' => 'Vir Insert Date',
			'vir_update_by' => 'Vir Update By',
			'vir_update_date' => 'Vir Update Date',
			'vir_verified_by' => 'Vir Verified By',
			'vir_verified_date' => 'Vir Verified Date',
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
		Yii::import('application.extensions.alphapager.ApActiveDataProvider');

		$criteria=new CDbCriteria;

		$criteria->compare('vir_id',$this->vir_id);
		$criteria->compare('spe_id',$this->spe_id);
		$criteria->compare('hp_code',$this->hp_code);
		$criteria->compare('vir_type',$this->vir_type,true);
		$criteria->compare('vir_value',$this->vir_value,true);
		$criteria->compare('vir_value_en',$this->vir_value_en,true);
		$criteria->compare('vir_value_latin',$this->vir_value_latin,true);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('vir_insert_by',$this->vir_insert_by);
		$criteria->compare('vir_insert_date',$this->vir_insert_date,true);
		$criteria->compare('vir_update_by',$this->vir_update_by);
		$criteria->compare('vir_update_date',$this->vir_update_date,true);
		$criteria->compare('vir_verified_by',$this->vir_verified_by);
		$criteria->compare('vir_verified_date',$this->vir_verified_date,true);

		// return new CActiveDataProvider($this, array(
		// 	'criteria'=>$criteria,
		// ));

		return new ApActiveDataProvider(get_class($this), array(
            /* ... */
            'alphapagination'=>array(
				// 	'criteria'=>$criteria,
                'attribute'=>'vir_value',
            ),
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Virtue the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
    	if ($this->isNewRecord) {
			$this->vir_insert_by = Yii::app()->user->role;
    		$this->vir_insert_date = new CDbExpression('NOW()');
    	}

    	else{
    		if (Yii::app()->user->hasState('role')) {
	    		$this->vir_update_by = Yii::app()->user->role;
    			$this->vir_update_date = new CDbExpression('NOW()');
    		}    		
    	}
    	
		return true;
    }

	public function verify()
    {
    	$this->vir_is_verified = 1;
    	$this->vir_verified_by = Yii::app()->user->getState('no');
    	$this->vir_verified_date = new CDbExpression('NOW()');
    	return true;

    }
}
