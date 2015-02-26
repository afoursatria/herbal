<!-- <h1>Insert Data</h1> -->

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php
    $this->breadcrumbs=array(
    Yii::t('main_layout','Insert Data'),
    );
?>
<?php

//widget for admin and expert
if (Yii::app()->user->getState('role') == 1 OR Yii::app()->user->getState('role') == 2) {
            $this->widget('bootstrap.widgets.TbTabs',array(
            'tabs'=>array(
                Yii::t('main_data','Species')=>array('label'=>Yii::t('main_data','Species'),'id'=>'newSpecies','active'=>true,'content'=>$this->renderPartial(
                                                '//species/_form',
                                                array('model'=>$speciesModel),TRUE
                                                )),
                Yii::t('main_data','Compound')=>array('label'=>Yii::t('main_data','Compound'),'id'=>'newCompound','content'=>$this->renderPartial(
                                                '//contents/_form',
                                                array('model'=>$compoundModel),TRUE
                                                )),
                Yii::t('main_data','Assign Compound to Species')=>array('label'=>'Assign Compound to Species','id'=>'assignCompound','content'=>$this->renderPartial(
                                                '//contents/_formAssignCompound',
                                                array('model'=>$speciesContentModel),TRUE
                                                )),
                Yii::t('main_data','Local Name')=>array('label'=>Yii::t('main_data','Local Name'),'id'=>'newLocalname','content'=>$this->renderPartial(
                                                '//localname/_form',
                                                array('model'=>$localnameModel),TRUE
                                                )),
                Yii::t('main_data','Alias')=>array('label'=>Yii::t('main_data','Alias'),'id'=>'newAliases','content'=>$this->renderPartial(
                                                '//aliases/_form',
                                                array('model'=>$aliasesModel),TRUE
                                                )),
                Yii::t('main_data','Virtue')=>array('label'=>Yii::t('main_data','Virtue'),'id'=>'newVirtue','content'=>$this->renderPartial(
                                                '//virtue/_form',
                                                array('model'=>$virtueModel),TRUE
                                                )),
                Yii::t('main_data','Compound Group')=>array('label'=>Yii::t('main_data','Compound Group'),'id'=>'newContentgroup','content'=>$this->renderPartial(
                                                '//contentgroup/_form',
                                                array('model'=>$contentGroupModel),TRUE
                                                )),
                'Reference'=>array('label'=>'Reference','id'=>'newReference','content'=>$this->renderPartial(
                                                '//ref/_form',
                                                array('model'=>$referenceModel),TRUE
                                                )),
                
              	// panel 3 contains the content rendered by a partial view
                // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
            ),
            // additional javascript options for the tabs plugin
            // 'options'=>array(
            //     'collapsible'=>true,
            // ),
            'id'=>'MyTab-Menu',
        ));
}
else
    $this->widget('bootstrap.widgets.TbTabs',array(
    'tabs'=>array(
        Yii::t('main_data','Species')=>array('label'=>'Species','id'=>'newSpecies','active'=>true,'content'=>$this->renderPartial(
                                        '//species/_form',
                                        array('model'=>$speciesModel),TRUE
                                        )),
        Yii::t('main_data','Compound')=>array('label'=>'Compound','id'=>'newCompound','content'=>$this->renderPartial(
                                        '//contents/_form',
                                        array('model'=>$compoundModel),TRUE
                                        )),
        Yii::t('main_data','Local Name')=>array('label'=>'Local Name','id'=>'newLocalname','content'=>$this->renderPartial(
                                        '//localname/_form',
                                        array('model'=>$localnameModel),TRUE
                                        )),
        Yii::t('main_data','Alias')=>array('label'=>'Alias','id'=>'newAliases','content'=>$this->renderPartial(
                                        '//aliases/_form',
                                        array('model'=>$aliasesModel),TRUE
                                        )),
        Yii::t('main_data','Virtue')=>array('label'=>'Virtue','id'=>'newVirtue','content'=>$this->renderPartial(
                                        '//virtue/_form',
                                        array('model'=>$virtueModel),TRUE
                                        )),
        Yii::t('main_data','Compound Group')=>array('label'=>'Compound Group','id'=>'newContentgroup','content'=>$this->renderPartial(
                                        '//contentgroup/_form',
                                        array('model'=>$contentGroupModel),TRUE
                                        )),
        'Reference'=>array('label'=>'Reference','id'=>'newReference','content'=>$this->renderPartial(
                                        '//ref/_form',
                                        array('model'=>$referenceModel),TRUE
                                        )),
        
        // panel 3 contains the content rendered by a partial view
        // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
    ),
    // additional javascript options for the tabs plugin
    // 'options'=>array(
    //     'collapsible'=>true,
    // ),
    'id'=>'MyTab-Menu',
));

?>