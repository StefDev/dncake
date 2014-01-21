<section>
  <article>
    <header>
      <h2>
        <small class="date"><?php echo date("d.m.Y", strtotime($event["Event"]["date"])) ?></small>
        <?php echo $event["Event"]["title"] ?>        
      </h2>
    </header>
    <?php
    // Image
    if ($event["Image"]["id"]) {
      echo "<figure>";
      echo $this->Html->image(
        sprintf("/img/flyer/%s/%s.%s", substr($event["Image"]["timestamp"], 0, 4), $event["Image"]["filename"], $event["Image"]["ext"]),
        $event["Image"]["options"]
      );
      if ($event["Image"]["descr"]) {
        printf("<figcaption>%s</figcaption>", $event["Image"]["descr"]);
      }
      echo "</figure>";
    }
    ?>
    <?php if (isset($event["Event"]["descr_html"])) { ?>    
    <p>
      <?php echo $event["Event"]["descr_html"]; ?>
    </p>
    <?php } ?>
    <?php if ($event["Event"]["soldout"]) { ?>    
    <p><strong>Hinweis:</strong> Dieses Event ist scheinbar ausverkauft.</p>
    <?php } ?>
    <footer>
      <?php echo $this->Html->link("&laquo; zurück zum Kalender", array("controller" => "events", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")) ?>
      <?php echo $this->Html->link("diesen Termin auf Facebook teilen &raquo;", "http://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://darkneuss.de/kalender/details/" . $event["Event"]["id"]), array("target" => "_blank", "escape" => false, "class" => "float-right text-shadow")) ?>
    </footer>
  </article>
</section>
