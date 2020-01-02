<?php get_header(); ?>
<main id="app" class="o-main">
  <?php
  $term = 'discography';
  include 'title.php';
  ?>
  <works-loader base-url="<?php echo get_site_url() ?>" post-type='discography'>"></works-loader>
</main>

<?php get_footer(); ?>