<?php

class LocalnameController extends Controller
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
				'actions'=>array('create','update'),
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
	public function actionCreate($id)
	{
		$speId = $this->loadSpeId($id);
		$model=new Localname;	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Localname']))
		{
			$model->attributes=$_POST['Localname'];
			if($model->save())
				$this->redirect(array('/species/view/','id'=>$speId->spe_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'speId'=>$speId,
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

		if(isset($_POST['Localname']))
		{
			$model->attributes=$_POST['Localname'];
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
		$dataProvider=new CActiveDataProvider('Localname');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Localname('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Localname']))
			$model->attributes=$_GET['Localname'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSearch($lnameKey='')
	{		
		Yii::import('application.extensions.alphapager.ApActiveDataProvider');

		$lnameCriteria = new CDbCriteria;

		if( strlen( $lnameKey ) > 0 )
        $lnameCriteria->addSearchCondition( 'loc_localname', $lnameKey, true);
		
		$listLocalname=new ApActiveDataProvider('Localname',array(
			'criteria'=>$lnameCriteria,
			'alphapagination'=>array(
				'attribute'=>'loc_localname'),
		));
    	
		$this->render('search', array(
			'dataProvider'=>$listLocalname,
		));
	}

	public function actionVerify($id)
	{
		$model=Localname::model()->findByPk($id);
    	$model->verify();
    	if ($model->save()) {
			$this->redirect(array('search'));		
    	}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Localname::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadSpeId($id)
	{
		$model=Species::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	/**
	 * Performs the AJAX validation.
	 * @param Localname $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='localname-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}