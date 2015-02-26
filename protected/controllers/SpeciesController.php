<?php

class SpeciesController extends Controller
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
				'actions'=>array('create','update','findSpeciesName'),
				'users'=>array('@'),
				// 'expression'=>'allowContributor,allowExpert',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','verify'),
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
	public function actionView($id, $aliasKey = '', $lnameKey = '', $virtueKey='', $compoundKey='')
	{

		$lcriteria = new CDbCriteria; //criteria for localname
		$acriteria = new CDbCriteria; //criteria for alias
		$vcriteria = new CDbCriteria; //criteria for virtue
		$scriteria = new CDbCriteria; // criteria for species contents
		$lcriteria->condition='spe_id='.$id;
		$acriteria->condition='spe_id='.$id;
		$vcriteria->condition='spe_id='.$id;
		$scriteria->condition='spe_id='.$id;
		
		//count total view species for top species
		$species = $this->loadModel($id);
		$species->countView();
		$species->save();

	 	if( strlen( $lnameKey ) > 0 )
        $lcriteria->addSearchCondition( 'loc_localname', $lnameKey, true);

		if( strlen( $aliasKey ) > 0 )
        $acriteria->addSearchCondition( 'ali_speciesname', $aliasKey, true);	   
		
		if( strlen( $virtueKey ) > 0 )
        $vcriteria->addSearchCondition( 'vir_value', $virtueKey, true);
		
		if( strlen( $compoundKey ) > 0 )
		{
		$scriteria->with ='contents';
        $scriteria->addSearchCondition('contents.con_contentname', $compoundKey, true);
		}
	
		$listLocalName=new CActiveDataProvider('Localname',array(
			'criteria'=>$lcriteria,
			'pagination'=> false,
		));

    	$listAliases=new CActiveDataProvider('Aliases',array(
			'criteria'=>$acriteria,
			'pagination'=> false,
		));

    	$listVirtue=new CActiveDataProvider('Virtue',array(
			'criteria'=>$vcriteria,
			'pagination'=> false,
		));

    	$listContents=new CActiveDataProvider('Species_content',array(
			'criteria'=>$scriteria,
			'pagination'=> false,
		));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'localName'=>$this->loadLocalName($id),
			'aliases'=>$this->loadAliases($id),
			'virtue'=>$this->loadVirtue($id),
			'contents'=>$this->loadContents($id),
			'localnameDataProvider'=>$listLocalName,
			'aliasesDataProvider'=>$listAliases,
			'virtueDataProvider'=>$listVirtue,
			'contentsDataProvider'=>$listContents,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Species;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Species']))
		{
			$model->attributes=$_POST['Species'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->spe_id));
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

		if(isset($_POST['Species']))
		{
			$model->attributes=$_POST['Species'];
			$uploadedImage=CUploadedFile::getInstance($model,'spe_foto');
            $imageName = $model->spe_speciesname.'-pic';  

			if(!empty($uploadedImage)) $model->spe_foto = $imageName;
			
			if($model->save()){
				if(!empty($uploadedImage))
				{  // check if uploaded file is set or not
					$uploadedImage->saveAs(Yii::app()->basePath.'/../assets/species/pic/'.$imageName.'.jpg');  // image will uplode to rootDirectory/photo/
				}
				$this->redirect(array('view','id'=>$model->spe_id));
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
		Species_content::model()->deleteAll('spe_id= :species_id', array(':species_id'=>$id));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('search'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$criteria = new CDbCriteria();

		// $criteria->condition ='spe_verified_by IS NOT NULL'; // only view verified species
		if(isset($_GET['q']))
		{
			$q = $_GET['q'];
			$criteria->compare('spe_speciesname', $q, true, 'OR');
		}

		$dataProvider=new CActiveDataProvider('Species', array(
			'criteria'=>$criteria,
			// 'sort'=>array('defaultOrder'=>'spe_update_date DESC'),
			 // array('order'=>'spe_update_date DESC')
			 ));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Species('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Species']))
			$model->attributes=$_GET['Species'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSearch($speciesKey ='')
	{		
		Yii::import('application.extensions.alphapager.ApActiveDataProvider');

		// $criteria = new CDbCriteria;
	 // 	
		// $criteria->order = "spe_viewed_count DESC";
		// $criteria->limit = 5;
		// $topSpecies = Species::model()->findAll($criteria);

		$speciesCriteria = new CDbCriteria;
	 	$speciesCriteria->order = "spe_insert_date DESC";


		if( strlen( $speciesKey ) > 0 ){
        	$speciesCriteria->addSearchCondition( 'spe_speciesname', $speciesKey, true);
        }

        $listSpecies=new ApActiveDataProvider('Species',array(
			'criteria'=>$speciesCriteria,
			'alphapagination'=>array(
				'attribute'=>'spe_speciesname'),
		));

		$this->render('search', array(
			'dataProvider'=>$listSpecies,
			// 'topSpecies'=>$topSpecies,
		));
	}


	public function actionVerify($id)
	{
		$model=Species::model()->findByPk($id);
    	$model->verify();
    	if ($model->save()) {
			$this->redirect(array('search'));		
    	}
		
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Species the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Species::model()->findByPk($id);
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
	public function loadLocalName($id)
	{
		$model=Localname::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadAliases($id)
	{
		$model=Aliases::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadVirtue($id)
	{
		$model=Virtue::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadContents($id)
	{
		$model=Species_content::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Species $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='species-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionFindSpeciesName() {
       $q = $_GET['term'];
       if (isset($q)) {
           $criteria = new CDbCriteria;
           //condition to find your data, using q as the parameter field
           $criteria->condition = 'spe_speciesname LIKE :q'; 
           // $criteria->order = '...'; // correct order-by field
           // $criteria->limit = 5; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           $criteria->params = array(':q' => trim($q) . '%'); 
           $SpeciesName = Species::model()->findAll($criteria);
 
           if (!empty($SpeciesName)) {
               $out = array();
               foreach ($SpeciesName as $p) {
                   $out[] = array(
                       // expression to give the string for the autoComplete drop-down
                       'label' => $p->spe_speciesname,  
                       'value' => $p->spe_speciesname,
                       'id' => $p->spe_id, // return value from autocomplete
                   );
               }
               echo CJSON::encode($out);
               Yii::app()->end();
           }
       }
   }
}