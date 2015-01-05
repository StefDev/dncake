<?php
class Band extends AppModel
{
  public function afterFind($results, $primary = false) {
    foreach ($results as $key => $value) {      
      $results[$key]["Band"]["founded"] = preg_replace("/^0{4}$/", "<span class=\"lightblue\">?</span>", $results[$key]["Band"]["founded"]);
      $results[$key]["Band"]["disbanded"] = empty($results[$key]["Band"]["disbanded"]) ? "<span class=\"lightblue\">?</span>" : $results[$key]["Band"]["disbanded"];
    }
    return $results;
  }
}
