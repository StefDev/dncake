<?php
class Image extends AppModel {
  public $hasOne = 'News';
  //public $hasOne = 'Event';
  
  public $cat;
  public $descr;
  public $ext;
  public $filename;
  public $height;
  public $width;
  public $id;
  public $timestamp;
  public $title;
  public $url;
  
  public $options;
  
  //public function afterFind($results, $primary = false) {}
}
