<?php
class News extends AppModel
{
  public function afterFind($results, $primary = false) {
    foreach ($results as $key => $value) {
      if (isset($value["News"]["body"])) {
        $results[$key]["News"]["body"] = $this->formatBodyText($value["News"]["body"]);
      }
    }
    return $results;
  }
  
  public function formatBodyText($bodyText) {
    return preg_replace("/\r\n\r\n/", "</p><p>", $bodyText);
  }
}
