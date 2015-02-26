<?php
/* @var $this AliasesController */
/* @var $model Aliases */

$this->breadcrumbs=array(
	Yii::t('main_data','Aliases')=>array('index'),
	Yii::t('main_layout','Update'),
);

// $this->menu=array(
// 	array('label'=>'List Aliases', 'url'=>array('index')),
// 	array('label'=>'Create Aliases', 'url'=>array('create')),
// 	array('label'=>'View Aliases', 'url'=>array('view', 'id'=>$model->ali_id)),
// 	array('label'=>'Manage Aliases', 'url'=>array('admin')),
// );
?>

<h1><?php echo Yii::t('main_layout','Update').' '.Yii::t('main_data','Aliases').' '.$model->ali_speciesname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>