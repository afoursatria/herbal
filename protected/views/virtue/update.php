<?php
/* @var $this VirtueController */
/* @var $model Virtue */

$this->breadcrumbs=array(
	Yii::t('main_data','Virtue')=>array('index'),
	Yii::t('main_layout','Update'),
);

$this->menu=array(
	// array('label'=>'List Virtue', 'url'=>array('index')),
	// array('label'=>'Create Virtue', 'url'=>array('create')),
	// array('label'=>'View Virtue', 'url'=>array('view', 'id'=>$model->vir_id)),
	// array('label'=>'Manage Virtue', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Update').' '.Yii::t('main_data','Virtue').' '?><?php echo $model->vir_value; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>