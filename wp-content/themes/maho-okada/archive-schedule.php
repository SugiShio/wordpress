<?php
get_header();
$year = (int)$_GET['y'];
$month = (int)$_GET['m'];
$is_scoped = 0 < $year && 0 < $month && $month <= 12;
$query = array(
  'post_type' => 'schedule',
  'meta_key' => 'date',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'posts_per_page' => 50
);

if (!$is_scoped) {
  $query['meta_value'] = date('Ymd');
  $query['meta_compare'] = '>=';
} else {
  $start_date = $year . "-" . $month . "-01";
  $prev_year = $next_year = $year;
  $prev_month = $next_month = $month;

  $prev_month -= 1;
  if ($prev_month < 1) {
    $prev_month += 12;
    $prev_year--;
  }
  $next_month += 1;
  if (12 < $next_month) {
    $next_month -= 12;
    $next_year++;
  }
  $next_date = $next_year . "-" . $next_month . "-01";

  $query['meta_query'] = [
    [
      'key'     => 'date',
      'value'   => date('Ymd', strtotime($start_date)),
      'compare' => '>=',
    ],
    [
      'key'     => 'date',
      'value'   => date('Ymd', strtotime($next_date)),
      'compare' => '<=',
    ]
  ];
}

$posts = get_posts($query);
?>

<section class="mo-container mo-schedule">
  <h2 class="mo-container__title">Schedule</h2>

  <?php if ($is_scoped) : ?>
  <div class="mo-schedule__monthSelector">
    <div class="mo-schedule__selectorButton">
      <a href="<?php echo esc_url(add_query_arg(array('y' => $prev_year, 'm' => $prev_month), $url)); ?>">&lt;</a>
    </div>
    <h3 class="mo-schedule__dateTitle">
      <?php echo $year; ?>.
      <span><?php echo $month; ?></span>
    </h3>
    <div class="mo-schedule__selectorButton">
      <?php if (date('Ymd', strtotime($next_date)) < date('Ymd')) : ?>
      <a href="<?php echo esc_url(add_query_arg(array('y' => $next_year, 'm' => $next_month), $url)); ?>">&gt;</a>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

  <ul class="mo-content">
    <?php if (empty($posts)) : ?>
    <li class="mo-schedule__item">
      スケジュールはありません
    </li>
    <?php
    else :
      foreach ($posts as $post) :
        setup_postdata($post);
        $date = get_field('date');
      ?>
    <li class="mo-schedule__item">
      <time class="mo-schedule__date" datetime="<?php echo $date; ?>">
        <?php echo date('Y.m.d D', strtotime($date)); ?>
      </time>
      <h3 class="mo-schedule__title"><?php echo get_the_title(); ?></h3>

      <?php if (post_custom('place')) : ?>
      <div class="mo-schedule__place">
        @
        <?php if (post_custom('place_url')) : ?>
        <a href="<?php echo post_custom('place_url'); ?>" target="_blank">
          <?php echo post_custom('place'); ?>
        </a>
        <?php else : ?>
        <?php echo post_custom('place'); ?>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <?php if (get_the_content()) : ?>
      <div class="mo-schedule__content"><?php the_content(); ?></div>
      <?php endif; ?>

    </li>
    <?php
        wp_reset_postdata();
      endforeach;
    endif;
    ?>
  </ul>

  <?php if (!$is_scoped) : ?>
  <?php
    $year = date('Y');
    $month = date('m') - 1;
    if ($month < 1) {
      $month += 12;
      $year--;
    }
    ?>
  <div class="mo-schedule__link">
    <a href="<?php echo esc_url(add_query_arg(array('y' => $year, 'm' => $month))); ?>">過去のスケジュール</a>
  </div>
  <?php endif; ?>

</section>
<?php get_footer(); ?>