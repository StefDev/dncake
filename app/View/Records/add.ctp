<article>
  <?php
  echo $this->Form->create("Record");
  echo $this->Form->input("artist", array(
    "label" => "Künstler"
  ));
  echo $this->Form->input("artist_twitter", array(
    "label" => "Twitter-Account (optional)",
    "placeholder" => "@",
    "maxlength" => 24
  ));
  echo $this->Form->input("title", array(
    "label" => "Titel"
  ));
  echo $this->Form->input("releasedate", array(
    "label" => "Veröffentlichungsdatum",
    "type" => "text",
    "placeholder" => date("d.m.Y"),
    "maxlength" => 10
  ));
  echo $this->Form->input("medium", array(
    "label" => "Medium",
    "div" => "input",
    "type" => "select",    
    "empty" => false,
    "options" => array(
      "cd" => "CD",
      "dvd" => "DVD",
      "mag" => "Magazin",
      "book" => "Buch")
    )
  );
  echo $this->Form->end("eintragen");
  ?>
  <footer>
    <p>* Pflichtfeld</p>
  </footer>
</article>