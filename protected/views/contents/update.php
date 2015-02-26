<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	Yii::t('main_data','Compounds')=>array('index'),
	Yii::t('main_layout','Update'),
);

$this->menu=array(
	// array('label'=>'List Contents', 'url'=>array('index')),
	// array('label'=>'Create Contents', 'url'=>array('create')),
	// array('label'=>'View Contents', 'url'=>array('view', 'id'=>$model->con_id)),
	// array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Update').' '. Yii::t('main_data','Compound').' '.$model->con_contentname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>