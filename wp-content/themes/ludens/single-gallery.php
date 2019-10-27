<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post();?>
<section class="concept content-wrapper">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        <?php the_title(); ?>
      </h2>
    </div>
    <?php if(!empty(post_custom('name'))) : ?>
      <p class="content-head__description"><?php echo post_custom('name'); ?></p>
    <?php endif; ?>
  </div>

  <article class="gallery">
    <?php if(has_post_thumbnail()) : ?>
      <div class="gallery__main-img">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>

    <?php if(!empty(post_custom('description'))) : ?>
      <div class="content-main">
        <div class="gallery__text">
          <?php echo post_custom('description'); ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="gallery__images" id="masonry">
      <?php the_content(); ?>
    </div>
  </article>
</section>
<?php endwhile; endif ?>

<?php get_footer(); ?>
