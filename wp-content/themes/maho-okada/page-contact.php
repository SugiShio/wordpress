<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<section class="mo-container mo-contact">
  <h2 class="mo-container__title">Contact</h2>

  <div class="mo-contact__content">
    <?php the_content(); ?>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>