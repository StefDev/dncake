<?php 
/*
$news = $this->requestAction(
  array('controller' => 'news', 'action' => 'most_read'),
  array('return')
);
*/
$news = $this->requestAction('news/most_read');

echo "<h2><span class=\"lightblue\">&ndash;</span> Meistgelesen <span class=\"lightblue\">&ndash;</span></h2>";
echo "<section id=\"element-most-read\">";
foreach ($news as $entry) {
  $entrycount = (isset($entrycount)) ? ++$entrycount : 1;
  printf("<!-- %d --><p><small>%s.</small><br>%s</p>", $entry["News"]["visited"], $entrycount, $this->Html->link($entry["News"]["title"], "/news/" . $entry["News"]["url_id"], array("itemprop" => "url")));
}
echo "</section>";
