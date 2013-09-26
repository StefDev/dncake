<section>
  <article>
    <header>
      <h2>
        <small class="date"><?php echo date("d.m.Y \u\m H:i", strtotime($entry["News"]["created"])) ?></small>
        <?php echo $entry["News"]["title"] ?>        
      </h2>
      <p>geschrieben von <?php echo $this->Html->link("Stef", "http://twitter.com/StefKrie") ?></p>
    </header>
    <p><?php echo $entry["News"]["body"] ?></p>
    <footer>
      <?php echo $this->Html->link("zurück zur News-Übersicht", array("controller" => "news", "action" => "index"), array("class" => "float-left")) ?>
      <?php echo $this->Html->link("diesen Eintrag auf Facebook teilen", "http://www.facebook.com", array("class" => "float-right")) ?>
    </footer>
  </article>
</section>
