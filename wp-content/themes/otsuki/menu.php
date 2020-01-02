<header id="js-header" class="o-header">
  <div class="o-nav-trigger" id="js-nav-trigger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="o-nav" id="js-nav">
    <ul class="o-nav__list">
      <?php if(!is_home()) : ?>
      <li class="o-nav__item o-nav__item--top">
        <a href="<?php echo get_site_url() ?>"><i class="icon-title-<?php echo $GLOBALS['theme_name']; ?>"></i></a>
      </li>
      <?php endif; ?>

      <?php
      include 'menu-config.php';
      $menu_items = $menu_config[$GLOBALS['theme_name']];
      foreach($menu_items as $menu_item) : ?>
      <li class="o-nav__item">
        <?php if($menu_item['url']) : ?>
        <a href="<?php echo $menu_item['url']; ?>">
          <?php echo $menu_item['label']; ?>
        </a>
        <?php else : ?>
        <span><?php echo $menu_item['label']; ?></span>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>

      <li class="o-nav__item o-nav__item--close-trigger" id="js-nav-close-trigger">
        <a>close</a>
      </li>
    </ul>
  </nav>
</header>