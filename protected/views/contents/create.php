<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Contents', 'url'=>array('index')),
	// array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Create').' '. Yii::t('main_data','Compound')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>