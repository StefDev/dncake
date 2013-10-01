<?php
class RecordsController extends AppController {
  public $helpers = array("Html", "Form");
  
  //public $title_for_layout = "Veröffentlichungen";  
  
  public function index() {
    $this->set("title_for_layout", "kommende Platten & weitere Veröffentlichungen");
    $records = $this->Record->find("all", array(
        "conditions" => array("Record.releasedate >=" => date("Y-m-d"), "Record.platform !=" => "sze"),
        "order" => array("Record.releasedate" => "ASC")
      )
    );
    $this->set("records", $records);
  }
  
  public function alle() {
    $this->set("title_for_layout", "alle Veröffentlichungen");
    $this->_all();
  }
  
  protected function _all() {
    $records = $this->Record->find("all", array(
        "order" => array("Record.releasedate" => "DESC")
      )
    );
    $this->set("records", $records);
    $this->render("all");
  }
}
