<?php
/* @var $this SpeciesController */
/* @var $model Species */
/* @var $form CActiveForm */
?>

<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap232.min.js"></script>

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
    'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'well'),
)); ?>
	
	<p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>
	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_species_id'); ?></span>
		<?php echo $form->textField($model,'spe_species_id',array('size'=>60,'maxlength'=>20)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 20 Characters')?></span>
		<?php echo $form->error($model,'spe_species_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_speciesname'); ?></span>
		<?php echo $form->textField($model,'spe_speciesname',array('size'=>60,'maxlength'=>60)); ?>
		<span class="form-hint"><?php echo Yii::t('main_data','Max. Length 60 Characters')?></span>
		<?php echo $form->error($model,'spe_speciesname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_varietyname'); ?></span>
		<?php echo $form->textField($model,'spe_varietyname',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'spe_varietyname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_familyname'); ?></span>
		<?php echo $form->textField($model,'spe_familyname',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'spe_familyname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_foundername'); ?></span>
		<?php echo $form->textField($model,'spe_foundername',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
		<?php echo $form->error($model,'spe_foundername'); ?>
	</div>

	<div class="row">
        <span class="col-md-3"><?php echo $form->labelEx($model,'spe_foto'); ?>(.jpg/.png)</span>
        <span class="col-md-9"><?php echo CHtml::activeFileField($model, 'spe_foto'); ?>
	        <div class="row">
	        	<?php echo $form->error($model,'spe_foto'); ?>	
	        </div>
			<div class ="row">
				  	<?php
     	if($model->spe_foto == null){

	     	if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl.'/images/species.png',"image",array("width"=>200));} 
     		else echo CHtml::image(Yii::app()->request->baseUrl.'/assets/species/pic/'.$model->spe_foto.'.jpg',"image",array("width"=>200)); ?>
			</div>
		</span>
	</div>

	<div class="row">
		<div class="control-group" id="fields">
		
			<?php 
				// $opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
				// $tes = Ref::model()->findAll();
				// $ref_array = array();
				// foreach ($tes as $key) {
				// 	array_push($ref_array, $key->ref_id);
				// }
				// // echo $tes;
			?>
						<span class="col-md-3"><?php echo $form->labelEx($model,'ref_id'); ?>(Typeahead)</span>
			<div class="col-md-9">
			<?php 
				// $this->widget('bootstrap.widgets.TbTypeahead',array(
				// 		'model'=>$model,
				// 		'attribute'=>'ref_id',
				// 		'id'=>'field1',
				// 		'name'=>'ref_id1',
				// 		'options'=>array(
				// 			'source'=>$ref_array,
				// 			'matcher'=>"js:function(item){return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
				// 			'items'=>5,
				// 			// 'class'=>'input-append',
				// 			'autocomplete'=>'off'
				// 		)
				// 	));
		// 	// $opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
		// 	// echo $form->dropDownList($model,'ref_id', $opts, array('prompt'=>Yii::t('main_data','Choose Reference')));
		 $this->widget('EJuiAutoCompleteFkField', array(
      'model'=>$model, 
      'attribute'=>'ref_id', //the FK field (from CJuiInputWidget)
      // controller method to return the autoComplete data (from CJuiAutoComplete)
      'sourceUrl'=>Yii::app()->createUrl('/user/findRefName'), 
      // defaults to false.  set 'true' to display the FK field with 'readonly' attribute.
      'showFKField'=>false,
       // display size of the FK field.  only matters if not hidden.  defaults to 10
      'FKFieldSize'=>15, 
      'relName'=>'ref', // the relation name defined above
      'displayAttr'=>'ref_name',  // attribute or pseudo-attribute to display
      // length of the AutoComplete/display field, defaults to 50
      'autoCompleteLength'=>60,
      // any attributes of CJuiAutoComplete and jQuery JUI AutoComplete widget may 
      // also be defined.  read the code and docs for all options
      'options'=>array(
          // number of characters that must be typed before 
          // autoCompleter returns a value, defaults to 2
          'minLength'=>1, 
      ),
 	));
 		?>
 		<!-- <button id="b1" class="btn add-more" type="button">+</button> -->
				<?php
					// $this->widget('bootstrap.widgets.TbTypeahead',array(
					// 	'model'=>$model,
					// 	'attribute'=>'ref_id',
					// 	'id'=>'field1',
					// 	'name'=>'ref_id1',
					// 	'options'=>array(
					// 		'source'=>$ref_array,
					// 		'matcher'=>"js:function(item){return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
					// 		'items'=>5,
					// 		// 'class'=>'input-append',
					// 		'autocomplete'=>'off'
					// 	)
					// ));
				?>

			<!-- <button id="b1" class="btn add-more" type="button">+</button> -->
        	<span class="form-hint"><?php echo Yii::t('main_data','Max. Length 100 Characters')?></span>
			</div><!--col-md=9-->
		</div>
		<?php echo $form->error($model,'ref_id'); ?>
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