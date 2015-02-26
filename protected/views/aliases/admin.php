<?php
/* @var $this AliasesController */
/* @var $model Aliases */

$this->breadcrumbs=array(
	'Aliases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Aliases', 'url'=>array('index')),
	array('label'=>'Create Aliases', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#aliases-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Aliases</h1>

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
	'id'=>'aliases-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ali_id',
		'spe_id',
		'ali_speciesname',
		'ali_foundername',
		'ali_varietyname',
		'ref_id',
		/*
		'ali_insert_by',
		'ali_insert_date',
		'ali_update_by',
		'ali_update_date',
		'ali_verified_by',
		'ali_verified_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
