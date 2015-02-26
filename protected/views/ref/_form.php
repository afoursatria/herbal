<?php
/* @var $this RefController */
/* @var $model Ref */
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
	'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>
	
	<p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ref_name'); ?></span>
		<?php echo $form->textField($model,'ref_name',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'ref_name'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ref_source'); ?></span>
		<?php echo $form->textField($model,'ref_source',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'ref_source'); ?>
	</div>

	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update'),array('id'=>'blue','class'=>'button')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->