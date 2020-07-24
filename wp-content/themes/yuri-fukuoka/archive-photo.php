<?php get_header(); ?>

<?php
  // memo ページネーション未実装
  $posts = get_posts(array(
    'post_type' => 'photo',
    'posts_per_page' => 30
  ));
?>
<section class="y-container y-photo">
  <h2 class="y-title">Photo</h2>

  <ul class="y-photo__list">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    ?>
    <li class="y-photo__item">
      <div class="y-photo__date">
        <?php the_date(); ?>
      </div>

      <h3 class="y-photo__title">
        <?php the_title(); ?>
      </h3>

      <?php if (get_the_content()) : ?>
      <div class="js-gallery">

        <div class="y-photo__content js-gallery">
          <?php the_content(); ?>
        </div>
        <view-window
          v-show='isShow'
          :src='imageUrl'
          @close-button-clicked='closeViewer'
          @next-button-clicked='showNext'
          @prev-button-clicked='showPrev'
          title='<?php the_date(); ?> <?php the_title(); ?>'></view-window>
      </div>
      <?php endif; ?>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</section>

<?php get_footer(); ?>
