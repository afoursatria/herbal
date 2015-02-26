<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
	<div class="text-center">
		<h1>wooops</h1>
		<div class="row">
			<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/binoculars.png',"image",array('width'=>'150px')); ?>
		</div>
		<div class="row">
			<?php echo CHtml::encode($message); ?>
		</div>
	</div>
</div>