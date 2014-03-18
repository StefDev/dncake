<?php
$this->start("sidebar");
// Dynamic Flyer
echo $this->element('recent_flyer');

// Twitter
echo "<h2><span class=\"lightblue\">&ndash;</span> Twitter <span class=\"lightblue\">&ndash;</span></h2>";
echo "<section>";
printf("<p style=\"text-align: center\">%s</p>", $this->Html->image('/img/template/twitter_logo_cyan.png', array('width' => 90, 'height' => 73, 'alt' => '@DARKNEuSS.de', 'url' => 'http://twitter.com/DARKNEuSSde')));
printf("<p style=\"text-align: center\">%s</p>", $this->Html->link('@DARKNEuSSde', 'http://twitter.com/DARKNEuSSde'));
echo "</section>";

// Soziale Netzwerke
echo "<h2><span class=\"lightblue\">&ndash;</span> Soziale Netzwerke <span class=\"lightblue\">&ndash;</span></h2>";
echo "<section>";
printf("  <p>Soziale Netzwerke wie Facebook oder Google+ sind für diese Seite derzeit <strong>%saktiviert</strong>. <a href=\"/soziale-netzwerke\">Was bedeutet das?</a></p><p><a href=\"?netzwerke=%d\">&raquo; %saktivieren</a></p>", $networks["status"][$networks["activated"]], !$networks["activated"], $networks["status"][!$networks["activated"]]);
echo "</section>";
$this->end();

echo "<section class=\"news\">";
foreach ($news as $key => $entry) {
  if ($key == 3) {
    echo "<h1><span class=\"lightblue\">&mdash;</span> weitere Artikel auf DARKNEuSS.de: <span class=\"lightblue\">&mdash;</span></h1>";
  }
  
  if (!empty($entry["News"]["via"]) && !empty($entry["News"]["via_url"])) {
    $via = sprintf("(via %s)", $this->Html->link($entry["News"]["via"], $entry["News"]["via_url"]));
  } else {
    $via = null;
  }

  if ($entry["News"]["tweet_id"]) {    
    $tweet_id = sprintf("&middot; <a class=\"icon twitter\" itemprop=\"discussionUrl\" href=\"https://twitter.com/DARKNEuSSde/status/%s\" title=\"zum Tweet\"></a>", $entry["News"]["tweet_id"]);
  } else {
    $tweet_id = null;
  }

  // Article start
  if ($key < 3) {
    echo "<article itemscope itemtype=\"http://schema.org/BlogPosting\">";
  } else {
    echo "<article itemscope itemtype=\"http://schema.org/BlogPosting\" class=\"snippet\">";
  }
  
  // Header
  printf("<header><h2 itemprop=\"headline\"><small class=\"date\">%s</small>%s</h2><p><em>geschrieben von %s %s %s</em></p></header>",    
    date("d.m.Y", strtotime($entry["News"]["created"])),
    $this->Html->link($entry["News"]["title"], "/news/" . $entry["News"]["url_id"], array("itemprop" => "url")),    //$this->Html->link($entry["News"]["title"], array("controller" => "news", "action" => "view", $entry["News"]["url_id"])),
    $this->Html->link($entry["Author"]["name"], $entry["Author"]["url"], array("rel" => "author", "itemprop" => "author")),
    $via,
    $tweet_id
  );
  
  if ($key < 3) {
    // Image
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
    // Body content
    printf("<p>%s</p>", $entry["News"]["body"]);
  }
  
  // Article end
  echo "</article>";
}
echo "</section>";
unset($entry);
