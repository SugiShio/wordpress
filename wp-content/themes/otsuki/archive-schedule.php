<?php get_header(); ?>
<main class="o-main o-schedule">
  <div class="o-title">
    <h2>
      <img
        src="<?php echo get_template_directory_uri()."/assets/images/titles/".$GLOBALS['theme_name']."/schedule.svg"; ?>"
        alt="schedule">
    </h2>
    <span class="o-title__sub">スケジュール</span>
  </div>

  <?php
  $year = (int)$_GET['y'];
  $month = (int)$_GET['m'];
  if(0 < $year && 0 < $month && $month <= 12) :
    get_template_part('archive-schedule-scoped');
  else :
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
    <?php if(empty($posts)) : ?>
    <li class="o-schedule__item">
      予定されているスケジュールはありません
    </li>
    <?php
    else :
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
      <div class="o-schedule__place">
        @
        <?php if(post_custom('place_url')) : ?>
        <a href="<?php echo post_custom('place_url'); ?>" target="_blank">
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
    endif;
    ?>
  </ul>
  <?php
  $year = date('Y');
  $month = date('m') - 1;
  if($month < 1) {
    $month += 12;
    $year--;
  }
  ?>
  <div class="o-schedule__link">
    <a href="<?php echo esc_url(add_query_arg(array('y' => $year, 'm' => $month))); ?>">過去のスケジュール</a>
  </div>
  <?php endif; ?>

</main>

<?php get_footer(); ?>