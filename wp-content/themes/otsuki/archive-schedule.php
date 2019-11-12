<?php get_header(); ?>
<main class="o-main o-schedule">
  <div class="o-title">
    <h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titles/schedule.svg" alt="schedule">
    </h2>
    <span class="o-title__sub">スケジュール</span>
  </div>

  <?php
  $posts = get_posts(array(
    'post_type' => 'schedule',
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_value' => date('Ymd'),
    'meta_compare' => '>=',
    'posts_per_page' => 20
  ));
  ?>
  <ul class="o-content">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    $date = get_field('date');
    ?>
    <li class="o-schedule__item">
      <time class="o-schedule__date" datetime="<?php echo $date; ?>">
        <?php echo date('Y.m.d D', strtotime($date)); ?>
      </time>
      <h3 class="o-schedule__title"><?php echo get_the_title(); ?></h3>

      <?php if(post_custom('place')) : ?>
      <div>
        @
        <?php if(post_custom('place_url')) : ?>
        <a href="<?php echo post_custom('place_url'); ?>">
          <?php echo post_custom('place'); ?>
        </a>
        <?php else : ?>
        <?php echo post_custom('place'); ?>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <?php if(get_the_content()) : ?>
      <div class="o-schedule__content"><?php the_content(); ?></div>
      <?php endif; ?>

    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</main>

<?php get_footer(); ?>
