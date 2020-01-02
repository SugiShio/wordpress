<?php get_header(); ?>
<main id="app" class="o-main">
  <?php
  $term = 'videos';
  include 'title.php';
  ?>
  <youtube-loader base-url="<?php echo get_site_url() ?>">"></youtube-loader>
</main>

<?php get_footer(); ?>