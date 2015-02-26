<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	'Species'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Species', 'url'=>array('index')),
	array('label'=>'Manage Species', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Create').' '.Yii::t('main_data','Species')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>