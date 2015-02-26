
<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap232.min.js"></script>
<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::t('main_layout', 	Yii::app()->name);
?>


<div class = "row">
    <div class="col-md-3">
        <div class="spesies clearfix">
            <div class="element element-10"></div>
            <p class="text _text text-72"><?php echo Yii::t('main_data','Top 5 species search')?>&nbsp;</p><br/>
            <div class="element element-12"></div>
            <ul class="top-search">
                <?php 
                    foreach ($topSpecies as $species ) {
                        echo "<li class='top-list'>".CHtml::link(($species->spe_speciesname),array('species/view','id'=>$species->spe_id))."<br /></li>";
                       // echo($species->spe_viewed_count."<br />");
                    }
                ?>
            </ul>
        </div> <!--spesies-->
        <!--senyawa paling dicari-->
        <div class="senyawa clearfix">
                <div class="element element-10"></div>
                <p class="text _text text-112"><?php echo Yii::t('main_data','Top 5 compound search')?>&nbsp;</p><br/>
                <div class="element element-12"></div>
                 <ul class="top-search">
                      <?php 
                          foreach ($topCompound as $compound ) {
                              echo "<li class='top-list'>".CHtml::link(($compound->con_contentname),array('contents/view','id'=>$compound->con_id))."<br /></li>";
                          }
                      ?>
                </ul>
        </div><!--senyawa-->
    </div><!--col-md-4-->
    <div class = "col-md-9">
        <div id = "search-field">
      <!--     <?php echo CHtml::link(Yii::t('main_data','Species'), array('species/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Compound'), array('contents/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Local Name'), array('localname/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Alias Name'), array('aliases/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Virtue'), array('Virtue/search'))?>
<br />
<br /> -->
    <!--    <?php 
    CHtml::beginForm(CHtml::normalizeUrl(array('site/index')), 'get', array('id'=>'filter-form'));
    echo CHtml::textField('speNameKey', (isset($_GET['speNameKey'])) ? $_GET['speNameKey'] : '', array('id'=>'speNameKey'));
    // echo CHtml::submitButton('Search', array('name'=>'','id'=>'green','class'=>'button','url'=>('species/search')));
    ?> -->
    <?php 
    // echo CHtml::link(Yii::t('main_data','Search'), array('species/search')); 
    ?>
    <?php
    // CHtml::endForm();
?>
</div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/1.jpg">
      <div class="carousel-caption">
      <?php echo Yii::t('main_data','The specialty of this fruit is to have the content of scopoletin, serotonin, damnachantal, 
      anthraquinone, etc. Pace is very efficient for treating diabetes, heart disease, a stroke, 
      can even improve blood pressure healthy throid gland, boost immunity.');?>
      </div>
    </div>
     <div class="item">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/2.jpg">
      <div class="carousel-caption">
        <?php echo Yii::t('main_data','Currently, most of the cultivation of ginger are in Indonesia, Malaysia, Thailand, and the Philippines.');?>
      </div>
    </div>
     <div class="item">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/3.jpg">
      <div class="carousel-caption">
        <?php echo Yii::t('main_data','Avocado plants native to Mexico and Central America and is now widely cultivated in South America and Central 
        America as plant monocultures and as garden plants in other tropical areas in the world.');?>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
 
        <?php 
        // $this->widget('zii.widgets.CListView', array(
        // 'dataProvider'=>$dataProvider,
        // 'itemView'=>'//species/_view',
        // 'id'=> 'specieslistview',
        // )); 
?>
    </div>
</div><!--row-->

