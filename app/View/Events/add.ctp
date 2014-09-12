<article>
  <?php
  echo $this->Form->create("Event");

  echo $this->Form->input("title", array(
    "label" => "Titel der Veranstaltung",
    "maxlength" => 50
  ));

  echo $this->Form->input("descr", array(
    "label" => "Beschreibung",
    "type" => "textarea",
    "maxlength" => 4096
  ));
  
  echo $this->Form->input("quotes", array(
    "type" => "checkbox",
    "label" => "Beschreibung als Zitat veröffentlichen"
  ));

  echo $this->Form->input("date", array(
    "label" => "Datum",
    "div" => "input",
    "type" => "date",
    "dateFormat" => "DMY",
    "minYear" => date("Y"),
    "maxYear" => date("Y") + 1,
    "separator" => ".",
    "empty" => false,
    "monthNames" => false
    )
  );

  echo $this->Form->input("location_id", array(
    "type" => "text",
    "label" => "Location",
    "maxlength" => 16,
  ));

  echo $this->Form->input("fbevent_id", array(
    "type" => "text",
    "label" => sprintf("Veranstaltungs-Nummer bei Facebook (z.B. https://www.facebook.com/events/%s)", $this->Html->link("63363207579", "https://www.facebook.com/events/63363207579")),
    "maxlength" => 20,
  ));

  echo $this->Form->input("cat", array(
    "label" => "Kategorie",
    "div" => "input",
    "type" => "select",    
    "empty" => false,
    "options" => array(
      "Konzert" => "Konzert",
      "Event" => "Event",
      "Festival" => "Festival",
      "Sonstiges" => "Sonstiges")
    )
  );

  echo $this->Form->input("platform", array(
    "label" => "Veröffentlichung auf",
    "div" => "input",
    "type" => "select",
    "empty" => false,
    "options" => array(
      "dn" => "DARKNEuSS.de",
      "sze" => "Sze-NE.de",
      "both" => "beiden")
    )
  );

  echo $this->Form->input("url", array(
    "label" => "Website",
    "maxlength" => 128,
    "required" => false
  ));
  
  if (Configure::read('debug')) {
    echo $this->Form->input("image_id", array(
      "label" => "Image-ID",
      "type" => "text",
      "maxlength" => 3,
      "required" => false
    ));
  }

  echo $this->Form->end("eintragen");
  ?>
  <footer>
    <p>* Pflichtfeld</p>
  </footer>
</article>