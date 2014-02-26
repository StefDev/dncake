<section>
  <article>    
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
    <p class="dotted-overline"><span class="lightblue">&middot; <?php printf("Datum:</span> %s", date("d.m.Y", strtotime($event["Event"]["date"]))); ?></p>
    <p><span class="lightblue">&middot; <?php printf("Location:</span> %s, %s", $this->Html->link($event["Location"]["name"], array("controller" => "locations", "action" => "info", $event["Location"]["id"])), $event["Location"]["town"]); ?></p>
    <?php if ($event["Event"]["fbevent_id"]) { ?>
    <p><span class="lightblue">&middot; <?php printf("Veranstaltung auf Facebook:</span> %s", $this->Html->link("https://www.facebook.com/events/" . $event["Event"]["fbevent_id"], "https://www.facebook.com/events/" . $event["Event"]["fbevent_id"])); ?></p>
    <?php } ?>
    <?php if ($event["Event"]["tweet_id"]) { ?>
    <p><span class="lightblue">&middot; <?php printf("Tweet:</span> %s", $this->Html->link("https://twitter.com/DARKNEuSSde/status/" . $event["Event"]["tweet_id"], "https://twitter.com/DARKNEuSSde/status/" . $event["Event"]["tweet_id"])); ?></p>
    <?php } ?>
    </ul>
    <footer>
      <?php echo $this->Html->link("&laquo; zurück zum Kalender", array("controller" => "events", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")) ?>
      <?php echo $this->Html->link("diesen Termin auf Facebook teilen &raquo;", "http://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://darkneuss.de/kalender/details/" . $event["Event"]["id"]), array("target" => "_blank", "escape" => false, "class" => "float-right text-shadow")) ?>
    </footer>
  </article>
</section>
