<?php foreach ($records as $record): ?>
<article>
  <p>
  <?php printf("<small class=\"date\">%s</small>", date("d.m.Y", strtotime($record["Record"]["releasedate"]))) ?>
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
