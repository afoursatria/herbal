<?php
/* @var $this LocalnameController */
/* @var $model Localname */

$this->breadcrumbs=array(
	Yii::t('main_data','Local Name')=>array('index'),
	Yii::t('main_layout','Update'),
);

$this->menu=array(
	// array('label'=>'List Localname', 'url'=>array('index')),
	// array('label'=>'Create Localname', 'url'=>array('create')),
	// array('label'=>'View Localname', 'url'=>array('view', 'id'=>$model->loc_id)),
	// array('label'=>'Manage Localname', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Update')." ".Yii::t('main_data','Local Name')." ".$model->loc_localname; ?></h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>