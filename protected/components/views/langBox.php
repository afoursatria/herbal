<?php echo CHtml::form('','post',array('id'=>'formId')); ?>
	<div id = "dropdown">
	    <div id="langdrop">
	        <?php 
	        echo CHtml::dropDownList(
	        	'_lang', $currentLang, 
	        	array('en' => '<span id="engdrops"></span>English', 'in' => 'Bahasa'), 
	        	array(
	        	'submit' => '',
	        	'encode' => false,
	            'options' => array(
	            				'en'=>array(
	            						'id'=>'engdrop',
	            						// 'label'=> CHtml::image('images/u88.png','ba',array("width"=>"20px" ,"height"=>"15px")),
	            					),
	            				)
	            	)
	            ); 
	            ?>
	    </div>
	</div>
<?php echo CHtml::endForm(); ?>