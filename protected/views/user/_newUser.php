<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'newUser-grid',
	'dataProvider'=>$model->notVerifiedUser(),
	// 'filter'=>$model,
	'columns'=>array(
		'use_fullname',
		'use_username',
		'use_email',
		'roles.rol_name',
		
		array(
		    'class'=>'CButtonColumn',
		    'template'=>'{verify}',
		      'buttons'=>array(
				'verify'=>array(
					'label'=>'Activate',
					// 'imageUrl'=>Yii::app()->request->baseUrl.'/images/status.png',
					'url'=>'Yii::app()->createAbsoluteUrl(
						"user/verify",
						array("id"=>$data->use_id))',				 
					'visible'=>'$data->use_is_active==0?TRUE:FALSE',
					'options' => array(  // set all kind of html options in here
        				'confirm' =>"Are you sure to activate this account? ",
        			),
				),
			),
		),
	),
)); ?>