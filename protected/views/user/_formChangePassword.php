<h1><?php echo Yii::t('user','Change Password');?></h1>
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
        <div class="row">
            <span class="col-md-3"><?php echo $form->labelEx($model,'currentPassword'); ?></span>
            <?php echo $form->passwordField($model,'currentPassword'); ?>
        <?php echo $form->error($model,'currentPassword'); ?>

        </div>

        <div class="row">
            <span class="col-md-3"><?php echo $form->labelEx($model,'newPassword'); ?></span>
            <?php echo $form->passwordField($model,'newPassword'); ?>
            <?php echo $form->error($model,'newPassword'); ?>
        </div>

        <div class="row">
            <span class="col-md-3"><?php echo $form->labelEx($model,'newPasswordRepeat'); ?></span>
            <?php echo $form->passwordField($model,'newPasswordRepeat'); ?>
            <?php echo $form->error($model,'newPasswordRepeat'); ?>
        </div>

        <div class="row submit buttons">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <?php echo CHtml::submitButton(Yii::t('main_data','Change password'),array('id'=>'blue','class'=>'button')); ?>
                <?php echo CHtml::link(Yii::t('main_data','Cancel'), array('user/profile', 'id'=>Yii::app()->user->getState('no')));?>
            </div>
        </div>

 <?php $this->endWidget(); ?>
    </div><!-- form -->