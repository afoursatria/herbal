<?php
	$this->breadcrumbs=array(
	Yii::t('main_layout','Profile')=>array('profile','id'=>$model->use_id),
	Yii::t('main_layout','Update')
	);
?>

<h1>Update Profile</h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>