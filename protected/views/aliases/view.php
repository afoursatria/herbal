<?php
/* @var $this AliasesController */
/* @var $model Aliases */

$this->breadcrumbs=array(
	'Aliases'=>array('search'),
	$model->ali_id,
);

$this->menu=array(
	// array('label'=>'List Aliases', 'url'=>array('index')),
	// array('label'=>'Create Aliases', 'url'=>array('create')),
	// array('label'=>'Update Aliases', 'url'=>array('update', 'id'=>$model->ali_id)),
	// array('label'=>'Delete Aliases', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ali_id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Aliases', 'url'=>array('admin')),
);
?>

<h1>View Aliases #<?php echo $model->ali_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ali_id',
		'spe_id',
		'ali_speciesname',
		'ali_foundername',
		'ali_varietyname',
		'ref_id',
		'ali_insert_by',
		'ali_insert_date',
		'ali_update_by',
		'ali_update_date',
		'ali_verified_by',
		'ali_verified_date',
	),
)); ?>
