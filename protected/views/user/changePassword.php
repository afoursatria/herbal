<?php
	$this->breadcrumbs=array(
	Yii::t('main_layout','Profile')=>array('profile','id'=>Yii::app()->user->no),
	Yii::t('main_data','Change Password')
	);
?>

<h1></h1>

<?php $this->renderPartial('_formChangePassword', array('model'=>$model)); ?>