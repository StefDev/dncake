<?php
class RecordsController extends AppController {
  public $helpers = array("Html", "Form", "Session");
  public $components = array("Session");
  
  //public $title_for_layout = "Veröffentlichungen";  
  
  public function index() {
    $this->set("title_for_layout", "kommende Platten & weitere Veröffentlichungen");
    $records = $this->Record->find("all", array(
        "conditions" => array("Record.releasedate >=" => date("Y-m-d"), "Record.platform !=" => "sze"),
        "order" => array("Record.releasedate" => "ASC")
      )
    );
    $this->set("records", $records);
    $this->set("description", "kommende Platten und weitere Veröffentlichungen");
    $this->set("ogp", array(
      "title" => "kommende Platten & weitere Veröffentlichungen",
      "type" => "website",
      "url" => "http://darkneuss.de/veroeffentlichungen",
      "image" => "http://darkneuss.de/img/fbdn.png"
    ));
  }
  
  public function alle() {
    $this->set("title_for_layout", "alle Veröffentlichungen");
    $this->_all();
  }
  
  public function eintragen() {
    $this->set("title_for_layout", "Veröffentlichung eintragen");
    $this->_add();
  }
  
  protected function _add() { // http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/part-two.html#adding-posts
    if ($this->request->is("post")) {
      $this->Record->create();
      if ($this->Record->save($this->request->data, true, array("artist", "artist_twitter", "title", "releasedate", "medium"))) { // http://book.cakephp.org/2.0/en/models/saving-your-data.html#model-save-array-data-null-boolean-validate-true-array-fieldlist-array
        $this->Session->setFlash(__("Die VÖ wurde gespeichert. Sie wird nach kurzer Prüfung freigeschaltet."));
        return $this->redirect(array("action" => "index"));
      }
      $this->Session->setFlash(__("Das Speichern der VÖ hat nicht geklappt."));
    }
    $this->render("add");
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
