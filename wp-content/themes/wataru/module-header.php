<header class="w-header js-header">
  <nav class="w-header__nav">
    <ul class="menu">
      <li class="menu-item">
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('schedule')->cat_ID)); ?>"><?php echo $GLOBALS["wordset"]["title"]["schedule"]; ?></a>
      </li>
      <li class="menu-item">
        <a href="#">Profile</a>
      </li>
      <li class="menu-item">
        <a href="#">Equipment</a>
      </li>
      <li class="menu-item">
        <a href="#">Contact</a>
      </li>
      <li class="menu-item">
        <a href="#">Recording Pack</a>
      </li>
    </ul>
    <ul class="w-header__sns">
      <li class="w-header__snsitem">
        <a href="#">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/twitter.svg" alt="">
        </a>
      </li>
      <li class="w-header__snsitem">
        <a href="#">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/instagram.svg" alt="">
        </a>
      </li>
      <li class="w-header__snsitem">
        <a href="#">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/facebook.svg" alt="">
        </a>
      </li>
    </ul>
  </nav>
</header>
