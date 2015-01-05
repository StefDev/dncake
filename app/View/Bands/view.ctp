<article>
  <ul class="dataset cols-2">
    <li>
      <!-- Bild -->
    </li>
    <li>
      <p><strong>Stil:</strong> <?php printf("%s %s", $band["Band"]["genresub"], $band["Band"]["genre"] ); ?></p>
      <p><strong>Herkunft:</strong> <?php echo $band["Band"]["town"]; ?></p>
      <p>
        <strong>Status:</strong> <?php echo $band["Band"]["status"]; ?>
        (<?php if ($band["Band"]["status"] === "aktiv") { printf("seit %s", $band["Band"]["founded"]); } else { printf("%s <span class=\"lightblue\">&ndash;</span> %s", $band["Band"]["founded"], $band["Band"]["disbanded"]); } ?>)
      </p>      
      <p><strong>Links:</strong></p>
      <ul>
      <?php if ($band["Band"]["url_web"]) { printf("<li>%s</li>", $this->Html->link("offizielle Webpräsenz", $band["Band"]["url_web"])); } ?>
      <?php if ($band["Band"]["url_fb"]) { printf("<li>%s</li>", $this->Html->link("Facebook", "https://www.facebook.com/" . $band["Band"]["url_fb"])); } ?>
      <?php if ($band["Band"]["url_twitter"]) { printf("<li>%s</li>", $this->Html->link("Twitter", "http://twitter.com/" . $band["Band"]["url_twitter"])); } ?>
      <?php if ($band["Band"]["url_bandcamp"]) { printf("<li>%s</li>", $this->Html->link("Bandcamp", $band["Band"]["url_bandcamp"])); } ?>
      </ul>
    </li>
  </ul>
  <p><?php if ($band["Band"]["descr"]) { echo $band["Band"]["descr"]; } else { echo "<span class=\"lightblue\">Die Beschreibung wird zurzeit verfasst. Mitschreiben? Dann E-Mail an <strong>bands@darkneuss.de</strong>. \m/</span>"; } ?></p>
</article>
