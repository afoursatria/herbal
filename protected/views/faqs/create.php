<?php
/* @var $this FaqsController */
/* @var $model Faqs */

$this->breadcrumbs=array(
	'Faqs'=>array('index'),
	Yii::t('main_layout','Create'),
);

$this->menu=array(
	// array('label'=>'List Faqs', 'url'=>array('index')),
	// array('label'=>'Manage Faqs', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Create')?> Faqs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>