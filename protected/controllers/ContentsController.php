<?php

class ContentsController extends Controller
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
				'actions'=>array('index','view', 'search'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','findContentName'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'verify'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->getState("role")==1',
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
		$model=new Contents;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contents']))
		{
			$model->attributes=$_POST['Contents'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->con_id));
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
		$speConModel=$this->loadSpeconModel($id); 

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Contents']))
		{
			$model->attributes=$_POST['Contents'];
			$uploadedMol1=CUploadedFile::getInstance($model,'con_file_mol1');
			$uploadedMol2=CUploadedFile::getInstance($model,'con_file_mol2');
            
            $molName = $model->con_contentname;  

            if(!empty($uploadedMol1)) $model->con_file_mol1 = $molName;
            if(!empty($uploadedMol2)) $model->con_file_mol2 = $molName;

			if($model->save())
			{
				if(!empty($uploadedMol1))
				{  // check if uploaded file is set or not
					$uploadedMol1->saveAs(Yii::app()->basePath.'/../assets/mol/mol1/'.$model->con_contentname.'.mol1');  // image will uplode to rootDirectory/photo/
				}

				if(!empty($uploadedMol2))
				{  // check if uploaded file is set or not
					$uploadedMol2->saveAs(Yii::app()->basePath.'/../assets/mol/mol2/'.$model->con_contentname.'.mol2');  // image will uplode to rootDirectory/photo/
				}

				$this->redirect(array('contents/view','id'=>$model->con_id));
			}
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
		Species_content::model()->deleteAll('con_id= :content_id', array(':content_id'=>$id));

		// foreach ($speContent as $val ) {
		// 	echo $val->con_id." ";
		// 	echo $val->spe_id."<br />";
		// }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('contents/search'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Contents');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contents('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contents']))
			$model->attributes=$_GET['Contents'];

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

		$compoundCriteria = new CDbCriteria;
		if( strlen( $compoundKey ) > 0 )
        	$compoundCriteria->addSearchCondition( 'con_contentname', $compoundKey, true);

		$listCompound=new ApActiveDataProvider('Contents',array(
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
	 * @return Contents the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contents::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadSpeconModel($id)
	{
		$model=Species_content::model()->find('con_id='.$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contents $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contents-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionFindContentName() 
	{
       $q = $_GET['term'];
       if (isset($q)) {
           $criteria = new CDbCriteria;
           //condition to find your data, using q as the parameter field
           $criteria->condition = 'con_contentname LIKE :q'; 
           // $criteria->order = '...'; // correct order-by field
           // $criteria->limit = 5; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           $criteria->params = array(':q' => trim($q) . '%'); 
           $contentName = Contents::model()->findAll($criteria);
 
           if (!empty($contentName)) {
               $out = array();
               foreach ($contentName as $p) {
                   $out[] = array(
                       // expression to give the string for the autoComplete drop-down
                       'label' => $p->con_contentname,  
                       'value' => $p->con_contentname,
                       'id' => $p->con_id, // return value from autocomplete
                   );
               }
               echo CJSON::encode($out);
               Yii::app()->end();
           }
       }
   }
}
