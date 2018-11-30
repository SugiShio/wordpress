<?php if($posts_total <= $posts_per_page) return; ?>
<ul class="w-pager">
<?php
  $pages_total = ceil($posts_total / $posts_per_page);
  $querys = $_GET;
  for ($i=0; $i < $pages_total; $i++) :
    $querys['page'] = $i;
    $query = [];
    foreach ($querys as $key => $value) {
      $query[] = $key . '=' . $value;
    }
?>
  <li class="w-pager__item">
  <?php if($current_page == $i) : ?>
    <span class="w-pager__link w-pager__link--current">
      <?php echo $i+1; ?>
    </span>
  <?php else : ?>
    <a href="?<?php echo join("&", $query); ?>" class="w-pager__link">
      <?php echo $i+1; ?>
    </a>
  <?php endif; ?>
  </li>
<?php endfor; ?>
</ul>
