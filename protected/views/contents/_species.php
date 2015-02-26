<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#speciesKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'species-list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>
<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('contents/view')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('speciesKey', (isset($_GET['speciesKey'])) ? $_GET['speciesKey'] : '', array('id'=>'speciesKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/species/_view',
	'emptyText'=>Yii::t('main_data','This Species has no species'),
	'summaryText'=>Yii::t('main_data','Displaying {end} result'),
	'id'=>'species-list'
	));
?>