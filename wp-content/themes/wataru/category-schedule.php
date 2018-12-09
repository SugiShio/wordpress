<?php get_header(); ?>
<main class="w-main js-main">
  <div class="w-columnswrapper">
    <div class="w-maincolumn">
      <section class="w-content">
        <h2 class="w-content__title"><?php echo single_cat_title(); ?></h2>
        <?php
          $posts_per_page = 5;
          $dt = new DateTime('', new DateTimeZone('Asia/Tokyo'));
          $today = $dt->format('Y').$dt->format('m').$dt->format('d');
          $args = array(
            'category_name' => 'schedule',
            'order_by' => 'meta_value',
            'order' => 'asc',
            'posts_per_page' => -1,
            'meta_key' => 'date',
            'meta_value' => $today,
            'meta_compare' => '>=',
            'meta_type' => 'NUMERIC'
          );
          $posts = get_posts($args);

          $posts_total = count($posts);
          $current_page = array_key_exists('page', $_GET) ? $_GET['page'] : 0;
          $offset = $current_page * $posts_per_page;
          $posts = array_slice( $posts, $offset, $posts_per_page);
        ?>

        <?php if(empty($posts)) : ?>
          <p class="w-category__no-posts">表示するスケジュールがありません</p>
        <?php else : ?>
          <ul class="w-category-list">
          <?php foreach ($posts as $post) : ?>
            <?php
              setup_postdata($post);
              $date_int = (int)post_custom('date');
              $year = floor($date_int / 10000);
              $month = floor($date_int % 10000 / 100);
              $day = $date_int % 100;

              $date_dt = new DateTime( $year.'-'.$month.'-'.$day );
             ?>
              <li class="w-category-list__item">
                <article class="w-category">
                  <time class="w-category__date"><?php echo $date_dt->format('Y.n.j D'); ?></time>
                  <h3 class="w-category__title"><?php the_title(); ?></h3>
                  <div class="w-category__body"><?php the_content(); ?></div>
                </article>
              </li>
            <?php wp_reset_postdata(); ?>
          <?php endforeach; ?>
          </ul>
          <?php include 'module-pager.php'; ?>
        <?php endif; ?>
      </section>
    </div>
    <?php get_template_part('module', 'sidecolumn'); ?>
  </div>
</main>
<?php get_footer(); ?>
