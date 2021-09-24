<?php get_header(); ?>
<section class="mo-container mo-schedule">
  <h2 class="mo-container__title">Works</h2>
  <maho-works-loader base-url="<?php echo get_site_url(); ?>" post-type='works'>"></maho-works-loader>
</section>

<?php get_footer(); ?>