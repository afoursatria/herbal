<?php
/* @var $this VirtueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Virtues',
);

$this->menu=array(
	array('label'=>'Create Virtue', 'url'=>array('create')),
	array('label'=>'Manage Virtue', 'url'=>array('admin')),
);
?>

<h1>Virtues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
