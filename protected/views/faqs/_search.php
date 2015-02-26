<?php
/* @var $this FaqsController */
/* @var $model Faqs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'faqs_id'); ?>
		<?php echo $form->textField($model,'faqs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'faqs_content'); ?>
		<?php echo $form->textArea($model,'faqs_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'faqs_lang'); ?>
		<?php echo $form->textField($model,'faqs_lang',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->