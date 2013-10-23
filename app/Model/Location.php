<?php
class Location extends AppModel {
  public $hasMany = array(
    "Event" => array(
      "conditions" => array("Event.date >= CURRENT_TIMESTAMP", "Event.confirmed" => 1),
      "order" => "Event.date ASC"
    )
  );
}
