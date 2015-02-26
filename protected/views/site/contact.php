<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1><?php echo Yii::t('main_data','Contact Us');?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>
<div class = "contact row">
	<div class = "col-md-9">
		<p>
		<? echo Yii::t('main_data','If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.');?>
		</p>
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'custom-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
			<p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>
			<div class="row">
				<?php echo $form->labelEx($model,'name'); ?>
			</div>
		    <div class="row">
		    	<span class="form-hint vertical"><?php echo Yii::t('main_data','Max. Length 25 Characters')?></span>
			</div>
			<div class="row">
				<?php echo $form->textField($model,'name'); ?>
			</div>
			<div class="row">
				<?php echo $form->error($model,'name'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
			</div>
			 <div class="row">
		        <span class="form-hint vertical"><?php echo Yii::t('main_data','Email has to be a valid email address')?></span>
			</div>
			<div class="row">
				<?php echo $form->textField($model,'email'); ?>
		    </div>
			<div class="row">
				<?php echo $form->error($model,'email'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'subject'); ?>
			</div>
			 <div class="row">
		    	<span class="form-hint vertical"><?php echo Yii::t('main_data','Max. Length 128 Characters')?></span>
			</div>
			<div class="row">
				<?php echo $form->textField($model,'subject',array('size'=>50,'maxlength'=>128)); ?>
		    </div>
			<div class="row">	
				<?php echo $form->error($model,'subject'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'body'); ?>
			</div>
			<div class="row">
				<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
			</div>
			<div class="row">
				<?php echo $form->error($model,'body'); ?>
			</div>
			<?php if(CCaptcha::checkRequirements()): ?>
			<div class="row">
				<?php echo $form->labelEx($model,'verifyCode'); ?>
			</div>
			<div class = "row">
				<span class="form-hint vertical"><?php echo Yii::t('main_data','Verify Code needs to be entered correctly')?></span>
			</div>
			<div class = "row">
				<?php $this->widget('CCaptcha', array('buttonLabel'=>Yii::t('main_data','Refresh code'))); ?>
			</div>
				<div class="row hint"><?php echo Yii::t('main_data','Please enter the letters as they are shown in the image above. <br/>Letters are not case-sensitive');?>.</div>
			<div class = "row">
				<?php echo $form->textField($model,'verifyCode'); ?>
			</div>
				<?php echo $form->error($model,'verifyCode'); ?>

				<?php endif; ?>

				<div class="row buttons">
					<div class="col-md-9">
					<?php echo CHtml::submitButton(Yii::t('main_layout','Submit'), array('id'=>'blue','class'=>'button')); ?>
					<?php echo CHtml::link(Yii::t('main_data','Cancel'),array('/site/index'));?>
				</div>
			</div>
			<?php $this->endWidget(); ?>
		</div><!-- form -->
	</div><!-- col-md-9 -->
	<div class="col-md-3">
		 <div class="sidebar-right clearfix">
        <p class="text text-114">Email</p>
        <p class="text text-117">admin@herbaldbindo.com</p>
        <div class="element element-22"></div>
        <p class="text text-120"><?php echo Yii::t('main_data','In charge person')?></p>
        <p class="text text-123">Heru Suhartanto</p>
        <p class="text text-124">Arry Yanuar</p>
        <p class="text text-128">M. Afour Satria</p>
        <p class="text text-129">Annisa Prida R</p>
        <div class="element element-29"></div>
        <img class="image image-35" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mail(2).png">
        <img class="image image-36" src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter.png">
      </div>
	</div>
</div><!-- row -->
<?php endif; ?>