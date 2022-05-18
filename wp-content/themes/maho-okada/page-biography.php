<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<section class="mo-container mo-biography">
  <h2 class="mo-container__title">Biography</h2>

  <h3 class="mo-biography__name">
    <span>
      <?php echo post_custom('name'); ?>
    </span>
    <?php if (post_custom('name_en')) : ?>
    <small class="mo-biography__name-en">
      <?php echo post_custom('name_en'); ?>
    </small>
    <?php endif; ?>
  </h3>

  <div class="mo-biography__content">
    <?php the_content(); ?>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>