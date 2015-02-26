<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	Yii::t('main_data','News')=>array('index'),
	Yii::t('main_layout','Create'),
);

$this->menu=array(
	// array('label'=>'List News', 'url'=>array('index')),
	// array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Create').' '.Yii::t('main_data','News')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>