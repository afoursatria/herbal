<?php
/* @var $this ContentgroupController */
/* @var $model Contentgroup */

$this->breadcrumbs=array(
	'Contentgroups'=>array('index'),
	$model->contgroup_id,
);

$this->menu=array(
	array('label'=>'List Contentgroup', 'url'=>array('index')),
	array('label'=>'Create Contentgroup', 'url'=>array('create')),
	array('label'=>'Update Contentgroup', 'url'=>array('update', 'id'=>$model->contgroup_id)),
	array('label'=>'Delete Contentgroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->contgroup_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contentgroup', 'url'=>array('admin')),
);
?>

<h1>View Contentgroup #<?php echo $model->contgroup_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'contgroup_id',
		'contgroup_code',
		'contgroup_name',
		'contgroup_insert_by',
		'contgroup_insert_date',
		'contgroup_update_by',
		'contgroup_update_date',
		'contgroup_verified_by',
		'contgroup_verified_date',
	),
)); ?>
