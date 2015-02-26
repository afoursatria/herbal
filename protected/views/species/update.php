<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	Yii::t('main_data','Species')=>array('index'),
	$model->spe_speciesname=>array('view','id'=>$model->spe_id),
	Yii::t('main_layout','Update'),
);

$this->menu=array(
	// array('label'=>'List Species', 'url'=>array('index')),
	// array('label'=>'Create Species', 'url'=>array('create')),
	// array('label'=>'View Species', 'url'=>array('view', 'id'=>$model->spe_id)),
	// array('label'=>'Manage Species', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Update').' '.Yii::t('main_data','Species').' '.$model->spe_speciesname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>