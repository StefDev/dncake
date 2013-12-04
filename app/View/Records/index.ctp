<?php foreach ($records as $record): ?>
<article>
  <p>
  <?php printf("<span class=\"date\">%s</span>", date("d.m.Y", strtotime($record["Record"]["releasedate"]))) ?>
  <?php
    printf(
      "%s &ndash; &bdquo;%s&rdquo;",
      $record["Record"]["artist"],
      $record["Record"]["title"]
      //$this->Html->link($record["Record"]["title"], array("controller" => "records", "action" => "details", $record["Record"]["id"]))
    );
  ?>
  </p>
</article>
<?php endforeach; ?>
<?php unset($record); ?>
<article>
  <footer>
    <?php echo $this->Html->link("Veröffentlichung eintragen &raquo;", array("action" => "eintragen"), array("escape" => false, "class" => "float-right text-shadow")); ?>
  </footer>
</article>
