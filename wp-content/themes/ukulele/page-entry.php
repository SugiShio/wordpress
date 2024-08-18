<?php get_header(); ?>
<div id="stripe-pk" style="display: none;" data-pk="<?php echo post_custom('publishable_key') ?>"></div>
<div id="lang" data-lang="<?php echo $GLOBALS['lang']['value']; ?>"></div>

<section class="section u-entry">
  <div class="u-entry__container">
    <?php if (post_custom('description')) : ?>
    <div class="u-entry__description">
      <?php echo post_custom('description'); ?>
    </div>
    <?php endif; ?>
    <?php the_content(); ?>
  </div>
</section>
<?php get_footer(); ?>