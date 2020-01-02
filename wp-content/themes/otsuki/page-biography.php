<?php get_header(); ?>
<main class="o-main o-biography">
  <div class="o-title">
    <h2>
      <img
        src="<?php echo get_template_directory_uri()."/assets/images/titles/".$GLOBALS['theme_name']."/biography.svg"; ?>"
        alt="biography">
    </h2>
  </div>

  <?php
  if(have_posts()):
  while(have_posts()):
  the_post();
  ?>

  <h3 class="o-biography__name">
    <?php echo post_custom('name'); ?>
    <span class="o-biography__en"><?php echo post_custom('name_en'); ?></span>
  </h3>

  <article class="o-content o-biography__content">
    <?php the_content();?>
  </article>
  <?php endwhile; endif; ?>

  <?php include 'snslist.php' ?>

</main>
<?php get_footer(); ?>