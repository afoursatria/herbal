<?php
/* @var $this VirtueController */
/* @var $model Virtue */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vir_id'); ?>
		<?php echo $form->textField($model,'vir_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_id'); ?>
		<?php echo $form->textField($model,'spe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hp_code'); ?>
		<?php echo $form->textField($model,'hp_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_type'); ?>
		<?php echo $form->textField($model,'vir_type',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_value'); ?>
		<?php echo $form->textArea($model,'vir_value',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_value_en'); ?>
		<?php echo $form->textArea($model,'vir_value_en',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_value_latin'); ?>
		<?php echo $form->textArea($model,'vir_value_latin',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_id'); ?>
		<?php echo $form->textField($model,'ref_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_insert_by'); ?>
		<?php echo $form->textField($model,'vir_insert_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_insert_date'); ?>
		<?php echo $form->textField($model,'vir_insert_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_update_by'); ?>
		<?php echo $form->textField($model,'vir_update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_update_date'); ?>
		<?php echo $form->textField($model,'vir_update_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_verified_by'); ?>
		<?php echo $form->textField($model,'vir_verified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vir_verified_date'); ?>
		<?php echo $form->textField($model,'vir_verified_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->