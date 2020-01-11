<?php get_header(); ?>
<main class="o-main">
  <div class="o-title">
    <h2>
      <img
        src="<?php echo get_template_directory_uri()."/assets/images/titles/".$GLOBALS['theme_name']."/contact.svg"; ?>"
        alt="contact">
    </h2>
    <span class="o-title__sub">お問い合わせ</span>
  </div>

  <?php
  if(have_posts()):
  while(have_posts()):
  the_post();
  ?>
  <div class="o-content" id="app">
    <?php the_content();?>
  </div>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>