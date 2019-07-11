<?php get_header(); ?>
<section class="f-single">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="f-single__head">

      <h3 class="f-single__title"><?php the_title(); ?></h3>
      <time class="f-single__date"><?php echo get_post_time('Y年n月j日'); ?></time>
    </div>
    <div class="f-single__content"><?php the_content(); ?></div>
  <?php endwhile; ?>
</section>

<section class="f-navigation">
  <?php the_post_navigation(); ?>
</section>
<?php get_footer(); ?>
