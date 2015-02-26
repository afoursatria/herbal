<?php
$this->breadcrumbs=array(
    Yii::t('main_layout','Search'),
    Yii::t('main_data','Virtue')=>array('search'),
);
?>

<script>
$(function(){
    $('#searchbar').addClass('active')}); 
</script>
<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#virtueKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'virtue_list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>
<?php $this->widget('zii.widgets.CMenu',array(
    'htmlOptions'=>array('id'=>'search-menu'),
    'items'=>array(
            array('label'=>Yii::t('main_data','Species'),'url'=>array('species/search')),
            array('label'=>Yii::t('main_data','Compound'), 'url'=>array('contents/search')),
            array('label'=>Yii::t('main_data','Local Name'), 'url'=>array('localname/search')),
            array('label'=>Yii::t('main_data','Alias Name'), 'url'=>array('aliases/search')),
            array('label'=>Yii::t('main_data','Virtue'), 'url'=>array('Virtue/search')),
        ),
));?>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('virtue/search')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('virtueKey', (isset($_GET['virtueKey'])) ? $_GET['virtueKey'] : '', 
        array('placeholder'=>Yii::t('main_data','Virtue'), 'id'=>'virtueKey','class'=>'search-form'));
?>
        <span class= "glyphicon glyphicon-search"></span>

<?php 
    // echo CHtml::submitButton('Search', array('name'=>'','id'=>'green','class'=>'button'));
    CHtml::endForm();
?>

<?php 
    $this->widget('application.extensions.alphapager.ApListView', array(
    'template'=>"<div class='row text-center'>.{alphapager}</div><div class='row'>{items}</div><div class='row'>{pager}</div>",
	'dataProvider'=>$dataProvider,
	'itemView'=>'//virtue/_view',
	'id'=> 'virtue_list',
)); ?>