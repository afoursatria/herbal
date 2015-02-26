<?php
/* @var $this VirtueController */
/* @var $model Virtue */

$this->breadcrumbs=array(
	'Virtues'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Virtue', 'url'=>array('index')),
	array('label'=>'Create Virtue', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#virtue-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Virtues</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'virtue-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vir_id',
		'spe_id',
		'hp_code',
		'vir_type',
		'vir_value',
		'vir_value_en',
		/*
		'vir_value_latin',
		'ref_id',
		'vir_insert_by',
		'vir_insert_date',
		'vir_update_by',
		'vir_update_date',
		'vir_verified_by',
		'vir_verified_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
