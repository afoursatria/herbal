<?php
/* @var $this SpeciesController */
/* @var $model Species */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'spe_id'); ?>
		<?php echo $form->textField($model,'spe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_species_id'); ?>
		<?php echo $form->textField($model,'spe_species_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_speciesname'); ?>
		<?php echo $form->textField($model,'spe_speciesname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_varietyname'); ?>
		<?php echo $form->textField($model,'spe_varietyname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_familyname'); ?>
		<?php echo $form->textField($model,'spe_familyname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_foundername'); ?>
		<?php echo $form->textField($model,'spe_foundername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_foto'); ?>
		<?php echo $form->textField($model,'spe_foto',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_id'); ?>
		<?php echo $form->textField($model,'ref_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_insert_by'); ?>
		<?php echo $form->textField($model,'spe_insert_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_insert_date'); ?>
		<?php echo $form->textField($model,'spe_insert_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_update_by'); ?>
		<?php echo $form->textField($model,'spe_update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_update_date'); ?>
		<?php echo $form->textField($model,'spe_update_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_verified_by'); ?>
		<?php echo $form->textField($model,'spe_verified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spe_verified_date'); ?>
		<?php echo $form->textField($model,'spe_verified_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->