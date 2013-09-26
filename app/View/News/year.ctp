<?php
foreach ($news as $entry) {
  printf("<div><h2>%s</h2><p>%s</p><p>geschrieben am %s</p></div>", $entry["News"]["title"], $entry["News"]["body"], $entry["News"]["created"]);
}
unset($entry);
