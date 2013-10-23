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
  
  public function add() { // http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/part-two.html#adding-posts
    if ($this->request->is("post")) {
      
    }
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
