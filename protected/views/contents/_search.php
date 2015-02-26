<?php
/* @var $this ContentsController */
/* @var $model Contents */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'con_id'); ?>
		<?php echo $form->textField($model,'con_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_contentname'); ?>
		<?php echo $form->textField($model,'con_contentname',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_knapsack_id'); ?>
		<?php echo $form->textField($model,'con_knapsack_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_metabolite_id'); ?>
		<?php echo $form->textField($model,'con_metabolite_id',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_pubchem_id'); ?>
		<?php echo $form->textField($model,'con_pubchem_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contgroup_id'); ?>
		<?php echo $form->textField($model,'contgroup_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_source'); ?>
		<?php echo $form->textField($model,'con_source',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_speciesname'); ?>
		<?php echo $form->textField($model,'con_speciesname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_file_mol1'); ?>
		<?php echo $form->textField($model,'con_file_mol1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_file_mol2'); ?>
		<?php echo $form->textField($model,'con_file_mol2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_insert_by'); ?>
		<?php echo $form->textField($model,'con_insert_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_insert_date'); ?>
		<?php echo $form->textField($model,'con_insert_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_update_by'); ?>
		<?php echo $form->textField($model,'con_update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_update_date'); ?>
		<?php echo $form->textField($model,'con_update_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_verified_by'); ?>
		<?php echo $form->textField($model,'con_verified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_verified_date'); ?>
		<?php echo $form->textField($model,'con_verified_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->