<header class="header">
  <div class="header__inner">
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="LUDENS ISESAKI WEDDING VILLA" class="header__logo">
    </a>
    <div class="contact-box-pc">
      <?php get_template_part('components/contact-box'); ?>
    </div>
    <div class="sns-links-pc">
      <?php get_template_part('components/sns-links'); ?>
    </div>
    <div class="menu-button-open js-hamburger_trigger-open">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</header>
