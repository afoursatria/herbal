<?php
	Yii::app()->clientScript->registerScript('lnameSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#lnameKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'localname-list',
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
	echo CHtml::textField('lnameKey', (isset($_GET['lnameKey'])) ? $_GET['lnameKey'] : '', array('id'=>'lnameKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php
	$this->widget('zii.widgets.CListView', array(
	//'type'=>'striped',
    'dataProvider'=>$dataProvider,
	'itemView'=>'/localname/_view',
	'emptyText'=>Yii::t('main_data','This Species has no local name'),
	'summaryText'=>Yii::t('main_data','Displaying {end} result'),
	'id'=>'localname-list'
	));
?>