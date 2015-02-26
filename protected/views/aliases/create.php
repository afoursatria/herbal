<?php
/* @var $this AliasesController */
/* @var $model Aliases */

$this->breadcrumbs=array(
	Yii::t('main_data','Aliases')=>array('index'),
	Yii::t('main_layout'.'Create'),
);

$this->menu=array(
	array('label'=>'List Aliases', 'url'=>array('index')),
	array('label'=>'Manage Aliases', 'url'=>array('admin')),
);
?>

<h1><?php Yii::t('main_layout','Create').' '.Yii::t('main_data','Aliases')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>