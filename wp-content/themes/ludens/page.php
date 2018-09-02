<?php get_header(); ?>
<?php $coming_soon_url = get_permalink(get_page_by_path('coming-soon')->ID); ?>

<div class="wrapper">
  <header class="header">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="LUDENS ISESAKI WEDDING VILLA" class="header__logo">
    <div class="contact-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tell-number.svg" alt="" class="contact-box__tell-number">
      <ul class="contact-box__links">
        <li class="contact-box__item">
          <a href="<?php echo $coming_soon_url ?>" class="contact-box__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reserve.svg" alt="">
          </a>
        </li>
        <li class="contact-box__item">
          <a href="<?php echo $coming_soon_url ?>" class="contact-box__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt="">
          </a>
        </li>
        <li class="contact-box__item">
          <a href="<?php echo $coming_soon_url ?>" class="contact-box__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact.svg" alt="">
          </a>
        </li>
      </ul>
    </div>
    <ul class="sns-links">
      <li class="sns-links__item">
        <a href="<?php echo $coming_soon_url ?>" class="sns-links__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="">
        </a>
      </li>
      <li class="sns-links__item">
        <a href="<?php echo $coming_soon_url ?>" class="sns-links__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="">
        </a>
      </a>
    </ul>
  </header>

  <nav class="menu">
    <ul class="menu-list">
      <li class="menu-list__item">
        <a href="<?php echo $coming_soon_url ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top.svg" alt="トップ" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo $coming_soon_url ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/concept.svg" alt="コンセプト" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo $coming_soon_url ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility.svg" alt="施設" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo $coming_soon_url ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fair.svg" alt="フェア" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo $coming_soon_url ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan.svg" alt="プラン" class="menu-list__image">
        </a>
      </li>
      <li class="menu-list__item">
        <a href="<?php echo $coming_soon_url ?>" class="menu-list__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cuisine.svg" alt="料理" class="menu-list__image">
        </a>
      </li>
    </ul>
  </nav>

  <main class="coming-soon">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/comingsoon_l.jpg" alt="Coming Soon">
  </main>

  <footer class="footer">
    <div class="footer__copyright">
      <small>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/copyright.svg" alt="Copyright ©︎ 0000000 All Rights Reserved.">
      </small>
    </div>
  </footer>

</div>
<?php get_footer(); ?>
