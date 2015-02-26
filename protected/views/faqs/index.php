<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php
/* @var $this FaqsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Faqs',
);

if (Yii::app()->user->getState("role") == 1) 
?>
<div class="row">
<div class="col-md-3">
	<b><?php
		if (Yii::app()->user->getState('role')==1) {
			echo Yii::t('main_data', 'Update').' :';
	?></b>
		<?php echo Yii::t('main_data','Choose Language'); ?>
</div>
	<span class="col-md-9">
		<div class="row">
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/u88.png","image",array('width'=>20)).' '.CHtml::link('English', array('faqs/update','id'=>'en'));?>
		</div>
		<div class="row">
			<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/u86.png","image",array('width'=>20)).' '.CHtml::link('Bahasa', array('update', 'id'=>'in'));}?>
		</div>
	</span>
</div>
<br />
<h1 class="text-center">Faqs</h1>
<div class="row">
	<?php echo $faqs->faqs_content; ?>
</div>

<?php 
	// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider,
	// 'itemView'=>'_view',
// )); 
?>
