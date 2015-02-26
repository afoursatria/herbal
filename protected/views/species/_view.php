<?php
/* @var $this SpeciesController */
/* @var $data Species */
?>

<div class="view">
	<div class="entry">
		<?php
	if ((Yii::app()->user->getState("role")==1 OR Yii::app()->user->getState("role")==2) && $data->spe_is_verified == 0) {
		echo CHtml::link(Yii::t('main_layout','Verify'), array('species/verify', 'id'=>$data->spe_id), array('submit'=>array('species/verify', "id"=>$data->spe_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>
    <br/>
     <span class="col-md-3"><b><?php echo "Status"; ?>:</b></span>
	<?php 
		if ($data->spe_is_verified == 0) {
		echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20))
		.Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<?php if (Yii::app()->user->getState('role')==2 OR Yii::app()->user->getState('role')==1):?>
	<ul class="news-operation">
	
	<li><?php echo CHtml::link(Yii::t('main_layout','Update'), array('species/update', 'id'=>$data->spe_id));?></li>
	<li>
	<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('species/delete', 'id'=>$data->spe_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	</li>
	</ul>
	<?php endif?>	
	<br />
	

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('spe_species_id')); ?>:</b></span>
	<?php echo CHtml::link(CHtml::encode($data->spe_species_id), array('species/view', 'id'=>$data->spe_id)); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('spe_speciesname')); ?>:</b></span>
	<?php echo CHtml::encode($data->spe_speciesname); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('spe_varietyname')); ?>:</b></span>
	<?php echo CHtml::encode($data->spe_varietyname); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('spe_familyname')); ?>:</b></span>
	<?php echo CHtml::encode($data->spe_familyname); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('spe_foundername')); ?>:</b></span>
	<?php echo CHtml::encode($data->spe_foundername); ?>
	<br />
	


	
	 	<div class = "element"></div>
	 </div>
</div>