<h1>Reset Password</h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'custom-form',
	'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'email'); ?></span>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">

        <span class="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','verifyCode')); ?></span>
        <span class="col-md-9">
        <div class="row"><?php $this->widget('CCaptcha', array('buttonLabel'=>Yii::t('main_data','Refresh code'))); ?>
        </div>
        <div class="row">
        <?php echo Yii::t('main_data','Please enter the letters as they are shown in the image above. <br/>Letters are not case-sensitive');?>.
        </div>
        <div class="row">
        <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
        <div class="row">
        <?php echo $form->error($model,'verifyCode'); ?>
    </div>
         </span>
    </div>
    <?php endif; ?>

	<div class="row submit buttons">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <?php echo CHtml::submitButton('Reset',array('id'=>'blue','class'=>'button')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div>
