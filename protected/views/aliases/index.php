<?php
/* @var $this AliasesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('main_data','Aliases'),
);

$this->menu=array(
	array('label'=>'Create Aliases', 'url'=>array('create')),
	array('label'=>'Manage Aliases', 'url'=>array('admin')),
);
?>

<h1>Aliases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
