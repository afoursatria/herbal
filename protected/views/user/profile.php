<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
	$this->breadcrumbs=array(
	Yii::t('main_layout','Profile')=>$model->use_id,
	);
?>
<ul class="update-control">
	<li><?php echo CHtml::link(Yii::t('user','Update Profile'), array('update','id'=>$model->use_id)); ?></li>
	<li><?php echo CHtml::link(Yii::t('user','Change Password'), array('changePassword','id'=>$model->use_id)); ?></li>
</ul>
<h1 class="text-center"><?php echo $model->use_fullname?></h1> 
<?php 
// $this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'use_fullname',
// 		'use_email',
// 		'use_birthdate',
// 		array(
// 			'name'=>'Curriculum Vitae',
// 			'type'=>'raw',
// 			'value'=>CHtml::link(CHtml::encode($model->use_cv),Yii::app()->request->baseUrl.'/assets/user/cv/'.$model->use_cv.'.pdf')),
// 		array(        
//            	'name'=>Yii::t('user', 'Photo'),
//            	'type'=>'raw',
//             'value'=>CHtml::image(Yii::app()->request->baseUrl."/assets/user/photo/".$model->use_foto.'.jpg','image',array("style"=>"width:200px;")),
//            	),
// 	),
// 	'nullDisplay'=>'-',
// )); 
?>
<div class="text-center">
	<div class="row">
		<?php if ($model->use_foto == null){
			echo CHtml::image(Yii::app()->request->baseUrl."/images/user.png",'image',array("class"=>'user-image'));
		} 
		else echo CHtml::image(Yii::app()->request->baseUrl."/assets/user/photo/".$model->use_foto.'.jpg','image',array("class"=>'user-image'));?>
	</div>
</div>
<div class="user-detail">
	<div class="row">
		<span class="col-md-3">
			<?php echo CHtml::encode($model->getAttributeLabel('use_fullname'));?>
		</span>	
		<span class="col-md-9">:
			<?php echo CHtml::encode($model->use_fullname); ?>
		</span>
	</div>
	<div class="row">
		<span class="col-md-3">
			<?php echo CHtml::encode($model->getAttributeLabel('use_email')); ?>
		</span>
		<span class="col-md-9">:
			<?php echo CHtml::encode($model->use_email); ?>
		</span>
	</div>
	<div class="row">
		<span class="col-md-3">
			<?php echo CHtml::encode($model->getAttributeLabel('use_birthdate')); ?>
		</span>
		<span class="col-md-9">:
			<?php echo CHtml::encode($model->use_birthdate);?>
		</span>
	</div>
	<div class="row">
		<span class="col-md-3">
			<?php echo CHtml::encode($model->getAttributeLabel('use_cv')); ?>
		</span>
		<span class="col-md-9">:
		     <?php 
		     if ($model->use_cv==null){
		     	echo "-";
		     }
		     else echo CHtml::link(CHtml::encode($model->use_cv),Yii::app()->request->baseUrl.'/assets/user/cv/'.$model->use_cv.'.pdf'); ?>
		</span>
	</div>
	<div class="row">
		<span class="col-md-3">
			<?php echo CHtml::encode($model->getAttributeLabel('rol_id'));?>
		</span>
		<span class="col-md-9">:
			<?php
			if(CHtml::encode($model->rol_id)==1)
				echo "administrator";
			else if (CHtml::encode($model->rol_id)==2)
				echo "expert";
			else if (CHtml::encode($model->rol_id)==3)
				echo "contributor";
			?>
		</span>
	</div>
</div>