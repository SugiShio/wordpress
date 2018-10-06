<div class="contact-box">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tell-number.png" alt="" class="contact-box__tell-number">
  <ul class="contact-box__links">
    <li class="contact-box__item">
      <a href="<?php echo get_permalink(get_page_by_path('reserve-input')->ID); ?>" class="contact-box__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reserve.png" alt="">
      </a>
    </li>
    <li class="contact-box__item">
      <a href="<?php echo get_permalink(get_page_by_path('request-input')->ID); ?>" class="contact-box__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png" alt="">
      </a>
    </li>
    <li class="contact-box__item">
      <a href="<?php echo get_permalink(get_page_by_path('contact-input')->ID); ?>" class="contact-box__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact.png" alt="">
      </a>
    </li>
  </ul>
</div>
