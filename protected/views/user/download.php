<div>
	<h2><?php echo Yii::t('main_data', 'Download Data'); ?></h2>
	<ul>
		<li><?php echo CHtml::link(Yii::t('main_data', 'Species'), array('species/download')); ?></li>
		<li><?php echo CHtml::link(Yii::t('main_data', 'Compound'), array('contents/download')); ?></li>
		<li><?php echo CHtml::link(Yii::t('main_data', 'Local Name'), array('localname/download')); ?></li>
		<li><?php echo CHtml::link(Yii::t('main_data', 'Alias'), array('aliases/download')); ?></li>
		<li><?php echo CHtml::link(Yii::t('main_data', 'Virtue'), array('virtue/download')); ?></li>
	</ul>
</div>