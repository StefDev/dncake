<?php

$this->start("sidebar");
// Flyer
echo "<section>";
echo "  <h2>&ndash; Flyer &ndash;</h2>";
echo "  <figure><a href=\"http://sze-ne.de\"><img src=\"/img/flyer/2013/hellawaits.jpg\" width=\"200\" height=\"281\" alt=\"Hell Awaits\"></a></figure>";
echo "</section>";
$this->end();

echo "<section>";
foreach ($news as $entry) {
  printf("<article><header><h2><small class=\"date\">%s</small>%s</h2><p><em>geschrieben von %s</em></p></header><p>%s</p></article>",
    date("d.m.Y", strtotime($entry["News"]["created"])),
    //$this->Html->link($entry["News"]["title"], array("controller" => "news", "action" => "view", $entry["News"]["url_id"])),
    $this->Html->link($entry["News"]["title"], "/news/" . $entry["News"]["url_id"]),
    $this->Html->link($entry["Author"]["name"], $entry["Author"]["url"]),
    $entry["News"]["body"]
  );
}
echo "</section>";
unset($entry);

