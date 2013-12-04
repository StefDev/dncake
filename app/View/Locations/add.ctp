<article>
  <?php
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
    "maxlength" => 32
  ));
  echo $this->Form->input("url", array(
    "label" => "Website",
    "maxlength" => 64,
    "required" => false
  ));
  echo $this->Form->end("eintragen");
  ?>
  <footer>
    <p>* Pflichtfeld</p>
  </footer>
</article>