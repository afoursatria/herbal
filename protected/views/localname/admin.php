<?php
/* @var $this LocalnameController */
/* @var $model Localname */

$this->breadcrumbs=array(
	'Localnames'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Localname', 'url'=>array('index')),
	array('label'=>'Create Localname', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#localname-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Localnames</h1>

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
	'id'=>'localname-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'loc_id',
		'spe_id',
		'loc_localname',
		'loc_region',
		'ref_id',
		'loc_insert_by',
		/*
		'loc_insert_date',
		'loc_update_by',
		'loc_update_date',
		'loc_verified_by',
		'loc_verified_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
