<?php
/* @var $this ContentgroupController */
/* @var $data Contentgroup */
?>

<div class="view">
	<div class="entry">
		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_id')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->contgroup_id), array('view', 'id'=>$data->contgroup_id)); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_code')); ?>:</b>
		<?php echo CHtml::encode($data->contgroup_code); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_name')); ?>:</b>
		<?php echo CHtml::encode($data->contgroup_name); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_insert_by')); ?>:</b>
		<?php echo CHtml::encode($data->contgroup_insert_by); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_insert_date')); ?>:</b>
		<?php echo CHtml::encode($data->contgroup_insert_date); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_update_by')); ?>:</b>
		<?php echo CHtml::encode($data->contgroup_update_by); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_update_date')); ?>:</b>
		<?php echo CHtml::encode($data->contgroup_update_date); ?>
		<br />
		<div class="element"></div>
	</div>
</div>