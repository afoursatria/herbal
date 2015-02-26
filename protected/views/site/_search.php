<?php $form=$this->beginWidget('CActiveForm', array(
    // 'id'=>'login-form',
    // 'enableClientValidation'=>true,
    // 'clientOptions'=>array(
    //     'validateOnSubmit'=>true,
    // ),
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>


    <?php


        // echo CHtml::dropDownList('category', '', array(
        //     'Species'=>'Species', 'Localname'=>'Localname'), 
        // array(
        //     'empty'=>'Select Category',
        //     'ajax'=>array(
        //         'type'=>'POST',
        //         'url'=>Yii::app()->createUrl('site/getSearchResult'),
        //         // 'url'=>Yii::app()->createUrl('site/loadCategory'),
        //         'data'=>"js:{category: $(this).val()}",                               
        //         // 'replace'=>'#search_key',
        //     )
        // ));
    ?>

    <div class="row">
        <?php
            // echo CHtml::textField('search_key', '',array(
            //     'placeholder'=>'Please select category first!',
            //     'ajax'=>array(
            //         'type'=>'POST',
            //         'url'=>Yii::app()->createUrl('site/getSearchResult'),
            //         'update'=>'#res',
            //     )
            // ));
        ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

<div class="res">

</div>


<?php 
    // if ($dataProvider !== '')
    // $this->widget('zii.widgets.CListView', array(
    // 'dataProvider'=>$dataProvider,
    // 'itemView'=>'_view',
    // 'id'=>'search_result'
// )); 
?>