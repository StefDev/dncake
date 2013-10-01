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
  
  public function info() {}
}
