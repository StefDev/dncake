<?php
$this->start("sidebar");
// Dynamic Flyer
echo $this->element('recent_flyer');

// Twitter
echo "<h2>&ndash; Twitter &ndash;</h2>";
echo "<section>";
printf("<p style=\"text-align: center\">%s</p>", $this->Html->image('/img/template/twitter_logo_cyan.png', array('alt' => '@DARKNEuSS.de', 'url' => 'http://twitter.com/DARKNEuSSde')));
printf("<p style=\"text-align: center\">%s</p>", $this->Html->link('@DARKNEuSSde', 'http://twitter.com/DARKNEuSSde'));
echo "</section>";

// Soziale Netzwerke
echo "<h2>&ndash; Soziale Netzwerke &ndash;</h2>";
echo "<section>";
printf("  <p>Soziale Netzwerke wie Facebook oder Twitter sind für diese Seite derzeit <strong>%saktiviert</strong>. <a href=\"/soziale-netzwerke\">Was bedeutet das?</a></p><p><a href=\"?netzwerke=%d\">&raquo; %saktivieren</a></p>", $networks["status"][$networks["activated"]], !$networks["activated"], $networks["status"][!$networks["activated"]]);
echo "</section>";
$this->end();

echo "<section class=\"news\">";
foreach ($news as $entry) {
  if (!empty($entry["News"]["via"]) && !empty($entry["News"]["via_url"])) {
    $via = sprintf("(via %s)", $this->Html->link($entry["News"]["via"], $entry["News"]["via_url"]));
  } else {
    $via = null;
  }
  echo "<article>";
  // header
  printf("<header><h2><small class=\"date\">%s</small>%s</h2><p><em>geschrieben von %s %s</em></p></header>",
    date("d.m.Y", strtotime($entry["News"]["created"])),
    $this->Html->link($entry["News"]["title"], "/news/" . $entry["News"]["url_id"]),                 //$this->Html->link($entry["News"]["title"], array("controller" => "news", "action" => "view", $entry["News"]["url_id"])),
    $this->Html->link($entry["Author"]["name"], $entry["Author"]["url"], array("rel" => "author")),
    $via    
  );
  // image
  if ($entry["Image"]["id"]) {
    echo "<figure>";
    echo $this->Html->image(
      sprintf("/img/news/%s/%s.%s", substr($entry["Image"]["timestamp"], 0, 4), $entry["Image"]["filename"], $entry["Image"]["ext"]),
      $entry["Image"]["options"]
    );
    if ($entry["Image"]["descr"]) {
      printf("<figcaption>%s</figcaption>", $entry["Image"]["descr"]);
    }
    echo "</figure>";
  }
  // body content
  printf("<p>%s</p>", $entry["News"]["body"]);
  echo "</article>";
}
echo "</section>";
unset($entry);
