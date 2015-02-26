<?php
/* @var $this SpeciesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('main_data','Species'),
);

$this->menu=array(
	array('label'=>'Add Species', 'url'=>array('create'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Species', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->hasState("username") == false),
);
?>


<h1>Species</h1>

<form method="get">
<input type="search" placeholder="Species Name" name="q" value="<?php isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ;

?>" />
<input type="submit" value="search" />
</form>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
