<?php
/* @var $this RefController */
/* @var $model Ref */

$this->breadcrumbs=array(
	Yii::t('main_data','Refs')=>array('index'),
	$model->ref_id=>array('view','id'=>$model->ref_id),
	Yii::t('main_layout','Update'),
);

$this->menu=array(
	// array('label'=>'List Ref', 'url'=>array('index')),
	// array('label'=>'Create Ref', 'url'=>array('create')),
	// array('label'=>'View Ref', 'url'=>array('view', 'id'=>$model->ref_id)),
	// array('label'=>'Manage Ref', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Update').' '.Yii::t('main_data','Refs').' '.$model->ref_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>