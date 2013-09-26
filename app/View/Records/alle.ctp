<article>
<?php foreach ($records as $record): ?>
  <p>
  <?php printf("<small class=\"date\">%s</small>", date("d.m.Y", strtotime($record["Record"]["releasedate"]))) ?>
  <?php
    printf(
      "%s &ndash; &bdquo;%s&rdquo;",
      $record["Record"]["artist"],
      $record["Record"]["title"]
    );
  ?>
  </p>
<?php endforeach; ?>
</article>
<?php unset($record); ?>
