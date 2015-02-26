<?php
/* @var $this LocalnameController */
/* @var $data Localname */
?>

<div class="view">
		<div class="entry">
			<?php
	if ((Yii::app()->user->getState("role")==1 OR Yii::app()->user->getState("role")==2) && $data->loc_is_verified == 0) {
		echo CHtml::link(Yii::t('main_layout','Verify'), array('localname/verify', 'id'=>$data->loc_id), array('submit'=>array('localname/verify', "id"=>$data->loc_id), 'confirm' => Yii::t('main data','Are you sure you want to verify?')));
	 } 
    ?>
    <br/>
	<span class="col-md-3"><b><?php echo "Status"; ?>:</b></span>
	<?php 
		if ($data->loc_is_verified == 0) {
		echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20)).Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<ul class="news-operation">
	<?php if (Yii::app()->user->getState('role')==2 OR Yii::app()->user->getState('role')==1):?>
	<li>
 	<?php echo CHtml::link(Yii::t('main_layout','Update'), array('localname/update', 'id'=>$data->loc_id));?>
 	</li>
 	<li>
	<?php
	echo CHtml::link(Yii::t('main_layout', 'Delete'),"#", 
          array('submit'=>array('localname/delete', 'id'=>$data->loc_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	</li>
	<?php endif?>	
 	</ul>
 	<br/>
	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('loc_localname')); ?>:</b></span>
	<?php echo CHtml::encode($data->loc_localname); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('loc_region')); ?>:</b></span>
	<?php echo CHtml::encode($data->loc_region); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b></span>
	<?php if (!is_null($data->ref)) echo CHtml::encode($data->ref->ref_name);
	else echo "-";?>
	<br />


<div class = "element"></div>
	 </div>
</div>