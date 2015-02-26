<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	Yii::t('main_data','News')=>array('index'),
	$model->news_id,
);

if (Yii::app()->user->getState('role')==1) {
	?>
<?php echo CHtml::link(Yii::t('main_layout','Update'),  array('news/update', 'id'=>$model->news_id)); ?>
<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('localname/delete', 'id'=>$model->news_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); }?>
<h1><?php echo $model->news_title; ?></h1>
<div>
<?php echo $model->news_content;?>
</div>
