<header class="header">
  <div class="header__inner">
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="LUDENS ISESAKI WEDDING VILLA" class="header__logo">
    </a>
    <div class="contact-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tell-number.png" alt="" class="contact-box__tell-number">
      <ul class="contact-box__links">
        <li class="contact-box__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="contact-box__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reserve.png" alt="">
          </a>
        </li>
        <li class="contact-box__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="contact-box__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png" alt="">
          </a>
        </li>
        <li class="contact-box__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="contact-box__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact.png" alt="">
          </a>
        </li>
      </ul>
    </div>
    <ul class="sns-links">
      <li class="sns-links__item">
        <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="sns-links__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="">
        </a>
      </li>
      <li class="sns-links__item">
        <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="sns-links__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="">
        </a>
      </li>
    </ul>
  </div>
</header>
