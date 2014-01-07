<?php
class News extends AppModel
{
  //public $hasOne = "OpenGraph";
  public $belongsTo = array('Author', 'Image');

  public function afterFind($results, $primary = false) {
    foreach ($results as $key => $value) {
      if (isset($value["News"]["body"])) {
        $results[$key]["News"]["body"] = $this->formatBodyText($value["News"]["body"]);
      }
      if (isset($value["Image"]["id"])) {
        $imgOpts = array();
        if (isset($value["Image"]["title"])) {
          $imgOpts["alt"] = $value["Image"]["title"];
        }
        if (isset($value["Image"]["width"]) && isset($value["Image"]["height"])) {
          $imgOpts["width"] = $value["Image"]["width"];
          $imgOpts["height"] = $value["Image"]["height"];
        }
        if (isset($value["Image"]["url"])) {
          $imgOpts["url"] = $value["Image"]["url"];
        }
        $results[$key]["Image"]["options"] = $imgOpts;
      }
    }
    return $results;
  }
  
  public function formatBodyText($bodyText) {
    return preg_replace(
      array("/\r\n\r\n/", "/\r\n/"),      // pattern
      array("</p><p>", "<br>"),           // replacement
      $bodyText                           // subject
    );
  }
}
