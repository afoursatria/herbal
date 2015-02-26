<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="news-view">
	<div class="news-operation">
		<?php if (Yii::app()->user->getState('role')==1) {
	?>
	<?php echo CHtml::link(Yii::t('main_layout','<span class="glyphicon glyphicon-pencil green-text"></span>'.'Update'),  array('news/update', 'id'=>$data->news_id)); ?>
	<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('news/delete', 'id'=>$data->news_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); }?>
	</div>
	<!--Kategori-->
	<b class="news-category"><?php echo CHtml::encode($data->getAttributeLabel('newscat_id')); ?>:</b>
	<?php echo CHtml::encode($data->newscat->newscat_name); ?>
	<!--Judul-->
	<div class = "title-news">
	<h3><?php echo CHtml::encode($data->news_title); ?></h3>
	</div>
	<!--isi-->
	<?php 
	if (strlen($data->news_content) > 500) {
		echo substr($data->news_content, 0, 490)."...".CHtml::link(Yii::t('main_data','Read More'),array('news/view', 'id'=>$data->news_id));
	}
	else echo $data->news_content;?>
	<br />
	
</div>