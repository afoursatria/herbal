<?php

class ContentgroupController extends Controller
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
				'actions'=>array('admin','delete','verify'),
				'users'=>array('admin'),
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
	public function actionView($id, $speciesKey='')
	{	
		$content = $this->loadModel($id);
		$content->countView();
		$content->save(false);

		// get spe_id related to con_id
		$criteria = new CDbCriteria;
		$criteria->condition = "con_id = $id";
		$species = Species_content::model()->findAll($criteria);

		$scriteria = new CDbCriteria; //criteria for localname
		foreach ($species as $spe ) {
			$scriteria->addCondition('spe_id='.$spe->spe_id, 'OR');		
		}
		
		if( strlen( $speciesKey ) > 0 )
        $scriteria->addSearchCondition( 'spe_speciesname', $speciesKey, true);

		$listSpecies=new CActiveDataProvider('Species',array(
			'criteria'=>$scriteria,
			'pagination'=> false,
		));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'content'=>$content,
			'speciesDataProvider'=>$listSpecies,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Contentgroup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contentgroup']))
		{
			$model->attributes=$_POST['Contentgroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->contgroup_id));
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

		if(isset($_POST['Contentgroup']))
		{
			$model->attributes=$_POST['Contentgroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->contgroup_id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Contentgroup');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contentgroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contentgroup']))
			$model->attributes=$_GET['Contentgroup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSearch($compoundKey = '')
	{		
		Yii::import('application.extensions.alphapager.ApActiveDataProvider');
		
		// $criteria = new CDbCriteria();
	 // 	$criteria->order = "con_viewed_count DESC";
		// $criteria->limit = 5;
		// $topCompound = Contents::model()->findAll($criteria);

		$searchCriteria = new CDbCriteria();
		$searchCriteria->with= array('Contents');
		$model= new Species_content;

		$compoundCriteria = new CDbCriteria;
		$compoundCriteria->with= array('contents');
		if( strlen( $compoundKey ) > 0 )
        	$compoundCriteria->addSearchCondition( 'con_contentname', $compoundKey, true);

		$listCompound=new ApActiveDataProvider('Species_content',array(
			'criteria'=>$compoundCriteria,
			'alphapagination'=>array(
				'attribute'=>'con_contentname'),
		));
		
		$this->render('search', array(
			'dataProvider'=>$listCompound,
			// 'topCompound'=>$topCompound,
		));
	}

	public function actionVerify($id)
	{
		$model=Contents::model()->findByPk($id);
    	$model->verify();
    	if ($model->save()) {
			$this->redirect(array('search'));		
    	}
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contentgroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contentgroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contentgroup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contentgroup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
