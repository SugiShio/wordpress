<section class="m-about" key="aboutMao">
  <?php
    $post = get_page_by_path('about');
    setup_postdata( $post );
  ?>
  <div class="m-about__image">
    <img src="<?php echo get_field('image')?>" alt="">
  </div>
  <h3 class="m-about__name">
    <?php echo post_custom('name'); ?>
  </h3>
  <span class="m-about__title"><?php echo post_custom('title'); ?></span>
  <div class="m-about__content"><?php the_content(); ?></div>
  <?php wp_reset_postdata(); ?>
</section>
