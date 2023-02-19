<?php get_header(); ?>

<section class="section u-single">
  <article class="u-single__container">
    <time datetime="<?php echo get_the_date(DATE_W3C); ?>" class="u-single__date"><?php echo get_the_date(); ?></time>
    <div class="u-single__content">
      <?php the_content(); ?>
    </div>
  </article>
</section>

<?php get_footer(); ?>
