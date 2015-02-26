<?php

/**
 * This is the model class for table "species".
 *
 * The followings are the available columns in table 'species':
 * @property integer $spe_id
 * @property string $spe_species_id
 * @property string $spe_speciesname
 * @property string $spe_varietyname
 * @property string $spe_familyname
 * @property string $spe_foundername
 * @property string $spe_foto
 * @property integer $ref_id
 * @property integer $spe_insert_by
 * @property string $spe_insert_date
 * @property integer $spe_update_by
 * @property string $spe_update_date
 * @property integer $spe_verified_by
 * @property string $spe_verified_date
 */
class Species extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'species';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spe_species_id, spe_speciesname, ref_id', 'required', 'on'=>'insert, update','message'=>Yii::t('main_data','{attribute} cannot be blank')),
			array('spe_foto', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update, insert'), // this will allow empty field when page is update
			// array('ref_id, spe_insert_by, spe_update_by, spe_verified_by', 'numerical', 'integerOnly'=>true),
			// array('spe_species_id, spe_insert_date, spe_update_date, spe_verified_date', 'length', 'max'=>20),
			// array('spe_speciesname, spe_varietyname, spe_familyname, spe_foundername, spe_foto', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('spe_id, spe_species_id, spe_speciesname, spe_varietyname, spe_familyname, spe_foundername, spe_foto, ref_id, spe_insert_by, spe_insert_date, spe_update_by, spe_update_date, spe_verified_by, spe_verified_date', 'safe', 'on'=>'search'),
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
			'ref' => array(self::BELONGS_TO, 'Ref', 'ref_id'), //ref id foreign fro re_id
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'spe_id' => 'Species',
			'spe_species_id' => Yii::t('main_data','Species ID'),
			'spe_speciesname' => Yii::t('main_data','Species Name'),
			'spe_varietyname' => Yii::t('main_data','Variety Name'),
			'spe_familyname' => Yii::t('main_data','Family Name'),
			'spe_foundername' => Yii::t('main_data','Founder Name'),
			'spe_foto' => Yii::t('main_data','Foto'),
			'ref_id' => Yii::t('main_data','Reference'),
			'spe_insert_by' => 'Insert By',
			'spe_insert_date' => 'Insert Date',
			'spe_update_by' => 'Update By',
			'spe_update_date' => 'Update Date',
			'spe_verified_by' => 'Verified By',
			'spe_verified_date' => 'Verified Date',
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

		$criteria->compare('spe_id',$this->spe_id);
		$criteria->compare('spe_species_id',$this->spe_species_id,true);
		$criteria->compare('spe_speciesname',$this->spe_speciesname,true);
		$criteria->compare('spe_varietyname',$this->spe_varietyname,true);
		$criteria->compare('spe_familyname',$this->spe_familyname,true);
		$criteria->compare('spe_foundername',$this->spe_foundername,true);
		$criteria->compare('spe_foto',$this->spe_foto,true);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('spe_insert_by',$this->spe_insert_by);
		$criteria->compare('spe_insert_date',$this->spe_insert_date,true);
		$criteria->compare('spe_update_by',$this->spe_update_by);
		$criteria->compare('spe_update_date',$this->spe_update_date,true);
		$criteria->compare('spe_verified_by',$this->spe_verified_by);
		$criteria->compare('spe_verified_date',$this->spe_verified_date,true);

		// return new CActiveDataProvider($this, array(
		// 	'criteria'=>$criteria,
		// ));

		return new ApActiveDataProvider(get_class($this), array(
            /* ... */
            'alphapagination'=>array(
				// 	'criteria'=>$criteria,
                'attribute'=>'spe_speciesname',
            ),
        ));
	}

	public function geSpeciesName() 
	{
      // presuming PostCode, City and Province are fields
      return $this->spe_speciesname; 
 	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Species the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
    	if ($this->isNewRecord) {
			$this->spe_insert_by = Yii::app()->user->role;
    		$this->spe_insert_date = new CDbExpression('NOW()');
    		return true;
    	}

    	else{
    		if (Yii::app()->user->hasState('role')) {
	    		$this->spe_update_by = Yii::app()->user->role;
    			$this->spe_update_date = new CDbExpression('NOW()');
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

    public function countView()
    {
    	$this->spe_viewed_count += 1;

    	return true;
    }

    public function verify()
    {
    	$this->spe_is_verified = 1;
    	$this->spe_verified_by = Yii::app()->user->getState('no');
    	$this->spe_verified_date = new CDbExpression('NOW()');
    	return true;

    }
}