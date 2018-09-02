<nav class="menu">
  <ul class="menu-list">
    <li class="menu-list__item">
      <a href="<?php echo home_url(); ?>" class="menu-list__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top.svg" alt="トップ" class="menu-list__image">
      </a>
    </li>
    <li class="menu-list__item">
      <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/concept.svg" alt="コンセプト" class="menu-list__image">
      </a>
    </li>
    <li class="menu-list__item">
      <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility.svg" alt="施設" class="menu-list__image">
      </a>
    </li>
    <li class="menu-list__item">
      <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fair.svg" alt="フェア" class="menu-list__image">
      </a>
    </li>
    <li class="menu-list__item">
      <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan.svg" alt="プラン" class="menu-list__image">
      </a>
    </li>
    <li class="menu-list__item">
      <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cuisine.svg" alt="料理" class="menu-list__image">
      </a>
    </li>
  </ul>
</nav>
