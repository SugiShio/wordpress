<section class="m-top">
  <?php
    $post = get_page_by_path('about-mao');
    setup_postdata( $post );
    $site_title = post_custom('name');
    $site_subtitle = post_custom('title');
  ?>
  <h1 class="m-top__title">
    <?php echo $site_title; ?>
    <span class="m-top__subtitle"><?php echo $site_subtitle; ?></span>
  </h1>
  <?php wp_reset_postdata(); ?>
</section>