<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('main_data','News'),
);
?>

<div class="row">
<div class="col-md-3">
    <!-- Berita terini -->
    <div class="recent-news">
    <div class="element element-10"></div>
    <?php echo Yii::t('main_data','Recent News') ;?>

    <div class="element element-12"></div>
    <ul class="top-search">
    <?php 
        foreach ($beritaTerbaru as $berita ) {
            if (count(explode(' ', $berita->news_title)) > 7){
                echo "<li class='top-list'>".CHtml::link(implode(' ', array_slice(explode(' ', $berita->news_title), 0, 7))."..."."</li>",  array('news/view', 'id'=>$berita->news_id));
            }
            else
                echo "<li class='top-list'>".CHtml::link($berita->news_title."</li>",  array('news/view', 'id'=>$berita->news_id));
        }
    ?>
    </ul>
    </div>
    <!-- Acara terini -->
    <div class="recent-news">
    <div class="element element-10"></div>
    <?php echo Yii::t('main_data','Recent Event') ;?>

    <div class="element element-12"></div>
    <ul class="top-search">
    <?php 
        foreach ($acaraTerbaru as $acara ) {
            if (count(explode(' ', $acara->news_title)) > 7){
                echo "<li class='top-list'>".CHtml::link(implode(' ', array_slice(explode(' ', $acara->news_title), 0, 7))."..."."</li>",  array('news/view', 'id'=>$acara->news_id));
            }
            else
                echo "<li class='top-list'>".CHtml::link($acara->news_title."</li>",  array('news/view', 'id'=>$acara->news_id));
        }
    ?>
</ul>
</div>
    <!-- Pengumuman terini -->
    <div class="recent-news">
    <div class="element element-10"></div>
    <?php echo Yii::t('main_data','Recent Announcement') ;?>

    <div class="element element-12"></div>
    <ul class="top-search">
    <?php 
        foreach ($pengumumanTerbaru as $pengumuman ) {
            if (count(explode(' ', $pengumuman->news_title)) > 7){
                echo "<li class='top-list'>".CHtml::link(implode(' ', array_slice(explode(' ', $pengumuman->news_title), 0, 7))."..."."</li>",  array('news/view', 'id'=>$pengumuman->news_id));
            }
            else
                echo "<li class='top-list'>".CHtml::link($pengumuman->news_title."</li>",  array('news/view', 'id'=>$pengumuman->news_id));
        }
    ?>
</ul>
</div>
    <!-- Publikasi terini -->
    <div class="recent-news">
    <div class="element element-10"></div>
    <?php echo Yii::t('main_data','Recent Publication') ;?>
    <div class="element element-12"></div>
    <ul class="top-search">
    <?php 
        foreach ($publikasiTerbaru as $publikasi ) {
            if (count(explode(' ', $publikasi->news_title)) > 7){
                echo "<li class='top-list'>".CHtml::link(implode(' ', array_slice(explode(' ', $publikasi->news_title), 0, 7))."..."."</li>",  array('news/view', 'id'=>$publikasi->news_id));
            }
            else
                echo "<li class='top-list'>".CHtml::link($publikasi->news_title."</li>",  array('news/view', 'id'=>$publikasi->news_id));
        }
    ?>
</ul>
</div>
</div>
<div class="col-md-9">
    <h1><?php echo Yii::t('main_data', 'News');?></h1>
    <div class="create-new">
<?php
if (Yii::app()->user->getState('role')==1) {
    echo CHtml::link(Yii::t('main_data','Create News'),array('create'));}
?>
</div>

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>
</div>
</div><!--row-->