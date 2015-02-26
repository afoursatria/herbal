<?php
/* @var $this RefController */
/* @var $data Ref */
?>

<div class="view">
	<div class="entry">
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ref_id), array('view', 'id'=>$data->ref_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_name')); ?>:</b>
	<?php echo CHtml::encode($data->ref_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->ref_insert_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->ref_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->ref_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->ref_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->ref_verified_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->ref_verified_date); ?>
	<br />

	*/ ?>
	<div class = "element"></div>
	 </div>
</div>