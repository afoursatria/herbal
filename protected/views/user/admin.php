<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	// 'Species'=>array('index'),
	Yii::t('main_layout','User Management'),
);
?>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<h1><?php echo Yii::t('user','List of User') ;?></h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->
<span id="add-user"></span>
<?php echo CHtml::link(Yii::t('user','Add User'), array('add'));?>

	<?php
	    $this->widget('zii.widgets.CListView', array(
	        'dataProvider'=>$model->search(),
	        'itemView'=>'//user/_allUserList',
	        // 'id'=> 'specieslistview',
	        )); 
	?>
