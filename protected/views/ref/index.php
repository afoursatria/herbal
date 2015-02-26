<?php
/* @var $this RefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('main_data','Refs'),
);

$this->menu=array(
	array('label'=>'Create Ref', 'url'=>array('create')),
	array('label'=>'Manage Ref', 'url'=>array('admin')),
);
?>

<h1><?php echo ('main_data','Refs');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
