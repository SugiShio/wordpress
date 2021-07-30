<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="y-container y-profile">
  <h2 class="y-title">Profile</h2>

  <?php
  $url_image = get_field('image');
  if($url_image) :
  ?>
  <div class="y-profile__image">
    <img src="<?php echo get_field('image'); ?>" alt="">
  </div>
  <?php endif; ?>

  <h3 class="y-profile__name">
    <?php echo post_custom('name_ja'); ?>
    <?php if(post_custom('name_en')) : ?>
    <span class="y-profile__nameEn">
      <?php echo post_custom('name_en'); ?>
    </span>
    <?php endif; ?>

  </h3>

  <div class="y-profile__content">
    <?php the_content(); ?>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>