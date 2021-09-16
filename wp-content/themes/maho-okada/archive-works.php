<?php get_header(); ?>
<main id="app" class="o-main">
  <?php
  $term = 'works';
  include 'title.php';
  ?>
  <works-loader base-url="<?php echo get_site_url() ?>" post-type='works'>"></works-loader>
</main>

<?php get_footer(); ?>