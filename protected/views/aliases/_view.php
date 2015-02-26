<?php
/* @var $this AliasesController */
/* @var $data Aliases */
?>

<div class="view">
	<div class ="entry">
		<?php
			if ((Yii::app()->user->getState("role")==1 OR Yii::app()->user->getState("role")==2) && $data->ali_is_verified == 0) {
			echo CHtml::link(Yii::t('main_layout','Verify'), array('aliases/verify', 'id'=>$data->ali_id), array('submit'=>array('aliases/verify', "id"=>$data->ali_id), 'confirm' => Yii::t('main_data','Are you sure you want to verify?')));
			} 
		?>
		<br/>
		<span class="col-md-3"><b><?php echo "Status"; ?>:</b></span>
		<?php 
			if ($data->ali_is_verified == 0) {
			echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20))
		.Yii::t('main_data', 'not verified');
			}
			else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
		?>
		<?php if (Yii::app()->user->getState('role')==2 OR Yii::app()->user->getState('role')==1):?>
		<ul class="news-operation">
		<li><?php echo CHtml::link(Yii::t('main_layout','Update'), array('aliases/update', 'id'=>$data->ali_id));?></li>
	 	<li>
		<?php
		echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
	          array('submit'=>array('aliases/delete', 'id'=>$data->ali_id), 
	                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
	    </li>
	 	</ul>
		<?php endif?>	
	 	<br/>
		<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('ali_speciesname')); ?>:</b></span>
		<?php echo CHtml::encode($data->ali_speciesname); ?>
		<br />

		<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('ali_foundername')); ?>:</b></span>
		<?php echo CHtml::encode($data->ali_foundername); ?>
		<br />

		<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('ali_varietyname')); ?>:</b></span>
		<?php echo CHtml::encode($data->ali_varietyname); ?>
		<br />

		<span class="col-md-3"><b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b></span>
		<?php if (!is_null($data->ref)) echo CHtml::encode($data->ref->ref_name);
		else echo "-"; ?>
		<br />
	
		<div class="element"></div>
	</div>
</div>