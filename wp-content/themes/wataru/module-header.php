<header class="w-header js-header" id="js-hamburger_content">
  <nav class="w-header__nav">
    <ul class="menu">
      <?php if(!is_home()) : ?>
      <li class="menu-item">
        <a href="<?php echo esc_url(home_url()); ?>">Top</a>
      </li>
      <?php endif; ?>
      <li class="menu-item">
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('schedule')->cat_ID)); ?>"><?php echo get_category_by_slug('schedule')->cat_name; ?></a>
      </li>
      <li class="menu-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('profile')->ID)); ?>"><?php echo get_the_title(get_page_by_path('profile')); ?></a>
      </li>
      <li class="menu-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('equipment')->ID)); ?>"><?php echo get_the_title(get_page_by_path('equipment')); ?></a>
      </li>
      <li class="menu-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact-input')->ID)); ?>"><?php echo get_the_title(get_page_by_path('contact-input')); ?></a>
      </li>
      <li class="menu-item">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('recording-pack')->ID)); ?>"><?php echo get_the_title(get_page_by_path('recording-pack')); ?></a>
      </li>
      <?php /*
      */ ?>
    </ul>
    <ul class="w-header__sns">
      <?php foreach($GLOBALS['sns'] as $key => $value) : ?>
      <li class="w-header__snsitem">
        <a href="<?php echo $value['url'] ?>" class="w-header__snslink" target='_blank'>
          <i class="w-header__snsicon icon-<?php echo $key ?>"></i>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <div class="w-hamburger-trigger" id="js-hamburger_trigger">
    <span></span>
    <span></span>
    <span></span>
  </div>
</header>
<div class="w-hamburger-bg" id="js-hamburger_bg"></div>
