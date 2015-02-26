<?php
/* @var $this LocalnameController */
/* @var $model Localname */

$this->breadcrumbs=array(
	$speId->spe_speciesname=>array('/species/view/id/'.$speId->spe_id),
	Yii::t('main layout','Create'),
);

$this->menu=array(
	array('label'=>'List Localname', 'url'=>array('index')),
	array('label'=>'Manage Localname', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main_layout','Create').' '.Yii::t('main_layout','Local Name')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'speId'=>$speId)); ?>