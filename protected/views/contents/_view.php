<?php
/* @var $this ContentsController */
/* @var $data Contents */
?>

<div class="view">
	<div class="entry">
		<?php
	if ((Yii::app()->user->getState("role")==1 OR Yii::app()->user->getState("role")==2) && $data->contents->con_is_verified == 0) {
		echo CHtml::link(Yii::t('main_layout','Verify'), array('contents/verify', 'id'=>$data->contents->con_id), array('submit'=>array('contents/verify', "id"=>$data->contents->con_id), 'confirm' => Yii::t('main_data','Are you sure you want to verify?')));
	 } 
    ?>
    <br/>
	<span class="col-md-3"><b><?php echo "Status"; ?>:</b></span>
	<?php 
		if ($data->contents->con_is_verified == 0) {
			echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20)).
		Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<?php if (Yii::app()->user->getState('role')==2 OR Yii::app()->user->getState('role')==1):?>
	<ul class="news-operation">
		<li>
		<?php echo CHtml::link(Yii::t('main_layout','Update'), array('contents/update', 'id'=>$data->contents->con_id));?>
 		</li>
 		<li>
	<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('contents/delete', 'id'=>$data->contents->con_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 		</li>
 	</ul>
	<?php endif?>	
 	<br/>
	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_contentname')); ?>:</b></span>
	<?php echo CHtml::link(CHtml::encode($data->contents->con_contentname), array('contents/view', 'id'=>$data->contents->con_id)); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_knapsack_id')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->con_knapsack_id); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_metabolite_id')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->con_metabolite_id); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_pubchem_id')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->con_pubchem_id); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('contgroup_id')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->contgroup->contgroup_name); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_source')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->con_source); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_file_mol1')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->con_file_mol1); ?>
	<br />

	<span class="col-md-3"><b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_file_mol2')); ?>:</b></span>
	<?php echo CHtml::encode($data->contents->con_file_mol2); ?>
	<br />

	
	 	<div class = "element"></div>
	 </div>
</div>