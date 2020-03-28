<?php get_header(); ?>
<?php
  $url = get_post_type_archive_link('schedule');
  $year = (int)$_GET['y'];
  $month = (int)$_GET['m'];
  $start_date = $year."-".$month."-01";
  $prev_year = $next_year = $year;
  $prev_month = $next_month = $month;

  $prev_month -= 1;
  if($prev_month < 1) {
    $prev_month += 12;
    $prev_year--;
  }
  $next_month += 1;
  if(12 < $next_month) {
    $next_month -= 12;
    $next_year++;
  }
  $next_date = $next_year."-".$next_month."-01";

  $posts = get_posts(array(
    'post_type' => 'schedule',
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => [
      [
        'key'     => 'date',
        'value'   => date('Ymd', strtotime($start_date)),
        'compare' => '>=',
      ],
      [
        'key'     => 'date',
        'value'   => date('Ymd', strtotime($next_date)),
        'compare' => '<=',
      ],
    ],
    'posts_per_page' => 50
  ));
  ?>
<div class="o-content">
  <div class="o-schedule__monthSelector">
    <div class="o-schedule__selectorButton">
      <a href="<?php echo esc_url(add_query_arg(array('y' => $prev_year, 'm' => $prev_month), $url)); ?>">&lt;</a>
    </div>
    <h3 class="o-schedule__dateTitle">
      <?php echo $year; ?>.
      <span><?php echo $month; ?></span>
    </h3>
    <div class="o-schedule__selectorButton">
      <?php if(date('Ymd', strtotime($next_date)) < date('Ymd')) : ?>
      <a href="<?php echo esc_url(add_query_arg(array('y' => $next_year, 'm' => $next_month), $url)); ?>">&gt;</a>
      <?php endif; ?>
    </div>
  </div>
  <ul>
    <?php if(empty($posts)) : ?>
    <li class="o-schedule__item">
      スケジュールはありません
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
    endif;
    ?>
  </ul>
</div>
</main>

<?php get_footer(); ?>