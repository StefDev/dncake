<section>
<article>
  <p>Derzeit sammeln wir Informationen zu sowohl aktiven als auch inaktiven Bands aus Neuss und Umgebung, die sich im gewählten Stilspektrum &bdquo;Metal&rdquo; und &bdquo;Gothic&rdquo; einordnen lassen.
  Wenn ihr also Interesse habt, mir eurer Combo an dieser Stelle aufgeführt zu werden, schickt alle erdenklichen Infos (gerne inkl. Foto) an <em>bands@darkneuss.de</em>. Wir bereiten diese dann für diese Seite auf.</p>
</article>
<?php foreach ($bands as $band) { ?>
<article>
  <ul class="dataset cols-3">
    <li>
      <h2 class="pirata white"><?php echo $band["Band"]["name"]; ?></h2>
      <p><strong><?php printf("%s %s", $band["Band"]["genresub"], $band["Band"]["genre"] ); ?></strong></p>
    </li>
    <li>      
      <p>
        <?php if ($band["Band"]["descr"]) { printf("%s... <em>%s</em>", substr($band["Band"]["descr"], 0, 512), $this->Html->link("weiterlesen", "/bands/" . $band["Band"]["id"])); }
              else { echo "<span class=\"lightblue\">Eine Beschreibung fehlt oder wird zurzeit verfasst. Mitschreiben? Fehler gefunden? Ergänzungen? Dann E-Mail an <strong>bands@darkneuss.de</strong>.</span>"; }
        ?>
      </p>
    </li>
    <li>
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
</article>
<? } ?>
</section>
