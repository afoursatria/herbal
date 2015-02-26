<?php
/* @var $this VirtueController */
/* @var $model Virtue */

$this->breadcrumbs=array(
	'Virtues'=>array('index'),
	$model->vir_id,
);

$this->menu=array(
	array('label'=>'List Virtue', 'url'=>array('index')),
	array('label'=>'Create Virtue', 'url'=>array('create')),
	array('label'=>'Update Virtue', 'url'=>array('update', 'id'=>$model->vir_id)),
	array('label'=>'Delete Virtue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vir_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Virtue', 'url'=>array('admin')),
);
?>

<h1>View Virtue #<?php echo $model->vir_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vir_id',
		'spe_id',
		'hp_code',
		'vir_type',
		'vir_value',
		'vir_value_en',
		'vir_value_latin',
		'ref_id',
		'vir_insert_by',
		'vir_insert_date',
		'vir_update_by',
		'vir_update_date',
		'vir_verified_by',
		'vir_verified_date',
	),
)); ?>
