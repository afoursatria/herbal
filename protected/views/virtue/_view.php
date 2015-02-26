<?php
/* @var $this VirtueController */
/* @var $data Virtue */
?>

<div class="view">
	<div class="entry">
		<?php
	if ((Yii::app()->user->getState("role")==1 OR Yii::app()->user->getState("role")==2) && $data->vir_is_verified == 0) {
		echo CHtml::link(Yii::t('main_layout','Verify'), array('virtue/verify', 'id'=>$data->vir_id), array('submit'=>array('virtue/verify', "id"=>$data->vir_id), 'confirm' => Yii::t('main_data','Are you sure you want to verify?')));
	 } 
    ?>
    <br/>
	<span class="col-md-3"><b><?php echo "Status"; ?>:</b></span>
	<?php 
		// if ($data->vir_is_verified == 0) {
		// echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20)).Yii::t('main_data', 'not verified');
		// }
		// else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<?php if (Yii::app()->user->getState('role')==2 OR Yii::app()->user->getState('role')==1):?>
	<ul class="news-operation">
	
	<li><?php echo CHtml::link(Yii::t('main_layout','Update'), array('virtue/update', 'id'=>$data->vir_id));?></li>
	<li>
	<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('virtue/delete', 'id'=>$data->vir_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	</li>
 </ul>
	<?php endif?>	
 	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('hp_code')); ?>:</b></span>
	<?php if ($data->herbal_part!==null) {echo CHtml::encode($data->herbal_part->hp_part_name);}
	else echo "-"; 
	?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('vir_type')); ?>:</b></span>
	<?php echo CHtml::encode($data->vir_type); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('vir_value')); ?>:</b></span>
	<?php echo CHtml::encode($data->vir_value); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('vir_value_en')); ?>:</b></span>
	<?php echo CHtml::encode($data->vir_value_en); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('vir_value_latin')); ?>:</b></span>
	<?php echo CHtml::encode($data->vir_value_latin); ?>
	<br />
	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php echo CHtml::encode($data->ref_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->vir_insert_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->vir_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->vir_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->vir_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->vir_verified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->vir_verified_date); ?>
	<br />

	*/ ?>
	<div class="element"></div>
	</div>
	
</div>