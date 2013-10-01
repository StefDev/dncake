<?php
class LocationsController extends AppController {
  // "Remember to add the default Html and Form helpers, if you define var $helpers in your AppController"
  //public $helpers = array("Html", "Form");
  
  public function index() {
    $locations = $this->Location->find("all", array(
      "conditions" => array("Location.id !=" => "noloc"),
      "order" => array("Location.id ASC")
    ));
    $this->set("locations", $locations);
  }
  
  public function neuss() {
    $locations = $this->Location->find("all", array(
      "conditions" => array("Location.id !=" => "noloc", "Location.town" => "Neuss"),
      "order" => array("Location.id ASC")
    ));
    $this->set("locations", $locations);
    $this->render("index"); // set index view to render
  }
}