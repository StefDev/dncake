<?php
class Event extends AppModel {
  public $belongsTo = array('Location', 'Image');
  
  public function afterFind($results, $primary = false) {
    
    $results[0]["Event"]["descr_html"] = $this->formatBodyText($results[0]["Event"]["descr"]);
    
    if ($results[0]["Event"]["quotes"] && !preg_match("/^&bdquo;/", $results[0]["Event"]["descr"])) {
      $results[0]["Event"]["descr_html"] = sprintf("&bdquo;%s", $results[0]["Event"]["descr_html"]);
    }
    
    if ($results[0]["Event"]["quotes"] && !preg_match("/&rdquo;$/", $results[0]["Event"]["descr"])) {
      $results[0]["Event"]["descr_html"] = sprintf("%s&rdquo;", $results[0]["Event"]["descr_html"]);
    }
    
    if (isset($results[0]["Image"]["id"])) {
      $imgOpts = array();
      if (isset($results[0]["Image"]["title"])) {
        $imgOpts["alt"] = $results[0]["Image"]["title"];
      }
      if (isset($results[0]["Image"]["width"]) && isset($results[0]["Image"]["height"])) {
        $imgOpts["width"] = $results[0]["Image"]["width"];
        $imgOpts["height"] = $results[0]["Image"]["height"];
      }
      if (isset($results[0]["Image"]["url"])) {
        $imgOpts["url"] = $results[0]["Image"]["url"];
      }
      $results[0]["Image"]["options"] = $imgOpts;
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
