<?php
/* @var $this RefController */
/* @var $model Ref */

$this->breadcrumbs=array(
	'Refs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ref', 'url'=>array('index')),
	array('label'=>'Manage Ref', 'url'=>array('admin')),
);
?>

<h1>Create Ref</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>