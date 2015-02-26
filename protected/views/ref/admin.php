<?php
/* @var $this RefController */
/* @var $model Ref */

$this->breadcrumbs=array(
	'Refs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ref', 'url'=>array('index')),
	array('label'=>'Create Ref', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ref-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Refs</h1>

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
	'id'=>'ref-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ref_id',
		'ref_name',
		'ref_insert_by',
		'ref_insert_date',
		'ref_update_by',
		'ref_update_date',
		/*
		'ref_verified_by',
		'ref_verified_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
