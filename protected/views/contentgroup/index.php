<?php
/* @var $this ContentgroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contentgroups',
);

$this->menu=array(
	array('label'=>'Create Contentgroup', 'url'=>array('create')),
	array('label'=>'Manage Contentgroup', 'url'=>array('admin')),
);
?>

<h1>Contentgroups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
