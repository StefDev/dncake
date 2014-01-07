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
    $this->set("title_for_layout", sprintf("%s (%s, %s)", $event["Event"]["title"], $event["Location"]["name"], date("d.m.Y", strtotime($event["Event"]["date"]))));
    if ($event["Event"]["descr"]) { $this->set("description", $event["Event"]["descr"]); }
    $this->set("ogp", array(
      "title" => $event["Event"]["title"],
      "type" => "article",
      "url" => "http://darkneuss.de/kalender/details/" . $event["Event"]["id"],
      "image" => (isset($event["Image"]["id"])) ? sprintf("http://darkneuss.de/img/flyer/%s/%s.%s", substr($event["Image"]["timestamp"], 0, 4), $event["Image"]["filename"], $event["Image"]["ext"]) : "http://darkneuss.de/img/fbdn.png"
    ));
  }
}
