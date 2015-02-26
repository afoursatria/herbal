<?php
/* @var $this LocalnameController */
/* @var $model Localname */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'loc_id'); ?>
		<?php echo $form->textField($model,'loc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_id'); ?>
		<?php echo $form->textField($model,'spe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_localname'); ?>
		<?php echo $form->textField($model,'loc_localname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_region'); ?>
		<?php echo $form->textField($model,'loc_region',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_id'); ?>
		<?php echo $form->textField($model,'ref_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_insert_by'); ?>
		<?php echo $form->textField($model,'loc_insert_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_insert_date'); ?>
		<?php echo $form->textField($model,'loc_insert_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_update_by'); ?>
		<?php echo $form->textField($model,'loc_update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_update_date'); ?>
		<?php echo $form->textField($model,'loc_update_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_verified_by'); ?>
		<?php echo $form->textField($model,'loc_verified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_verified_date'); ?>
		<?php echo $form->textField($model,'loc_verified_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->