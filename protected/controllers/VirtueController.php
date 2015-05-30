<?php

class VirtueController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','download'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'verify'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getState("role")==1 OR Yii::app()->user->getState("role")==2',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Virtue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Virtue']))
		{
			$model->attributes=$_POST['Virtue'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->vir_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Virtue']))
		{
			$model->attributes=$_POST['Virtue'];
			if($model->save())
				$this->redirect(array('species/view','id'=>$model->spe_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$model->delete();	

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('species/'.$model->spe_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Virtue');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Virtue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Virtue']))
			$model->attributes=$_GET['Virtue'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSearch($virtueKey= '')
	{		
		Yii::import('application.extensions.alphapager.ApActiveDataProvider');

		$virtueCriteria = new CDbCriteria;

		if( strlen( $virtueKey ) > 0 )
        $virtueCriteria->addSearchCondition( 'vir_value', $virtueKey, true);
		
		$listVirtue=new ApActiveDataProvider('Virtue',array(
			'criteria'=>$virtueCriteria,
			'alphapagination'=>array(
				'attribute'=>'vir_value'),
		));
    	
		$this->render('search', array(
			'dataProvider'=>$listVirtue,
		));
	}

	public function actionVerify($id)
	{
		$model=Virtue::model()->findByPk($id);
    	$model->verify();
    	if ($model->save()) {
			$this->redirect(array('search'));		
    	}
		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Virtue the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Virtue::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Virtue $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='virtue-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDownload()
	{

   	Yii::Import('application.extensions.ExportXLS.ExportXLS');
	 
	// Xls Header Row
	$headercolums =array('Species Name', 'Herbal Part','Virtue Type','Virtue','Variety(English)','Variety(Latin)', 'Reference'); 
	
	// Xls Data

	$criteria = new CDbCriteria;
	$criteria->with = array('ref','species', 'herbal_part');
	$criteria->select = 'herbal_part.hp_part_name as hp_part, vir_type, vir_value, vir_value_en, vir_value_latin, ref.ref_name as refs, species.spe_speciesname as speciesnames'; // select fields which you want in output

	$data = Virtue::model()->findAll($criteria);
    // var_dump($data);die();
	$row = array();
	foreach ($data as $d) {
		$item = array($d->species['spe_speciesname'], $d->herbal_part['hp_part_name'], $d->vir_type, $d->vir_value, $d->vir_value_en, $d->vir_value_latin, $d->ref['ref_name']);
		array_push($row, $item);
		
	}
	// var_dump($row);die();
	// $row=array(array('Sachin','35'),array('sehwag',30));
	 
	// Xls File Name
	$filename = 'Virtue.xls';
	    $xls      = new ExportXLS($filename);
	    $header = null;
	    $xls->addHeader($headercolums);
	    $xls->addRow($row);
	    $xls->sendFile();
	}
}