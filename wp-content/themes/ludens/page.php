<?php get_header(); ?>

<section class="contact">
<?php if(have_posts()): while(have_posts()): the_post();?>
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        <?php the_title(); ?>
      </h2>
    </div>
    <p class="content-head__description"><?php echo post_custom('subtitle'); ?></p>
  </div>

  <div class="content-main">
    <div class="contact__form">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
