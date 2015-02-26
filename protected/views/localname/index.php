<?php
/* @var $this LocalnameController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Localnames',
);

$this->menu=array(
	array('label'=>'Create Localname', 'url'=>array('create')),
	array('label'=>'Manage Localname', 'url'=>array('admin')),
);
?>

<h1>Localnames</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
