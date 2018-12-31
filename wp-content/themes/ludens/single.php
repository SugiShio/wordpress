<?php
if(in_category('gallery')) :
  include(TEMPLATEPATH.'/single-gallery.php');
else : ?>
<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post();?>
<section class="concept content-wrapper">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        <?php the_title(); ?>
      </h2>
    </div>
  </div>

  <article class="content-main">
    <?php the_content(); ?>
  </article>
</section>
<?php endwhile; endif ?>

<?php get_footer(); ?>
<?php endif; ?>
