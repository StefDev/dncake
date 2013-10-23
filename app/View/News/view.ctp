<section>
  <article>
    <header>
      <h2>
        <small class="date"><?php echo date("d.m.Y \u\m H:i", strtotime($entry["News"]["created"])) ?></small>
        <?php echo $entry["News"]["title"] ?>        
      </h2>
      <p><em>geschrieben von <?php echo $this->Html->link($entry["Author"]["name"], $entry["Author"]["url"]) ?></em></p>
    </header>
    <p><?php echo $entry["News"]["body"] ?></p>
    <footer>
      <?php echo $this->Html->link("&laquo; zurück zur News-Übersicht", array("controller" => "news", "action" => "index"), array("escape" => false, "class" => "float-left text-shadow")) ?>
      <?php echo $this->Html->link("diesen Artikel auf Facebook teilen &raquo;", "http://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://darkneuss.de/news/" . $entry["News"]["url_id"]), array("target" => "_blank", "escape" => false, "class" => "float-right text-shadow")) ?>
    </footer>
  </article>
</section>
