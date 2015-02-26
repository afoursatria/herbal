<?php
	Yii::app()->clientScript->registerScript('aliasSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#aliasKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'aliases-list',
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
	echo CHtml::textField('aliasKey', (isset($_GET['aliasKey'])) ? $_GET['aliasKey'] : '', array('id'=>'aliasKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php
   $this->widget('zii.widgets.CListView', array(
    //'type'=>'striped',
    'dataProvider'=>$dataProvider,
    'itemView'=>'/aliases/_view',
	'emptyText'=>Yii::t('main_data','This Species has no alias'),
	'summaryText'=>Yii::t('main_data','Displaying {end} result'),
	'id'=>'aliases-list',
	));
?>