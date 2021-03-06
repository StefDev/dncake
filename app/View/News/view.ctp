<section>
  <article>
    <header>
      <p>
        <em>geschrieben von <?php echo $this->Html->link($entry["Author"]["name"], $entry["Author"]["url"], array("rel" => "author")) ?>
        <?php if (!empty($entry["News"]["via"]) && !empty($entry["News"]["via_url"])) { printf("(via %s)", $this->Html->link($entry["News"]["via"], $entry["News"]["via_url"])); } ?>
        <?php echo date("\a\m d.m.Y \u\m H:i \U\h\\r", strtotime($entry["News"]["created"])); ?>
        </em>
      </p>
    </header>
    <?php
    // Image
    if ($entry["Image"]["id"]) {
      echo "<figure>";
      echo $this->Html->image(
        sprintf("/img/%s/%s/%s.%s", $entry["Image"]["cat"], substr($entry["Image"]["timestamp"], 0, 4), $entry["Image"]["filename"], $entry["Image"]["ext"]),
        $entry["Image"]["options"]
      );
      if ($entry["Image"]["descr"]) {
        printf("<figcaption>%s</figcaption>", $entry["Image"]["descr"]);
      }
      echo "</figure>";
    }
    ?>
    <p><?php echo $entry["News"]["body"] ?></p>
    <?php if (isset($nw) && $nw) {
      printf("<div class=\"fb-comments\" data-href=\"http://darkneuss.de/news/%s\" data-numposts=\"%d\" data-colorscheme=\"%s\" data-order-by=\"%s\"></div>",
        $entry["News"]["url_id"],
        5,
        "dark",
        "time"
      );
    } else {
      printf("<div class=\"fb-comments\">%s <a href=\"%s\">%s</a></div>", "Facebook-Kommentare sind deaktiviert.", "/soziale-netzwerke", "Was bedeutet das?");
    }    
    ?>
    <footer>
      <?php echo $this->Html->link("zurück zur News-Übersicht", array("controller" => "news", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")) ?>
      <?php echo $this->Html->link("diesen Artikel auf Facebook teilen", "http://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://darkneuss.de/news/" . $entry["News"]["url_id"]), array("target" => "_blank", "escape" => false, "class" => "float-right text-shadow")) ?>
    </footer>
  </article>
</section>
