<?php
class LocationsController extends AppController {
  // "Remember to add the default Html and Form helpers, if you define var $helpers in your AppController"
  //public $helpers = array("Html", "Form");
  
  public function index() {
    $locations = $this->Location->find("all", array(
      "order" => array("Location.id ASC")
    ));
    $this->set("locations", $locations);
  }
}