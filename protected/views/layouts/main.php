<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
	
	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /> -->
	<!-- Register CSS-->
	<!-- <link rel="stylesheet" href="css/standardize.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	
	<!-- <link rel="stylesheet" href="css/beranda-grid.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
	
	<!-- Register JS -->
	<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="body beranda clearfix">
	<div id="page">
		<div id="header" class="clearfix">
			<!-- <div id ="topside-nav"> -->
				<!-- <p id ="p-bahasa">Pilih bahasa: </p> -->
				<img class="image image-10" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/makara-ui-farmasi.png">
			<p class="web-title"><?php echo Yii::t('main_layout',Yii::app()->name); ?></p>
				<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions'=>array('id'=>'mainmenu'),
				'encodeLabel'=>false,
				'submenuHtmlOptions'=>array('class'=>'p'),
				'items'=>array(
					array('label'=>'<span class="glyphicon glyphicon-home"></span> '.Yii::t('main_layout', 'Home'), 'url'=>array('/site/index'),'itemCssClass'=>'text text-40'),
					array('label'=>'<span class="glyphicon glyphicon-search"></span> '.Yii::t('main_layout','Search'),'url'=>array('species/search'),'linkOptions'=>array('id'=>'searchbar')),
					array('label'=>'<span class="glyphicon glyphicon-plus"></span> '.Yii::t('main_layout', 'Insert Data'), 'url'=>array('/user/insertData'), 'visible'=>!Yii::app()->user->isGuest), 
					array('label'=>'<span class="glyphicon glyphicon-user"></span> '.Yii::t('main_layout', 'User Management'), 'url'=>array('/user/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState("role")==1), 
				// array('label'=>'List of Species', 'url'=>array('/species/index')),
				// array('label'=>'List of Compound', 'url'=>array('/contents/index')),
					array('label'=>'<span class="glyphicon glyphicon-exclamation-sign"></span> '.Yii::t('main_layout', 'News & Event'), 'url'=>array('/news/index')),
					array('label'=>'<span class="glyphicon glyphicon-question-sign"></span> '.'FAQs', 'url'=>array('/faqs/')),
					array('label'=>'<span class="glyphicon glyphicon-earphone"></span> '.Yii::t('main_layout', 'Contact'), 'url'=>array('/site/contact')),	
					array('label'=>'<span class="glyphicon glyphicon-pencil"></span> '.Yii::t('main_layout', 'About'), 'url'=>array('/site/page','view'=>'about')),	
					),
					)
				); 
			?>
			<div id= "topside-nav">
				<?php 
					$this->widget('application.components.LangBox');
				?>
	
			<?php
				$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'encodeLabel'=>false,
    'items'=>
     array(
		array('label'=>Yii::t('main_layout','Register'), 'url' =>array('/site/register'), 'visible'=>Yii::app()->user->getState("role") == null),	
		array('label'=>Yii::t('main_layout','Login'), 'url' =>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),	
		array('label'=>Yii::t('main_data','You are logged in as').' '.Yii::app()->user->id, 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                array(
                    'label'=>'<span class="glyphicon glyphicon-user"></span>'.Yii::t('main_layout','Profile'),
                    'url'=>array('user/profile/', 'id'=>Yii::app()->user->getState("no")),
                ),
                array(
                	'label'=>'<span class="glyphicon glyphicon-off"></span>'.Yii::t('main_layout','Logout'),
                	'url'=>array('/site/logout')
                )
            )
			),
        ),
)); 
?>
</div>
		</div><!--header-->
		<div class="container container-3 clearfix">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => CHtml::link(Yii::t('main_layout','Home'), Yii::app()->homeUrl),
			)); ?><!-- breadcrumbs -->
		<?php endif?>
			<?php echo $content; ?>
			<p id ="scrollup"><a>To top</a></p>
		</div>
		<div class="clear"></div>
		<div id="footer">
		    <div id= "footer-content" class ="footer-content-5 clearfix">
		    	<div class="row">
			    	<div class="col-md-3 first">
				    	<ul>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_layout','Home'),array('/site/index'));?>
				    		</li>
				    		<li>
				    			<?php 
								if (Yii::app()->user->getState('role')==2 OR Yii::app()->user->getState('role')==1){
									echo CHtml::link(Yii::t('main_layout','Insert Data'),array('/user/insertData'));
								}?>
				    		</li>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_layout', 'News & Event'),array('/news/index'))?>
				    		</li>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_layout', 'Faqs'),array('/faqs/index'))?>
				    		</li>
				    	</ul>
				    </div>
				    <div class="col-md-3">
				    	<ul>
				    		<li>
				    			<?php echo CHtml::link(Yii::t('main_data','Species List'),array('species/search'))?>
				    		</li>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_data','Compound List'),array('contents/search'))?>
				    		</li>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_data','Virtue List'),array('virtue/search'))?>
				    		</li>
				    	</ul>
				    </div>
				    <div class="col-md-3">
				    	<ul>
				    		<li>
				    			<?php echo CHtml::link(Yii::t('main_data','Local Name List'),array('localname/search'))?>
				    		</li>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_data','Alias List'),array('aliases/search'))?>
				    		</li>
				    	</ul>
				    </div>
				    <div class="col-md-3">
				    	<ul>
				    		<li>
								<?php echo CHtml::link(Yii::t('main_layout', 'About'),array('/site/page','view'=>'about'))?>
							</li>
							<li>
								<?php echo CHtml::link(Yii::t('main_layout', 'Contact'),array('/site/contact')) ?>
							</li>
				    	</ul>
			    	</div>	
		    	</div><!--row-->
		    </div>
		    <div id ="footer-content-bottom" class = "footer-content-5 text-center">
				<p class ="text">Copyright &copy; <?php echo date('Y'); ?> <?php echo CHtml::link('Fasilkom UI','http://www.cs.ui.ac.id/')?><?php echo Yii::powered(); ?><br/>
				All Rights Reserved.<br/></p>
			</div><!--bottom footer-->
		</div><!-- footer -->
	</div><!-- page -->
</body>
</html>
