<?php
$this->Html->script(array("darkneuss", "http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0", "dnmap.js"), array("inline" => false));

echo "<section><article>";
echo "<div id=\"mapDiv\"></div>";
$locArray = array();
foreach ($locations as $loc) {
  $locArray[] = array("locid" => $loc["Location"]["id"], "name" => $loc["Location"]["name"], "street" => $loc["Location"]["street"], "plz" => $loc["Location"]["plz"], "town" => $loc["Location"]["town"], "locurl" => $loc["Location"]["url"], "latitude" => $loc["Location"]["latitude"], "longitude" => $loc["Location"]["longitude"]);
}
printf("<script>var locations = %s;</script>", json_encode($locArray));
echo "</article></section>";
unset($locArray);
unset($locations);
?>
<article>
  <footer>
    Die Genauigkeit der Geo-Koordinaten kann geringfügig abweichen. Alle Angaben ohne Gewähr.
  </footer>
</article>
