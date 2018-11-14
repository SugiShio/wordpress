<?php get_header(); ?>
<main class="w-main js-main">
  <div class="w-columnswrapper">
    <div class="w-maincolumn">
      <section class="w-content">
        <h2 class="w-content__title"><?php echo single_cat_title(); ?></h2>
        <div id="vue-schedule"></div>
        <div id="mount-point"></div>
      </section>
    </div>
    <?php get_template_part('module', 'sidecolumn'); ?>
  </div>
</main>
<?php get_footer(); ?>
