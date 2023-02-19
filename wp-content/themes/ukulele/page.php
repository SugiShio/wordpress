<?php get_header(); ?>

<section class="section u-page<?php if (post_custom('no_nav')) echo " is-single"; ?>">
  <div class="u-page__container">
    <?php the_content(); ?>
  </div>
</section>

<?php get_footer(); ?>
