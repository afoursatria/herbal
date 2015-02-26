<?php
/* @var $this LocalnameController */
/* @var $model Localname */	

$this->breadcrumbs=array(
	'Localnames'=>array('index'),
	// $localName->loc_id,
);

// $this->menu=array(
// 	array('label'=>'List Localname', 'url'=>array('index')),
// 	array('label'=>'Create Localname', 'url'=>array('create')),
// 	array('label'=>'Update Localname', 'url'=>array('update', 'id'=>$model->loc_id)),
// 	array('label'=>'Delete Localname', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->loc_id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Localname', 'url'=>array('admin')),
// );
?>

<h1><?php echo Yii::t('main_data','Local Name')?></h1>

<?php 
if ($localName !== NULL){}
	// $this->widget('zii.widgets.CListView', array(
	// 	'data'=>$localName,
	// 	'attributes'=>array(
	// 		'loc_localname',
	// 		'loc_region',
	// 		'ref_id',
	// ),	
	// ));
	$this->widget('zii.widgets.CListView', array(
	'listLocalName'=>$listLocalName,
	'itemView'=>'_view',
	));
	else echo "This Species has no local name";
?>
