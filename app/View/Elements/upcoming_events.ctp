<?php 
$events = $this->requestAction("events/upcoming_events");

echo "<h2><span class=\"lightblue\">&ndash;</span> Kalender <span class=\"lightblue\">&ndash;</span></h2>";
echo "<section id=\"element-upcoming-events\">";
foreach ($events as $event) {
  printf("<p><small>%s</small><br>%s</p>", date("d.m.Y", strtotime($event["Event"]["date"])), $this->Html->link($event["Event"]["title"], array("controller" => "kalender", "action" => "details", $event["Event"]["id"])));
}
echo "</section>";
