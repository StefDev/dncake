<section>
  <article>
    <header>
      <h2>
        <small class="date"><?php echo date("d.m.Y", strtotime($event["Event"]["date"])) ?></small>
        <?php echo $event["Event"]["title"] ?>        
      </h2>
    </header>
    <?php if (isset($event["Event"]["descr"])) { ?>    
    <p>
      <?php
        if ($event["Event"]["quotes"] == true && !preg_match("/^&bdquo;/", $event["Event"]["descr"])) {
          echo "&bdquo;";
        }
        echo $event["Event"]["descr"];
        if ($event["Event"]["quotes"] == true && !preg_match("/&rdquo;$/", $event["Event"]["descr"])) {
          echo "&rdquo;";
        }
      ?>
    </p>
    <?php } ?>
    <?php if ($event["Event"]["soldout"]) { ?>    
    <p><strong>Hinweis:</strong> Dieses Event ist ausverkauft!</p>
    <?php } ?>
    <footer>
      <?php echo $this->Html->link("&laquo; zurück zum Kalender", array("controller" => "events", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")) ?>
      <?php echo $this->Html->link("diesen Termin auf Facebook teilen &raquo;", "http://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://darkneuss.de/kalender/details/" . $event["Event"]["id"]), array("target" => "_blank", "escape" => false, "class" => "float-right text-shadow")) ?>
    </footer>
  </article>
</section>
