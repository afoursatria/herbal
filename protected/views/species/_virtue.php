<?php
	Yii::app()->clientScript->registerScript('virtueSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#virtueKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'virtue-list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('species/view')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('virtueKey', (isset($_GET['virtueKey'])) ? $_GET['virtueKey'] : '', array('id'=>'virtueKey'));
    echo CHtml::submitButton(Yii::t('main_layout','Search'), array('name'=>''));
    CHtml::endForm();
?>

<?php
    $this->widget('zii.widgets.CListView', array(
    //'type'=>'striped',
    'dataProvider'=>$dataProvider,
    'itemView'=>'/virtue/_view',
	'emptyText'=>Yii::t('main_data','This Species has no virtue'),
	'summaryText'=>Yii::t('main_data','Displaying {end} result'),
	'id'=>'virtue-list',
	));
?>