<?php
class OpenGraph extends AppModel {
  public $useTable = false; // This model does not use a database table

  public $title;
  public $type;
  public $url;
  public $image;
  
  public $description; // A one to two sentence description of your object.
  public $site_name;
  public $locale;
}
