<?php get_header(); ?>
<main id="app" class="o-main">
  <div class="o-title">
    <h2>
      <img
        src="<?php echo get_template_directory_uri()."/assets/images/titles/".$GLOBALS['theme_name']."/works.svg"; ?>"
        alt="works">
    </h2>
    <span class="o-title__sub">作品</span>
  </div>

  <works-loader base-url="<?php echo get_site_url() ?>">"></works-loader>
</main>

<?php get_footer(); ?>