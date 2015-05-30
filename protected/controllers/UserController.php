<?php

class UserController extends Controller
{

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			 	'actions'=>array('create','profile', 'update', 'changePassword', 'insertData', 'captcha', 'findRefName', 'download'),
			 	'users'=>array('@'),		
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','verify', 'add'),
			 	'expression'=>
				 	'Yii::app()->user->getState("role")==1',				
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionProfile($id)
	{
		$this->render('profile',array(
			'model'=>$this->loadProfile($id),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadProfile($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('main_data','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadProfile($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->setScenario("update");
		if(isset($_POST['User']))
		{

			$_POST['User']['photo'] = $model->use_foto;
			$_POST['User']['cv'] = $model->use_cv;

			$model->attributes=$_POST['User'];

			$uploadedImage=CUploadedFile::getInstance($model,'use_foto');
			$uploadedCV=CUploadedFile::getInstance($model,'use_cv');
            
            $fileName = $model->use_username;  

            $cvName = 'CV-'.$model->use_username;  
 			
            if(!empty($uploadedImage)) $model->use_foto = $fileName;
            if(!empty($uploadedCV)) $model->use_cv = $cvName;
			if($model->save()){
				if(!empty($uploadedImage))
				{  // check if uploaded file is set or not
					$uploadedImage->saveAs(Yii::app()->basePath.'/../assets/user/photo/'.$model->use_username.'.jpg');  // image will uplode to rootDirectory/photo/
				}

				if(!empty($uploadedCV))
				{  // check if uploaded file is set or not
					$uploadedCV->saveAs(Yii::app()->basePath.'/../assets/user/cv/CV-'.$model->use_username.'.pdf');  // image will uplode to rootDirectory/photo/
				}
				
				$this->redirect(array('profile','id'=>$model->use_id));

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
		$this->loadProfile($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionChangePassword($id)
	{
		$model=new ChangePasswordForm;
		$model->setScenario('changePassword');
		
		// if it is ajax validation request
		
			// echo CActiveForm::validate($model);
			// Yii::app()->end();
		
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			if($model->validate() && $model->changePassword())
				{
					Yii::app()->user->setFlash('success',Yii::t('main_data','Password has been changed'));
					$this->refresh();
				}
		}
		$this->render('changePassword',array('model'=>$model));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$userModel= new User;
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Species']))
			$model->attributes=$_GET['Species'];

		$this->render('admin',array(
			'model'=>$model,
			'userModel'=>$userModel,
		));
	}

	/**
	 * Add user.
	 */
	public function actionAdd()
	{
		$model=new User;

		$model->scenario = "register";	
		if(isset($_POST['User']))
		{	
			$_POST['User']['photo'] = $model->use_foto;
			$model->attributes=$_POST['User'];

			$uploadedImage=CUploadedFile::getInstance($model,'use_foto');
			
			$imageName = $model->use_username;  

			if($model->validate()){

				if(!empty($uploadedImage))
				{  // check if uploaded file is set or not
            		$model->use_foto = $imageName;
					$uploadedImage->saveAs(Yii::app()->basePath.'/../assets/user/photo/'.$imageName.'.jpg');  // image will uplode to rootDirectory/photo/
				}

				$model->save();
				Yii::app()->user->setFlash('success',Yii::t('main_data','New user has been added'));
				$this->redirect(array('admin'));
			}
		}

		$this->render('/site/register',array(
			'model'=>$model,
		));
	}

    public function actionVerify($id)
	{
		$model=User::model()->findByPk($id);
    	$model->verifyUser();
    	if ($model->save()) {
    		Yii::app()->user->setFlash('success',Yii::t('main_data','User has been activated'));
    		$this->sendVerificationMail($id);
			$this->redirect(array('user/admin'));		
    	}
		
	}

	public function sendVerificationMail($id)
    {   
        $message            = new YiiMailMessage;
          
        //this points to the file verificationRequest.php inside the view path
        $message->view = "user/verificationApproval";
        $criteria=new CDbCriteria;
		// $criteria->select='use_email';  // only select the 'use_email' column
		// $criteria->condition='rol_id='.$id;
		$userModel=User::model()->findByPk($id);
        $params              = array('myMail'=>$userModel);
        $message->subject    = 'Your Account is Active Now';
      	$message->setBody($params, 'text/html');               
		
		$message->addTo($userModel->use_email);        	

		$message->setFrom(array('admin@herbaldbui.meximas.com' => 'Herbal DB'));   
      	Yii::app()->mail->send($message); 
    }

	public function actionInsertData()
	{
		$speciesModel = new Species;
		$speciesModel->setScenario('insert');
		
		$localnameModel = new Localname;
		$localnameModel->setScenario('insert');
		
		$aliasesModel = new Aliases;
		$aliasesModel->setScenario('insert');
		
		$virtueModel = new Virtue;
		$virtueModel->setScenario('insert');
		
		$referenceModel = new Ref;
		$referenceModel->setScenario('insert');
		
		$compoundModel = new Contents;
		$compoundModel->setScenario('insert');

		$speciesContentModel = new Species_content;
		$speciesContentModel->setScenario('insert');
		
		$contentGroupModel = new Contentgroup;
		$contentGroupModel->setScenario('insert');



		if(isset($_POST['Species']))
		{

			$speciesModel->attributes=$_POST['Species'];
			if($speciesModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Species saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Localname']))
		{
			$localnameModel->attributes=$_POST['Localname'];
			if($localnameModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Localname saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Aliases']))
		{
			$aliasesModel->attributes=$_POST['Aliases'];
			if($aliasesModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Aliases saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Virtue']))
		{
			$virtueModel->attributes=$_POST['Virtue'];
			if($virtueModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Virtue saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Ref']))
		{
			$referenceModel->attributes=$_POST['Ref'];
			if($referenceModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Reference saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Contents']))
		{
			$compoundModel->attributes=$_POST['Contents'];
			// $compoundModel->con_file_mol1=CUploadedFile::getInstance($compoundModel,'con_file_mol1');
			// $compoundModel->con_file_mol2=CUploadedFile::getInstance($compoundModel,'con_file_mol2');
			if($compoundModel->save()){
                // $model->image->saveAs('path/to/localFile');
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Contents saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}
		
		if(isset($_POST['Contentgroup']))
		{
			$contentGroupModel->attributes=$_POST['Contentgroup'];
			if($contentGroupModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Content group saved!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Species_content']))
		{
			$speciesContentModel->attributes=$_POST['Species_content'];
			if($speciesContentModel->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('main_data',"Content has been assigned to species!"));
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		$this->render('insert_data',array(
			'speciesModel'=>$speciesModel,
			'localnameModel'=>$localnameModel,
			'aliasesModel'=>$aliasesModel,
			'virtueModel'=>$virtueModel,
			'referenceModel'=>$referenceModel,
			'compoundModel'=>$compoundModel,
			'contentGroupModel'=>$contentGroupModel,
			'speciesContentModel'=>$speciesContentModel,
		));
	}

	public function actionFindRefName() 
	{
	    $q = $_GET['term'];
       	if (isset($q)) {
           $criteria = new CDbCriteria;
           //condition to find your data, using q as the parameter field
           $criteria->condition = 'ref_name LIKE :q';
           // $criteria->order = '...'; // correct order-by field
            // $criteria->limit = 5; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           $criteria->params = array(':q' => trim($q) . '%'); 
           $RefName = Ref::model()->findAll($criteria);
 
           if (!empty($RefName)) {
               $out = array();
               foreach ($RefName as $p) {
                   $out[] = array(
                       // expression to give the string for the autoComplete drop-down
                       'label' => $p->ref_name,  
                       'value' => $p->ref_name,
                       'id' => $p->ref_id, // return value from autocomplete
                   );
               }
               echo CJSON::encode($out);
               Yii::app()->end();
           }
       }
   }

   public function actionDownload()
   {
   	$this->render('download');
   }

 //   public function loadModel() {
 //      if (isset($_GET['id']))
 //               // NOTE 'with()'
 //               $this->_model=Ref::model()->with('ref')->findbyPk($_GET['id']); 
 // }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

}