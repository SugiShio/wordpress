<nav class="menu js-hamburger_content">
  <div class="menu__inner">
    <ul class="menu-list">
      <li class="menu-list__item">
        <a href="<?php echo home_url(); ?>" class="menu-list__link">
          <span class="menu-list__text-main">TOP</span>
          <span class="menu-list__text-sub">トップ</span>
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('concept')->ID); ?>" class="menu-list__link">
          <span class="menu-list__text-main">CONCEPT</span>
          <span class="menu-list__text-sub">コンセプト</span>
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('facility')->ID); ?>" class="menu-list__link">
          <span class="menu-list__text-main">FACILITY</span>
          <span class="menu-list__text-sub">施設</span>
        </a>
      </li>
      <li class="menu-list__item">
        <a href="https://zexy.net/wedding/c_7770020837/" class="menu-list__link" target="_blank">
          <span class="menu-list__text-main">FAIR</span>
          <span class="menu-list__text-sub">フェア</span>
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('plan')->ID); ?>" class="menu-list__link">
          <span class="menu-list__text-main">PLAN</span>
          <span class="menu-list__text-sub">プラン</span>
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo get_permalink(get_page_by_path('cuisine')->ID); ?>" class="menu-list__link">
          <span class="menu-list__text-main">CUISINE</span>
          <span class="menu-list__text-sub">料理</span>
        </a>
      </li>
    </ul>
    <div class="contact-box-sp">
      <?php get_template_part('components/contact-box'); ?>
    </div>
    <div class="sns-links-sp">
      <?php get_template_part('components/sns-links'); ?>
    </div>
    <div class="menu-button-close js-hamburger_trigger-close">CLOSE</div>
  </div>
</nav>
