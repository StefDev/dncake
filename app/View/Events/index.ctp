<?php
setlocale(LC_TIME, "de_DE.utf8");
echo "<section>";
foreach ($events as $event) {
  if (!isset($currentMonth) || strftime("%B", strtotime($event["Event"]["date"])) != $currentMonth) {
    printf("<h1>&ndash; %s %s &ndash;</h1>", strftime("%B", strtotime($event["Event"]["date"])), date("Y", strtotime($event["Event"]["date"])));
  }
  printf("<article><ul class=\"dataset cols-2\"><li><small class=\"date\">%s</small> %s</li><li>%s, %s</li></ul></article>",
    date("d.m.Y", strtotime($event["Event"]["date"])),
    $event["Event"]["title"],
    $this->Html->link($event["Location"]["name"], array("controller" => "locations", "action" => "info", $event["Location"]["id"])), $event["Location"]["town"]
  );
  $currentMonth = strftime("%B", strtotime($event["Event"]["date"]));
}
echo "</section>";
unset($event);
