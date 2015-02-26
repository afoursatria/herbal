<?php
	Yii::app()->clientScript->registerScript('compoundSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#compoundKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'compound-list',
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
	echo CHtml::textField('compoundKey', (isset($_GET['compoundKey'])) ? $_GET['compoundKey'] : '', array('id'=>'compoundKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php
   $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'/contents/_view',
	'emptyText'=>Yii::t('main_data','This Species has no compound'),
	'summaryText'=>Yii::t('main_data','Displaying {end} result'),
	'id'=>'compound-list',
	));
?>