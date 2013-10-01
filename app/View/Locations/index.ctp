<?php
echo "<section>";
foreach ($locations as $location) {
  if (!isset($firstLetter) || strtoupper(substr($location["Location"]["id"], 0, 1)) != $firstLetter) {
    printf("<h1>&ndash; %s &ndash;</h1>", strtoupper(substr($location["Location"]["id"], 0, 1)));
  }
  printf("<article id=\"%s\"><ul class=\"dataset cols-3\"><li>%s</li><li>%s</li><li>%s %s</li></ul></article>",
    $location["Location"]["id"],
    $location["Location"]["name"],
    $location["Location"]["street"],
    $location["Location"]["plz"],
    $location["Location"]["town"]
  );
  $firstLetter = strtoupper(substr($location["Location"]["id"], 0, 1));
}
echo "</section>";
unset($location);
