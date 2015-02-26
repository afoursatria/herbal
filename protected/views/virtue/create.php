<?php
/* @var $this VirtueController */
/* @var $model Virtue */

$this->breadcrumbs=array(
	'Virtues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Virtue', 'url'=>array('index')),
	array('label'=>'Manage Virtue', 'url'=>array('admin')),
);
?>

<h1>Create Virtue</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>