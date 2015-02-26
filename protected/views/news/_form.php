<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'custom-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>
	<p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>
	<div class = "row">
		<?php //echo $form->errorSummary($model); ?>
	</div>
	<div class = "row">
		<span class = "col-md-3"><?php echo $form->labelEx($model,'news_title'); ?></span>
		<?php echo $form->textField($model,'news_title',array('length'=>20)); ?>
		<span class="form-hint vertical"><?php echo Yii::t('main_data','Max. Length 20 Characters')?></span>
		<?php echo $form->error($model,'news_title'); ?>
	</div>
	<div class="row">
		<span class = "col-md-3"><?php echo $form->labelEx($model,'newscat_id'); ?></span>
		<?php echo $form->dropDownList($model,'newscat_id', 
			CHtml::listData(NewsCategory::model()->findAll(),'newscat_id','newscat_name'), 
			array('prompt'=>'Choose category')); ?>
		<?php echo $form->error($model,'newscat_id'); ?>
	</div>
	<div class="row">
		<span class = "col-md-3"><?php echo $form->labelEx($model,'news_content'); ?></span>
		<span class="col-md-9"><?php echo $form->textArea($model,'news_content',array('rows'=>6, 'cols'=>70,'width'=>500)); ?></span>
		<?php echo $form->error($model,'news_content'); ?>
	</div>
	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update'),array('id'=>'blue','class'=>'button')); ?>
		<?php if (!$model->isNewRecord){
			echo CHtml::link(Yii::t('main_data','Cancel'), array('index'));
			}?>
	</div>
	</div>

	<?php $this->widget('application.extensions.tinymce.TinyMce'); ?>
 
	<script>
	    tinymce.init({
	    selector: "textarea#News_news_content",
	    menubar: false,
	    width: 600,
	    height: 300,
	   toolbar1: "undo redo | bold | italic underline | alignleft aligncenter alignright alignjustify ", 
	   toolbar2: "outdent indent | hr | sub sup | bullist numlist | formatselect fontselect fontsizeselect | cut copy paste pastetext pasteword | search replace ", 
	 
	 }); 
	</script>

<?php $this->endWidget(); ?>

</div><!-- form -->