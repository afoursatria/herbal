<?php

/**
 * This is the model class for table "speciescontent".
 *
 * The followings are the available columns in table 'speciescontent':
 * @property integer $specon_id
 * @property integer $spe_id
 * @property integer $con_id
 * @property integer $ref_id
 * @property integer $specon_insert_by
 * @property string $specon_insert_date
 * @property integer $specon_update_by
 * @property string $specon_update_date
 * @property integer $specon_verified_by
 * @property string $specon_verified_date
 */
class Species_content extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'speciescontent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spe_id, con_id, ref_id','required', 'on'=>'insert'),
			// array('spe_id, con_id, ref_id, specon_insert_by, specon_update_by, specon_verified_by', 'numerical', 'integerOnly'=>true),
			// array('specon_insert_date, specon_update_date, specon_verified_date', 'length', 'max'=>20),
			// // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('specon_id, spe_id, con_id, ref_id, specon_insert_by, specon_insert_date, specon_update_by, specon_update_date, specon_verified_by, specon_verified_date', 'safe', 'on'=>'search'),
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
			'species' => array(self::BELONGS_TO, 'Species', 'spe_id'),
			'contents' => array(self::BELONGS_TO, 'Contents', 'con_id'),
			'ref' => array(self::BELONGS_TO, 'ref', 'ref_id'), //ref id foreign fro re_id
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'specon_id' => 'Specon',
			'spe_id' => Yii::t('main_data','Species Name'),
			'con_id' => Yii::t('main_data','Content Name'),
			'ref_id' => Yii::t('main_data','Reference'),
			'specon_insert_by' => 'Specon Insert By',
			'specon_insert_date' => 'Specon Insert Date',
			'specon_update_by' => 'Specon Update By',
			'specon_update_date' => 'Specon Update Date',
			'specon_verified_by' => 'Specon Verified By',
			'specon_verified_date' => 'Specon Verified Date',
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

		$criteria->compare('specon_id',$this->specon_id);
		$criteria->compare('spe_id',$this->spe_id);
		$criteria->compare('con_id',$this->con_id);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('specon_insert_by',$this->specon_insert_by);
		$criteria->compare('specon_insert_date',$this->specon_insert_date,true);
		$criteria->compare('specon_update_by',$this->specon_update_by);
		$criteria->compare('specon_update_date',$this->specon_update_date,true);
		$criteria->compare('specon_verified_by',$this->specon_verified_by);
		$criteria->compare('specon_verified_date',$this->specon_verified_date,true);
		$criteria->with = array('contents');

		// return new CActiveDataProvider($this, array(
		// 	'criteria'=>$criteria,
		// ));
		return new ApActiveDataProvider(get_class($this), array(
            /* ... */
			'criteria'=>$criteria,
            'alphapagination'=>array(
                'attribute'=>'con_contentname',
            ),
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Species_content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
    	if ($this->isNewRecord) {
			$this->specon_insert_by = Yii::app()->user->role;
    		$this->specon_insert_date = new CDbExpression('NOW()');
    		return true;
    	}

    	else{
    		if (Yii::app()->user->hasState('role')) {
	    		$this->specon_update_by = Yii::app()->user->role;
    			$this->specon_update_date = new CDbExpression('NOW()');
    			return true;
    		}    		
    	}

    	/*for status terverifikasi
    	if (Yii::app()->user->role == '2' OR Yii::app()->user->role == '3') {
    		$this->spe_insert_by = Yii::app()->user->role;
    	}
    	*/

		return true;
    }
}
