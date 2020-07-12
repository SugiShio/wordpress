<?php get_header(); ?>

<?php
  $posts = get_posts(array(
    'post_type' => 'access',
    'meta_key' => 'order',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'posts_per_page' => 50
  ));
?>
<section class="y-container y-access">
  <h2 class="y-title">Access</h2>

  <ul class="y-access__list">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    ?>
    <li class="y-access__item">
      <h3 class="y-access__title">
        <?php the_title(); ?>
      </h3>

      <?php if (post_custom('address')) : ?>
      <div class="y-access__address">
        <?php echo post_custom('address'); ?>
      </div>
      <?php endif; ?>

      <div class="y-access__container">
        <div class="y-access__content">
          <?php the_content(); ?>
        </div>

        <div class="y-access__map">
          <?php echo post_custom('html_map'); ?>
        </div>
      </div>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</section>

<?php get_footer(); ?>