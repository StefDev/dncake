<?php
class Location extends AppModel {

  public $hasMany = array(
    "Event" => array(
      "conditions" => array("Event.date >= CURRENT_TIMESTAMP", "Event.confirmed" => 1),
      "order" => "Event.date ASC"
    )
  );

  public function beforeSave() {
    $this->data["Location"]["id"] = $this->data["Location"]["idcode"];
    return true;
  }

  /**
   * @link http://book.cakephp.org/2.0/en/models/data-validation.html Data Validation in CakePHP
   */
  public $validate = array(
    "idcode" => array(
      "rule" => "alphaNumeric",
      "required" => true
    ),
    "name" => "notEmpty",
    "street" => "notEmpty",
    "plz" => "notEmpty",
    "town" => "notEmpty",
    "url" => array(
      "rule" => "url",
      "required" => false
    )
  );

}
