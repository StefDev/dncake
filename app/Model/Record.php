<?php
class Record extends AppModel {
  public $validate = array(
    "artist" => array(
      "rule" => "/^[\w\s\-\.,:ÄÖÜäöüß!$%&\/\(\)]{2,48}$/",
      "required" => true,
      "allowEmpty" => false,
      "message" => "Hier sind unerlaubte Zeichen enthalten"
    ),
    "title" => array(
      "rule" => "/^[\w\s\-\.,:ÄÖÜäöüß!$%&\/\(\)]{2,48}$/",
      "required" => true,
      "allowEmpty" => false,
      "message" => "Hier sind unerlaubte Zeichen enthalten"
    ),
    "releasedate" => array(
      "rule" => array("date", "dmy"),
      "required" => true,
      "allowEmpty" => false,
      "message" => "Bitte korrigiere das Datum der Veröffentlichung"
    )
  );
  
  public function afterValidate() {
    //debug($this->data);
  }
  
  public function beforeSave() {
    $this->data["Record"]["releasedate"] = $this->_dateFormatBeforeSave($this->data["Record"]["releasedate"]);
    return true; // "Be sure that beforeSave() returns true, or your save is going to fail."
  }
  
  protected function _dateFormatBeforeSave($dateString) {
    return date("Y-m-d", strtotime($dateString));
  }
}
