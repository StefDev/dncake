<?php
  $this->Html->script(array("darkneuss", "http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0", "dnmap.js"), array("inline" => false));

  echo "<article>\r\n";
  
  echo $this->Form->create("Location");
  echo $this->Form->input("idcode", array(
    "label" => "Identifikations-Code (z.B. 'christuskirche')",
    "maxlength" => 16,
  ));
  echo $this->Form->input("name", array(
    "label" => "Name der Location",
    "maxlength" => 32
  ));
  echo $this->Form->input("street", array(
    "label" => "Straße",
    "maxlength" => 32
  ));
  echo $this->Form->input("plz", array(
    "label" => "PLZ",
    "maxlength" => 5
  ));
  echo $this->Form->input("town", array(
    "label" => "Ort",
    "maxlength" => 32,
    "onblur" => "geocode()"
  ));
  /* echo $this->Form->input("latitude", array(
    "label" => "Breitengrad"    
  ));
  echo $this->Form->input("longitude", array(
    "label" => "Längengrad"
  )); */
  echo $this->Form->inputs(
    array("latitude" => array("label" => "Breitengrad"),
          "longitude" => array("label" => "Längengrad")),
    null,
    array("fieldset" => false, "legend" => "Geo-Koordinaten")
  );
  
  echo "<div id=\"geodiv\">";
  echo $this->Form->button("Geokodieren", array("type" => "button", "id" => "geocodebutton", "onclick" => "geocode()"));
  echo "</div>";
  
  echo $this->Form->input("url", array(
    "label" => "Website",
    "maxlength" => 64
  ));
  
  
  echo $this->Form->end("eintragen");
  ?>
  <footer>
    <p>* Pflichtfeld</p>
  </footer>
</article>
