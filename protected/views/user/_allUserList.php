<?php 
// $this->widget('zii.widgets.grid.CListView', array(
// 	'id'=>'user-grid',
// 	'dataProvider'=>$model->verifiedUser(),
// 	// 'filter'=>$model,
// 	'columns'=>array(
// 		'use_fullname',
// 		'use_username',
// 		'use_email',
// 		'roles.rol_name',
// 		// array(
//   //   		'name'=>'rol_id',
//   //   		'value'=>$data->role->rol_name,
// 		// ),
// 		array(
// 		    'class'=>'CButtonColumn',
// 		    'template'=>'{update}{delete}',
// 		),
// 	),
// )); 
?>

<div class="view">
	<div id ="hanged-list">
	<div class="entry well">

		<div class="col-md-2">
			<?php if ($data->use_foto == null){
				echo CHtml::image(Yii::app()->request->baseUrl."/images/user.png",'image',array("class"=>'user-image thumb'));
			} 
			else echo CHtml::image(Yii::app()->request->baseUrl."/assets/user/photo/".$data->use_foto.'.jpg','image',array("class"=>'user-image thumb'));?>
	
		</div>
		<div class="col-md-8">
			<?php 
			if ($data->use_is_active == 0)
				echo CHtml::link(Yii::t('user','Activate'), '',array('submit'=>array('user/verify', "id"=>$data->use_id), 'confirm' => 'Are you sure you want to activate this user?'));
			else{}
			?>	
			<br/>
			<b><?php echo CHtml::encode($data->getAttributeLabel('use_is_active')); ?>:</b>
			<?php 
				if ($data->use_is_active == 0) {
					echo Yii::t('user','Inactive');	
				}
					else echo Yii::t('user','Active');	
			?>
			<br />
			
			
			<b><?php echo CHtml::encode($data->getAttributeLabel('use_fullname')); ?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->use_fullname), array('profile', 'id'=>$data->use_id)); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('use_email')); ?>:</b>
			<?php echo CHtml::encode($data->use_email); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('rol_id')); ?>:</b>
			<?php
			if(CHtml::encode($data->rol_id)==1)
				echo "administrator";
			else if (CHtml::encode($data->rol_id)==2)
				echo "expert";
			else if (CHtml::encode($data->rol_id)==3)
				echo "contributor";
			?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('use_reg_date')); ?>:</b>
			<?php echo CHtml::encode(Yii::app()->format->date(strtotime($data->use_reg_date))); ?>
			<br />

			
		</div><!--col md 8-->	 	
	</div>
</div>
</div>