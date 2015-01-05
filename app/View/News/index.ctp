<?php
$this->Html->script("darkneuss", array("inline" => false));

$this->start("sidebar");

  // Dynamic Flyer
  //echo $this->element('recent_flyer', array(), array('cache' => true));

  // Facebook & Twitter
  echo "<h2><span class=\"lightblue\">&ndash;</span> Facebook & Twitter <span class=\"lightblue\">&ndash;</span></h2>";
  echo "<section>";
  printf("  <p style=\"text-align: center\">%s &nbsp; %s</p>", $this->Html->image('/img/template/facebook_logo_cyan.png', array('width' => 30, 'height' => 31, 'alt' => 'DARKNEuSS.de auf Facebook', 'url' => 'https://www.facebook.com/darkneuss.de')), $this->Html->image('/img/template/twitter_logo_cyan.png', array('width' => 30, 'height' => 31, 'alt' => '@DARKNEuSS.de', 'url' => 'http://twitter.com/DARKNEuSSde')));
  echo "</section>";

  // Gefaellt mir und Co.
  echo "<h2><span class=\"lightblue\">&ndash;</span> Gefällt mir & Co. <span class=\"lightblue\">&ndash;</span></h2>";
  echo "<section>";
  printf("  <p>Soziale Netzwerke wie Facebook oder Google+ sind für diese Seite derzeit <strong>%saktiviert</strong>. <a href=\"/soziale-netzwerke\">Was bedeutet das?</a></p><p><a href=\"?netzwerke=%d\" class=\"info text-shadow\">&raquo; %saktivieren</a></p>", $networks["status"][$networks["activated"]], !$networks["activated"], $networks["status"][!$networks["activated"]]);
  echo "</section>";
  
  // Upcoming Events
  echo $this->element('upcoming_events');
  
  // Most read
  //echo $this->element('most_read', array(), array('cache' => true));

$this->end();

echo "<section class=\"news\">";
foreach ($news as $key => $entry) {
  if ($key == 3) {
    echo "<h1><span class=\"lightblue\">&mdash;</span> weitere Artikel auf DARKNEuSS.de: <span class=\"lightblue\">&mdash;</span></h1>";
  }
  
  if (!empty($entry["News"]["tag"])) {
    $hashtag = sprintf("<em class=\"hashtag\">%s</em>", $this->Html->link(ucfirst($entry["News"]["tag"]), array("controller" => "news", "action" => "hashtag", $entry["News"]["tag"])));
  } else {
    $hashtag = null;
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
  printf("<header><h2 itemprop=\"headline\"><small class=\"date\">%s<time itemprop=\"datePublished\">%s</time></small>%s %s</h2><p><em>geschrieben von %s %s %s</em></p></header>",    
    date("d.m.Y", strtotime($entry["News"]["created"])), $entry["News"]["created"],
    $this->Html->link($entry["News"]["title"], "/news/" . $entry["News"]["url_id"], array("itemprop" => "url")),    //$this->Html->link($entry["News"]["title"], array("controller" => "news", "action" => "view", $entry["News"]["url_id"])),
    $hashtag,
    $this->Html->link($entry["Author"]["name"], $entry["Author"]["url"], array("rel" => "author", "itemprop" => "author")),
    $via,
    $tweet_id
  );
  
  if ($key < 3) {
    // Image
    if ($entry["Image"]["id"]) {
      echo "<figure>";
      echo $this->Html->image(
        sprintf("/img/%s/%s/%s.%s", $entry["Image"]["cat"], substr($entry["Image"]["timestamp"], 0, 4), $entry["Image"]["filename"], $entry["Image"]["ext"]),
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
