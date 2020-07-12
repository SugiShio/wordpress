<?php get_header(); ?>

<?php
$posts = get_posts(array(
  'post_type' => 'flamenco',
  'meta_key' => 'order',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'posts_per_page' => 50,
));
?>

<section class="y-container y-classes">
  <h3 class="y-classes__title-1">レッスン</h3>
  <?php
  if($posts) :
  ?>

  <ul class="y-classes__list">
    <?php
    foreach($posts as $post) :
      setup_postdata( $post );
      ?>
    <li class="y-classes__item">
      <h4 class="y-classes__title-2"><?php the_title(); ?></h4>
      <div class="y-classes__content">
        <?php the_content(); ?>
      </div>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
  <?php endif; ?>
</section>

<?php get_footer(); ?>