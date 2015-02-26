<?php
/* @var $this AliasesController */
/* @var $model Aliases */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ali_id'); ?>
		<?php echo $form->textField($model,'ali_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_id'); ?>
		<?php echo $form->textField($model,'spe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_speciesname'); ?>
		<?php echo $form->textField($model,'ali_speciesname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_foundername'); ?>
		<?php echo $form->textField($model,'ali_foundername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_varietyname'); ?>
		<?php echo $form->textField($model,'ali_varietyname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_id'); ?>
		<?php echo $form->textField($model,'ref_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_insert_by'); ?>
		<?php echo $form->textField($model,'ali_insert_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_insert_date'); ?>
		<?php echo $form->textField($model,'ali_insert_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_update_by'); ?>
		<?php echo $form->textField($model,'ali_update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_update_date'); ?>
		<?php echo $form->textField($model,'ali_update_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_verified_by'); ?>
		<?php echo $form->textField($model,'ali_verified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ali_verified_date'); ?>
		<?php echo $form->textField($model,'ali_verified_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->