<?php
$this->Html->script("darkneuss", array("inline" => false));

echo "<section class=\"clicklist\">";
foreach ($locations as $location) {
  if (!isset($firstLetter) || strtoupper(substr($location["Location"]["id"], 0, 1)) != $firstLetter) {
    printf("<h1 id=\"%s\"><span class=\"lightblue\">&ndash;</span> %s <span class=\"lightblue\">&ndash;</span></h1>", substr($location["Location"]["id"], 0, 1), strtoupper(substr($location["Location"]["id"], 0, 1)));
  }
  printf("<article id=\"%s\"><ul class=\"dataset cols-4\"><li>%s</li><li>%s</li><li>%s %s</li><li>%s %s</li></ul></article>",
    $location["Location"]["id"],
    $location["Location"]["name"],
    $location["Location"]["street"],
    $location["Location"]["plz"],
    $location["Location"]["town"],
    $this->Html->link("i", array("controller" => "locations", "action" => "info", $location["Location"]["id"]), array("title" => "Info", "class" => "info text-shadow")),
    $this->Html->link("", array("controller" => "locations", "action" => "karte", '#' => $location["Location"]["id"]), array("title" => "Auf Karte anzeigen", "class" => "icon map"))
  );
  $firstLetter = strtoupper(substr($location["Location"]["id"], 0, 1));
}
echo "</section>";
unset($location);
