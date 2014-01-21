<?php 
$flyer = $this->requestAction("images/recent_flyer");

echo "<h2>&ndash; Flyer &ndash;</h2>";
echo "<section>";
printf("  <figure>%s</figure>",
  $this->Html->image(sprintf("/img/flyer/%s/%s.%s", $this->Time->format("Y", $flyer["Image"]["timestamp"]), $flyer["Image"]["filename"], $flyer["Image"]["ext"]), array(
      "alt" => $flyer["Image"]["title"],
      //"width" => $flyer["Image"]["width"],
      //"height" => $flyer["Image"]["height"],
      "url" => $flyer["Image"]["url"]
    )
  )
);
echo "</section>";
