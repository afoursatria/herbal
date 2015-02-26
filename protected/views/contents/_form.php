<?php
/* @var $this ContentsController */
/* @var $model Contents */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'custom-form',
	'type'=>'inline',

	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),

)); ?>
	<p class="note"><?php echo Yii::t('main_data','Fields with').' ';?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.';?></p>


	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_contentname'); ?></span>
		<?php echo $form->textField($model,'con_contentname',array('size'=>60,'maxlength'=>200)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 200 Characters')?></span>
		<?php echo $form->error($model,'con_contentname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_knapsack_id'); ?></span>
		<?php echo $form->textField($model,'con_knapsack_id',array('size'=>20,'maxlength'=>20)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 20 Characters')?></span>
		<?php echo $form->error($model,'con_knapsack_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_metabolite_id'); ?></span>
		<?php echo $form->textField($model,'con_metabolite_id',array('size'=>40,'maxlength'=>100)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'con_metabolite_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_pubchem_id'); ?></span>
		<?php echo $form->textField($model,'con_pubchem_id',array('size'=>20,'maxlength'=>20)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 20 Characters')?></span>
		<?php echo $form->error($model,'con_pubchem_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'contgroup_id'); ?></span>
		<?php echo $form->dropdownList($model,'contgroup_id', 
			CHtml::listData(Contentgroup::model()->findAll(array('order' => 'contgroup_name ASC')),'contgroup_id','contgroup_name'),
			array('prompt'=>Yii::t('main_data','Choose Compound Group'))); ?>
		<?php echo $form->error($model,'contgroup_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_source'); ?></span>
		<?php echo $form->textField($model,'con_source',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'con_source'); ?>
	</div>
	
	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_file_mol1'); ?>(.mol)</span>
		<span class="col-md-9">
			<?php echo $form->fileField($model,'con_file_mol1'); ?>
			<?php echo $form->error($model,'con_file_mol1'); ?>
		</span>
	</div>
	
	<div class="row">
	<?php 
	 if(!$model->isNewRecord){ 
		?>
     	<?php 
     	echo CHtml::link(CHtml::encode($model->con_contentname.".mol"),Yii::app()->request->baseUrl.'/assets/mol/mol1/'.$model->con_contentname.'.mol');

     } 
     ?>
	</div>
	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'con_file_mol2'); ?>(.mol)</span>
		<span class="col-md-9"><?php echo $form->fileField($model,'con_file_mol2'); ?>
			<?php echo $form->error($model,'con_file_mol2'); ?>
		</span>
	</div>

	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Create') : Yii::t('main_layout','Update'),array('id'=>'blue','class'=>'button')); ?>
			<?php if (!$model->isNewRecord){
			echo CHtml::link(Yii::t('main_data','Cancel'), array('contents/view', 'id'=>$model->con_id));
			}?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->