<ul class="o-snslist">
  <?php foreach($GLOBALS['accounts'] as $account) : ?>
  <li class="o-snslist__item">
    <a href="<?php echo $account['url']; ?>" target="_blank" class="o-snslist__link">
      <div class="o-snslist__icon">
        <img src="<?php echo get_template_directory_uri()."/assets/images/".$account['name'].".png"; ?>" alt="">
      </div>
      <div class="o-snslist__id"><?php echo $account['id']; ?></div>
    </a>
  </li>
  <?php endforeach; ?>
</ul>
