<?php
/* @var $this FaqsController */
/* @var $model Faqs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faqs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('main_data','Fields with').' ';?> <span class="required">*</span> <?php echo Yii::t('main_data','are required');?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'faqs_content'); ?>
	</div>
	<div class="row">
		<?php echo $form->textArea($model,'faqs_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php $this->widget('application.extensions.tinymce.TinyMce'); ?>
	</div>
	<div class="row">
		<?php echo $form->error($model,'faqs_content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Create') : Yii::t('main_layout','Save'),array('id'=>'green','class'=>'button')); ?>
		<?php echo CHtml::link(Yii::t('main_data','Cancel'),array('faqs/index'));?>
	</div>

 
	<script>
	    tinymce.init({
	    selector: "textarea#Faqs_faqs_content",
	    menubar: false,
	    width: 700,
	    height: 300,
	   toolbar1: "undo redo | bold | italic underline | alignleft aligncenter alignright alignjustify ", 
	   toolbar2: "outdent indent | hr | sub sup | bullist numlist | formatselect fontselect fontsizeselect | cut copy paste pastetext pasteword | search replace ", 
	 
	 }); 
	</script>

<?php $this->endWidget(); ?>

</div><!-- form -->