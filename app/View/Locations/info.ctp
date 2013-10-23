<?php
//pr($location);

echo "<section>";
echo "  <article>";
printf("<header><h2>%s</h2></header>", $location["Location"]["name"]);
printf("<p><strong>Adresse:</strong><br>%s<br>%s %s</p>", $location["Location"]["street"], $location["Location"]["plz"], $location["Location"]["town"]);
if ($location["Location"]["url"]) {
  printf("<p><strong>Website:</strong><br>%s</p>", $this->Html->link($location["Location"]["url"], $location["Location"]["url"], array("target" => "_blank")));
}
if ($location["Event"]) {
  echo "<p>Kommende Events in dieser Location:</p>";
  echo "<ul class=\"dataset cols-1\">";
  foreach ($location["Event"] as $event) {
    printf("<li><small class=\"date\">%s</small> %s</li>",
      date("d.m.Y", strtotime($event["date"])),
      $this->Html->link($event["title"], array("controller" => "events", "action" => "info", $event["id"]))
    );
  }
  echo "</ul>";
}
printf("<footer>%s</footer>", $this->Html->link("&laquo; zur Locations-Übersicht", array("controller" => "locations", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")));
echo "  </article>";
echo "</section>";
unset($location);
