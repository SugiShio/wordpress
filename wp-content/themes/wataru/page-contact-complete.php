<?php get_header(); ?>
<main class="w-main js-main">
  <div class="w-singlecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="w-content w-contact">
        <div class="w-contact__title">
          <h2 class="w-content__title">
            <?php the_title(); ?>
          </h2>
        </div>
        <div class="w-contact__body">
          <?php the_content(); ?>
        </div>
      </section>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
