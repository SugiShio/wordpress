<?php
get_header();
$posts = get_posts(array(
  'post_type' => 'discography',
  'meta_key' => 'year',
  'orderby' => 'meta_value',
  'order' => 'Desc',
  'posts_per_page' => 10
));
?>
<main id="app" class="o-main">
  <?php
  $term = 'discography';
  include 'title.php';
  ?>

  <ul class="o-discography">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    ?>
    <li class="o-discography__item">
      <?php if(get_field('image')) : ?>
      <div class="o-discography__image">
        <img src="<?php echo get_field('image') ?>" alt="">
      </div>
      <?php endif; ?>

      <h3 class="o-discography__title">
        <?php echo get_the_title(); ?>
      </h3>

      <div class="o-discography__year">
        <span><?php echo post_custom('year'); ?></span>
      </div>

      <?php if(get_the_content()) : ?>
      <div class="o-discography__content"><?php the_content(); ?></div>
      <?php endif; ?>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</main>

<?php get_footer(); ?>
