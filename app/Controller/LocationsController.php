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
      throw new NotFoundException(__("Es ist nicht klar, zu welcher Location Infos angezeigt werden sollen."));
    }
  
    //$location = $this->Location->findById($id);
    $location = $this->Location->find("first", array(
      "conditions" => array("Location.id" => $id)
    ));
    
    if (!$location) {
      throw new NotFoundException(__("Die gesuchte Location wurde nicht gefunden."));
    }
    $this->set("title_for_layout", sprintf("Location-Infos: %s", $location["Location"]["name"]));
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
  
  public function eintragen() {
    $this->set("title_for_layout", "Location eintragen");
    $this->_add();
  }
  
  /**
   * @link http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/part-two.html#adding-posts
   * @link http://book.cakephp.org/2.0/en/models/saving-your-data.html#model-save-array-data-null-boolean-validate-true-array-fieldlist-array
   */
  protected function _add() {
    if ($this->request->is("post")) {
      //debug($this->request->data); return;
      $this->Location->create();      
      if ($this->Location->save($this->request->data, true, array("id", "name", "street", "plz", "town", "url"))) {
        //$this->Session->setFlash(__("Die Location wurde gespeichert. Sie wird nach kurzer Prüfung freigeschaltet."));
        return $this->redirect(array("action" => "index"));
      }
      debug($this->Location->validationErrors);
      $this->Session->setFlash(__("Das Speichern der Location hat nicht geklappt."));
    }
    $this->render("add");
  } 
}