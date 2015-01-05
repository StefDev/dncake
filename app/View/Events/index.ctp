<?php
setlocale(LC_TIME, "de_DE.utf8");

$this->Html->script("darkneuss", array("inline" => false));

echo "<section>";
foreach ($events as $event) {
  if (!isset($currentMonth) || strftime("%B", strtotime($event["Event"]["date"])) != $currentMonth) {
    printf("<h1><span class=\"lightblue\">&ndash;</span> %s %s <span class=\"lightblue\">&ndash;</span></h1>", strftime("%B", strtotime($event["Event"]["date"])), date("Y", strtotime($event["Event"]["date"])));
  }
  if ($event["Event"]["image_id"]) {
    $flyer_tag = $this->Html->link("flyer", array("controller" => "kalender", "action" => "details", $event["Event"]["id"]), array("title" => "Flyer", "class" => "flyer text-shadow"));
  } else {
    $flyer_tag = null;
  }
  printf("<article><ul class=\"dataset cols-2-1\"><li><span class=\"date\">%s<time itemprop=\"startDate\">%s</time></span> %s %s %s</li><li>%s, %s</li></ul></article>",
    date("d.m.Y", strtotime($event["Event"]["date"])),
    $event["Event"]["date"],
    $event["Event"]["title"],
    $this->Html->link("i", array("controller" => "kalender", "action" => "details", $event["Event"]["id"]), array("title" => "Info", "class" => "info text-shadow")),
    $flyer_tag,
    $this->Html->link($event["Location"]["name"], array("controller" => "locations", "action" => "info", $event["Location"]["id"])), $event["Location"]["town"]
  );
  $currentMonth = strftime("%B", strtotime($event["Event"]["date"]));
}
echo "</section>";
unset($event);
?>
<article>
  <footer>
    <?php echo $this->Html->link("Termin eintragen", array("action" => "eintragen"), array("escape" => false, "class" => "float-right text-shadow")); ?>
  </footer>
</article>