<?php
/* @var $this ContentgroupController */
/* @var $model Contentgroup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
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
		<span class="col-md-3"><?php echo $form->labelEx($model,'contgroup_code'); ?></span>
		<?php echo $form->textField($model,'contgroup_code',array('size'=>20,'maxlength'=>20)); ?>
		 <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 20 Characters')?></span>
		<?php echo $form->error($model,'contgroup_code'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'contgroup_name'); ?></span>
		<?php echo $form->textField($model,'contgroup_name',array('size'=>60,'maxlength'=>100)); ?>
		 <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 20 Characters')?></span>
		<?php echo $form->error($model,'contgroup_name'); ?>
	</div>

	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Create') : Yii::t('main_layout','Update'),array('id'=>'blue','class'=>'button')); ?>
			<?php if (!$model->isNewRecord){
			echo CHtml::link(Yii::t('main_data','Cancel'), array('species/view', 'id'=>$model->spe_id));
			}?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->