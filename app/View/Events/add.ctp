<article>
  <?php
  echo $this->Form->create("Event");
  
  echo $this->Form->input("artist", array(
    "label" => "K�nstler"
  ));
  echo $this->Form->input("title", array(
    "label" => "Titel"
  ));
  echo $this->Form->input("releasedate", array(
    "label" => "Ver�ffentlichungsdatum",
    "type" => "text",
    "placeholder" => date("d.m.Y"),
    "maxlength" => 10
  ));
  echo $this->Form->end("eintragen");
  ?>
  <footer>
    <p>* Pflichtfeld</p>
  </footer>
</article>