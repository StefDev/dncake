<?php
class EventsController extends AppController {
  public function index() {
    $events = $this->Event->find("all", array(
      "conditions" => array("Event.date >=" => date("Y-m-d"), "Event.platform !=" => "sze", "Event.confirmed" => "1"),
      "order" => array("Event.date" => "ASC")
    ));    
    $this->set("title_for_layout", "Kalender");
    $this->set("events", $events);
  }

  public function view($id = null) {
    $id = $this->request->params["id"];

    if (!$id) {
      throw new NotFoundException(__("Ungültiger Kalendereintrag."));
    }  
    $event = $this->Event->find("first", array(
      "conditions" => array("Event.id" => $id, "Event.confirmed" => 1)
    ));
    if (!$event) {
      throw new NotFoundException(__("Kalendereintrag wurde nicht gefunden."));
    }
    $this->set("event", $event);
    $this->set("title_for_layout", sprintf("%s", $event["Event"]["title"]));
    $this->set("schema_type", "Event");
    if ($event["Event"]["descr"]) { $this->set("description", $event["Event"]["descr"]); }
    $this->set("ogp", array(
      "title" => $event["Event"]["title"],
      "type" => "article",
      "url" => "http://darkneuss.de/kalender/details/" . $event["Event"]["id"],
      "image" => (isset($event["Image"]["id"])) ? sprintf("http://darkneuss.de/img/flyer/%s/%s.%s", substr($event["Image"]["timestamp"], 0, 4), $event["Image"]["filename"], $event["Image"]["ext"]) : ""
    ));
  }

  public function eintragen() {
    $this->set("title_for_layout", "Termin eintragen");
    $this->_add();
  }

  public function upcoming_events() {
    $events = $this->Event->find("all", array(
      "conditions" => array("Event.date >=" => date("Y-m-d"), "Event.platform !=" => "sze", "Event.confirmed" => "1"),
      "order" => array("Event.date" => "ASC"),
      "limit" => 5
    ));
    return $events;
  }

  protected function _add() {
    if ($this->request->is("post")) {
      $this->Event->create();
      if ($this->Event->save($this->request->data, true, array("location_id", "fbevent_id", "date", "title", "descr", "quotes", "url", "cat", "platform"))) {
        //$this->Session->setFlash(__("Der Termin wurde gespeichert. Vielen Dank."));
        return $this->redirect(array("action" => "index"));
      } else {
        //debug($this->request->data);
        //debug($this->Event->validationErrors);
      }
    }
    $this->render("add");
  }
}
