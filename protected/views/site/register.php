<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap232.min.js"></script>
<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<?php $this->breadcrumbs=array(
    'Register'
);
?>
<?php 
if (Yii::app()->user->getState('role')==1) {
    echo CHtml::link(Yii::t('user','Back to User List'), array('user/admin'));
}
?>
<h2><?php echo Yii::t('user','Registration Form');?></h2>



<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'custom-form',
    'type'=>'inline',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),
)); ?>
    <p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>
    <div class="row">
        <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Fullname')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_fullname');?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 25 Characters')?></span>
        <?php echo $form->error($model,'use_fullname'); ?>
    </div>

    <div class="row">
        <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Gender')); ?><span class="red">*</span></span>
        <?php echo $form->radioButtonList($model,'use_gender', 
            array( 0 => Yii::t('user','Male'),
                    1 => Yii::t('user','Female'))); ?><span class="form-hint"><?php echo Yii::t('main_data','Choose one')?></span>
        <?php echo $form->error($model,'use_gender'); ?>
    </div>
    
    <div class="row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Birthdate')); ?><span class="red">*</span></span>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model, 'attribute'=>'use_birthdate',
        'options'=>array(
        'dateFormat'=>'yy-mm-dd',
        'yearRange'=>'-70:+0',
        'changeYear'=>'true',
        'changeMonth'=>'true',
            ),
        )); ?><span class="form-hint"><?php echo Yii::t('main_data','Click text field to pick from calendar')?></span>
        <?php echo $form->error($model,'use_birthdate'); ?>
    </div>
    
    <div class="row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Email')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_email'); ?><span class="form-hint"><?php echo Yii::t('main_data','Max. Length 25 Characters')?></span>
        <?php echo $form->error($model,'use_email'); ?>
    </div>

    <div class="row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Username')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_username'); ?><span class="form-hint"><?php echo Yii::t('main_data','Must be around 6-12 characters')?></span>
        <?php echo $form->error($model,'use_username'); ?>
    </div>

    <div class="row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Password')); ?><span class="red">*</span></span>
        <?php echo $form->PasswordField($model,'use_password'); ?><span class="form-hint"><?php echo Yii::t('main_data','Contains of alphabet and number, min.5 characters');?></span>
        <?php echo $form->error($model,'use_password'); ?>
    </div>

    <div class="row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Repeat Password')); ?><span class="red">*</span></span>
        <?php echo $form->PasswordField($model,'repeat_password'); ?><span class="form-hint"><?php echo Yii::t('main_data','Must be match with "Password" field')?></span>
        <?php echo $form->error($model,'repeat_password'); ?>
    </div>

    <div class="row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Role')); ?><span class="red">*</span></span>
         <?php 
            if (!Yii::app()->user->isGuest)  
                echo $form->dropdownList($model,'rol_id', 
                array(
                    1 => 'Admin',
                    2 => 'Expert',
                    3 => 'Contributor'), array('empty'=>'Choose Role')); 
            
            else echo $form->dropdownList($model,'rol_id', 
                array(  
                    2 => 'Expert',
                    3 => 'Contributor'), array('empty'=>'Choose Role')); 
            ?><span class="form-hint"><?php echo Yii::t('main_data','Choose one')?></span>
        <?php echo $form->error($model,'rol_id'); ?>
    </div>
    
    <div class="row">
        <span class ="col-md-3"><?php echo $form->labelEx($model,'use_foto'); ?></span>
        <span class="col-md-9"><?php echo CHtml::activeFileField($model, 'use_foto'); ?> </span>
        <?php echo $form->error($model,'use_foto'); ?>
    </div>

    <div class="row">
        <span class="col-md-3"><?php echo $form->labelEx($model,'use_cv'); ?></span>
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

    <?php if(CCaptcha::checkRequirements()): ?>
    <div class= "row">
         <span class ="col-md-3"><?php echo $form->labelEx($model,Yii::t('user','Verification Code')); ?><span class="red">*</span></span>
        <div class = "form col-md-9">
            <div class = "row">
            <?php $this->widget('CCaptcha', array('buttonLabel'=>Yii::t('main_data','Refresh code'))); ?>
            </div>
            <div class = "row">
            <?php echo $form->textField($model,'verifyCode'); ?>
            </div>
            <div class="row hint"><?php echo Yii::t('main_data','Please enter the letters as they are shown in the image above. <br/>(Letters are not case-sensitive)');?>.</div>
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
        
    </div>
    <?php endif; ?>

    <div class="row buttons">
        <div class="col-md-3"></div>
        <div class="col-md-9"><?php echo CHtml::submitButton(Yii::t('main_layout','Submit'), array('id'=>'blue','class'=>'button')); ?></div>
    </div>
    
    <?php $this->endWidget(); ?>
</div>