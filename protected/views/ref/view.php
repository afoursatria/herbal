<?php
/* @var $this RefController */
/* @var $model Ref */

$this->breadcrumbs=array(
	'Refs'=>array('index'),
	$model->ref_id,
);

$this->menu=array(
	array('label'=>'List Ref', 'url'=>array('index')),
	array('label'=>'Create Ref', 'url'=>array('create')),
	array('label'=>'Update Ref', 'url'=>array('update', 'id'=>$model->ref_id)),
	array('label'=>'Delete Ref', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ref_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ref', 'url'=>array('admin')),
);
?>

<h1>View Ref #<?php echo $model->ref_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ref_id',
		'ref_name',
		'ref_insert_by',
		'ref_insert_date',
		'ref_update_by',
		'ref_update_date',
		'ref_verified_by',
		'ref_verified_date',
	),
)); ?>
