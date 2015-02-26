<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	Yii::t('main_data','Compound')=>array('search'),
	$model->con_contentname,
);

// $this->menu=array(
// 	array('label'=>'List Contents', 'url'=>array('index')),
// 	array('label'=>'Create Contents', 'url'=>array('create')),
// 	array('label'=>'Update Contents', 'url'=>array('update', 'id'=>$model->con_id)),
// 	array('label'=>'Delete Contents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->con_id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Contents', 'url'=>array('admin')),
// );
?>
<ul class="news-operation">
<li><?php echo CHtml::link(Yii::t('main_layout','Update'), array('contents/update', 'id'=>$model->con_id));?></li>
<li><?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('contents/delete', 'id'=>$model->con_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
            </li>
</ul>
<h1 class="text-center"><?php echo $model->con_contentname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'con_contentname',
		'con_knapsack_id',
		'con_metabolite_id',
		'con_pubchem_id',
		array(
    		'name'=>'contgroup_id',
    		'value'=>$model->contgroup->contgroup_name,
		),
		'con_source',
		array(
            'name'=>'con_file_mol1',
            'type'=>'raw',
            'value'=> $model->con_file_mol1 == null ? '-':
                CHtml::link(CHtml::encode($model->con_file_mol1.".mol"), Yii::app()->request->baseUrl."/assets/mol/mol1/".$model->con_file_mol1.'.mol'),
			),
		array(
            'name'=>'con_file_mol2',
            'type'=>'raw',
            'value'=> $model->con_file_mol2 == null ? '-':
                CHtml::link(CHtml::encode($model->con_file_mol2.".mol"), Yii::app()->request->baseUrl."/assets/mol/mol2/".$model->con_file_mol2.'.mol2'),
			),
	),
	'nullDisplay'=>'-',
)); ?>

<h3><?php echo Yii::t('main_data','Species List')?></h3>

<?php
$this->renderPartial('_species',array('dataProvider'=>$speciesDataProvider));

?>
<?php


// $this->widget('zii.widgets.jui.CJuiTabs',array(
//     'tabs'=>array(
//         Yii::t('main_data','Species')=>array('id'=>'Species-id','content'=>$this->renderPartial(
//                             '_species',
//                             array('dataProvider'=>$speciesDataProvider),TRUE
//                             )),       
//           	// panel 3 contains the content rendered by a partial view
//         // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
//     ),
//     // additional javascript options for the tabs plugin
//     'options'=>array(
//         // 'collapsible'=>true,
//     ),
//     'id'=>'MyTab-Menu',
// ));

