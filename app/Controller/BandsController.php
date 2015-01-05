<?php
class BandsController extends AppController
{
  public function index() {
    $this->set("bands", $this->Band->find("all", array(
      "order" => array("Band.id" => "ASC")
    )));
    $this->set("description", "Eine Übersicht über aufgelöste und aktive Bands aus Neuss und Umgebung.");
    $this->set("ogp", array(
      "title" => "Bands - DARKNEuSS.de",
      "type" => "website",
      "url" => "http://darkneuss.de/bands",
      "image" => "http://darkneuss.de/img/fbdn.png"
    ));
  }
  
  public function view() {
    $bandid = $this->request->params["id"];
    
    if (!$bandid) {
      throw new NotFoundException(__("Zu dieser Band existiert kein Eintrag."));
    }
    
    $band = $this->Band->findById($bandid);
    if (!$bandid) {
      throw new NotFoundException(__("Diese Band existiert (noch) nicht in unserer Sammlung."));
    }
    
    $this->set("band", $band);
    $this->set("title_for_layout", $band["Band"]["name"]);
    $this->set("description", sprintf("Eintrag zur Band %s, %s %s aus %s", $band["Band"]["name"], $band["Band"]["genresub"], $band["Band"]["genre"], $band["Band"]["town"]));
  }
}
