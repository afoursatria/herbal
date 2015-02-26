<?php

class TinyMce extends CInputWidget {
  public function init() {
    $assetUrl = Yii::app()->assetManager->publish(Yii::getPathOfAlias(
      'ext.tinymce.js.tinymce'));
    Yii::app()->clientScript->registerScriptFile($assetUrl.'/tinymce.min.js');
  }
}

?>