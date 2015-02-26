<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	Yii::t('main_data','News')=>array('index'),
	$model->news_id=>array('view','id'=>$model->news_id),
	Yii::t('main_data','Update'),
);
?>
<h1><?php echo Yii::t('main_layout','Update').' '.Yii::t('main_data','News').': '.$model->news_title	; ?></h1>
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>