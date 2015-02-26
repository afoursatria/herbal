<?php
/* @var $this FaqsController */
/* @var $data Faqs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('faqs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->faqs_id), array('view', 'id'=>$data->faqs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faqs_content')); ?>:</b>
	<?php echo CHtml::encode($data->faqs_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faqs_lang')); ?>:</b>
	<?php echo CHtml::encode($data->faqs_lang); ?>
	<br />


</div>