<?php
/* @var $this ContentgroupController */
/* @var $model Contentgroup */

$this->breadcrumbs=array(
	'Contentgroups'=>array('index'),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Contentgroup', 'url'=>array('index')),
	// array('label'=>'Create Contentgroup', 'url'=>array('create')),
	// array('label'=>'View Contentgroup', 'url'=>array('view', 'id'=>$model->contgroup_id)),
	// array('label'=>'Manage Contentgroup', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Update').' '.Yii::t('main_data','Compound Group').' '.$model->contgroup_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>