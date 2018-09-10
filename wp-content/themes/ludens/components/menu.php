<nav class="menu">
  <div class="menu__inner">
    <ul class="menu-list">
      <li class="menu-list__item">
        <a href="<?php echo home_url(); ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu/top.png" alt="トップ" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('concept')->ID); ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu/concept.png" alt="コンセプト" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('facility')->ID); ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu/facility.png" alt="施設" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu/fair.png" alt="フェア" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu/plan.png" alt="プラン" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('cuisine')->ID); ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu/cuisine.png" alt="料理" class="menu-list__image">
        </a>
      </li>
    </ul>
  </div>
</nav>
