<?php
echo "<section>";
echo "  <article>";
//printf("<header><h2>%s</h2></header>", $location["Location"]["name"]);
printf("<p><strong>Adresse:</strong><br>%s<br>%s<br>%s %s</p>", $location["Location"]["name"], $location["Location"]["street"], $location["Location"]["plz"], $location["Location"]["town"]);
if ($location["Location"]["url"]) {
  printf("<p><strong>Website:</strong><br>%s</p>", $this->Html->link($location["Location"]["url"], $location["Location"]["url"], array("target" => "_blank")));
}
if ($location["Event"]) {
  echo "<p>Kommende Events in dieser Location:</p>";
  echo "<ul class=\"dataset cols-1\">";
  foreach ($location["Event"] as $event) {
    printf("<li><span class=\"date\">%s</span> %s</li>",
      date("d.m.Y", strtotime($event["date"])),
      //$this->Html->link($event["title"], array("controller" => "events", "action" => "view", $event["id"]))
      $this->Html->link($event["title"], "/kalender/details/" . $event["id"])
    );
  }
  echo "</ul>";
}
printf("<footer>%s</footer>", $this->Html->link("zur Locations-Übersicht", array("controller" => "locations", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")));
echo "  </article>";
echo "</section>";
unset($location);
