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
  
  public function info($id) {
    if (!$id) {
      throw new NotFoundException(__("Es ist nicht klar, zu welcher Locations Infos angezeigt werden sollen."));
    }
  
    //$location = $this->Location->findById($id);
    $location = $this->Location->find("first", array(
      "conditions" => array("Location.id" => $id)
    ));
    
    if (!$location) {
      throw new NotFoundException(__("Die gesuchte Location wurde nicht gefunden."));
    }
    $this->set("title_for_layout", "Location-Infos");
    $this->set("location", $location);
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