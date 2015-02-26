<?php
/* @var $this UserController */
/* @var $model User */
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
	'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'well'),
)); ?>

	<p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<span class ="col-md-3"><?php echo $form->labelEx($model,'use_fullname'); ?></span>
		<?php echo $form->textField($model,'use_fullname',array('size'=>25,'maxlength'=>25)); ?>
		 <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 25 Characters') ?></span>
		<?php echo $form->error($model,'use_fullname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'use_email'); ?></span>
		<?php echo $form->textField($model,'use_email',array('size'=>25,'maxlength'=>25)); ?><span class="form-hint">(Max.Length 25 characters)</span>
		<?php echo $form->error($model,'use_email'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'use_birthdate'); ?></span>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        	'model'=>$model, 'attribute'=>'use_birthdate',
        	'options'=>array(
        	'dateFormat'=>'yy-mm-dd',
        	'yearRange'=>'-70:+0',
        	'changeYear'=>'true',
        	'changeMonth'=>'true',
            ),
		)); 
        ?><span class="form-hint"><?php echo Yii::t('main_data','Click text field to pick from calendar')?></span>
    </div>

	<div class="row">
        <span class="col-md-3"><?php echo $form->labelEx($model,'use_foto'); ?><span class="form-hint"><?php echo "(.jpg / .png)"?></span></span>
        <span class="col-md-9"><?php echo CHtml::activeFileField($model, 'use_foto'); ?>
	        <div class="row">
	        	<?php echo $form->error($model,'use_foto'); ?>	
	        </div>
			<div class ="row">
				  	<?php
     	if($model->use_foto == null){
	     	echo CHtml::image(Yii::app()->request->baseUrl.'/images/user.png',"image",array("width"=>200));} 
     		else echo CHtml::image(Yii::app()->request->baseUrl.'/assets/user/photo/'.$model->use_foto.'.jpg',"image",array("width"=>200)); ?>
			
			</div>
		</span>
	</div>
	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'use_cv'); ?><span class="form-hint"><?php echo "(.pdf)"?></span></span>
		<span class="col-md-9"><?php echo $form->fileField($model,'use_cv'); ?>
			<div class="row">
				<?php echo $form->error($model,'use_cv'); ?>
			</div>
			<div class="row">
				<?php if(!$model->isNewRecord){ ?>
		     	<?php echo CHtml::link(CHtml::encode($model->use_cv),Yii::app()->request->baseUrl.'/assets/user/cv/'.$model->use_cv.'.pdf');} ?>
				
			</div>
		</span>
	</div>
	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update'), array('id'=>'blue','class'=>'button')); ?>
		<?php if (!$model->isNewRecord){
			echo CHtml::link(Yii::t('main_data','Cancel'), array('user/profile/', 'id'=>$model->use_id));
			}?>
	</div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->