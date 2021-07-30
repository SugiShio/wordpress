<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="y-container y-contact">
  <h2 class="y-title">Contact</h2>

  <div class="y-contact__content">
    <?php the_content(); ?>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
