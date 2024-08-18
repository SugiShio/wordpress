<?php get_header(); ?>
<?php if (class_exists('GetHeartEveryday')) : ?>

<?php
  $ghe = new GetHeartEveryday();
  if (in_array($_GET['dep'], $departments)) {
    $dep = $_GET['dep'];
    $dep_index = array_search($dep, $departments) + 1;
    $is_year_param_valid = preg_match('/\d{4}/', $_GET['y']);
    $year_string = $is_year_param_valid ? $_GET['y'] : date_i18n('Y');
    $dep_term = $dep_index . '-' . $dep . '-' . $year_string;
    $clicked_post_id = $ghe->get_hearted_id($dep_term);
  };

  // 広告
  $args_pr = [];
  $args_pr = array(
    'post_type' => 'pr',
    'orderby' => 'rand',
    'posts_per_page' => 2,
  );
  if ($dep) {
    $slug = $dep == 'photo' ? 'image' : 'movie';
    $args_pr['tax_query'] = array(
      array(
        'taxonomy' => 'pr_type',
        'field' => 'slug',
        'terms' => $slug
      )
    );
  };
  $the_query_pr = new WP_Query($args_pr);
  $pr_total = $the_query_pr->found_posts;

  $posts_per_page = 15 - $pr_total;
  $pagenum = 0 < $_GET['pagenum'] ? $_GET['pagenum'] : 1;

  // 応募作品
  $args = array(
    'post_type' => 'gallery',
    'orderby' => 'date',
    'posts_per_page' => $posts_per_page,
    'offset' => ($pagenum - 1) * $posts_per_page,
  );
  if ($dep_term) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'department',
        'field' => 'slug',
        'terms' => $dep_term
      )
    );
  };
  $the_query = new WP_Query($args);

  function filter_departments($departments)
  {
    $slug = $departments->slug;
    return preg_match('/^\d*\-(.*)\-\d*$/', $slug);
  }

  while ($the_query->have_posts()) {
    $the_query->the_post();

    $item = [];
    $item['title'] = get_the_title();
    $item['name'] = post_custom('name');
    $item['post_id'] = get_the_ID();

    $item_department_terms = get_the_terms($post, 'department');
    $item_department_terms = array_filter($item_department_terms, 'filter_departments');
    $item_department_term = array_shift($item_department_terms);
    $item_department_slug = $item_department_term->slug;
    preg_match('/^\d*\-(.*)\-\d*$/', $item_department_slug, $matches);
    $item['department'] = $matches[1];
    $item['cat_id'] = $item_department_term->term_id;

    if ($dep) {
      $heart = array(
        'count' => post_custom('ghe_count') ? intval(post_custom('ghe_count')) : 0,
        'is_active' => !(bool)$clicked_post_id,
        'is_clicked' => get_the_ID() == $clicked_post_id,
      );
      $item['heart'] = $heart;
    }

    if (post_custom('id')) {
      $item['type'] = 'movie';
      $item['id'] = post_custom('id');
    } else if (get_field('image')) {
      $item['type'] = 'photo';
      $item['image'] = get_field('image');
      $item['url'] = get_field('url');
    } else {
      $item['type'] = 'sponsor';
    }
    $items[] = $item;
  }
  $total = $the_query->found_posts;
  wp_reset_postdata();

  // 広告
  $cnt = 0;
  while ($the_query_pr->have_posts()) {
    $the_query_pr->the_post();
    $item = [];
    if (post_custom('description')) {
      $item['title'] = post_custom('description');
      $item['name'] = post_custom('sponsor');
    } else {
      $item['title'] = post_custom('sponsor');
    }
    $item['url'] = get_field('url');
    if (post_custom('id')) {
      $item['type'] = 'prMovie';
      $item['id'] = post_custom('id');
    } else if (get_field('image')) {
      $item['type'] = 'prImage';
      $item['image'] = get_field('image');
    }

    if (!$cnt++) {
      array_unshift($items, $item);
    } else {
      $items[] = $item;
    }
  }
  wp_reset_postdata();

  $items = htmlspecialchars(json_encode($items));
  $ajax_url = admin_url('admin-ajax.php');
  $is_heart_closed = $ghe->get_is_heart_closed();
  ?>
<section class="section u-gallery">
  <?php
    $post = get_post(get_page_by_path('gallery'));
    setup_postdata($post);
    ?>
  <div class="section__head">
    <h1 class="section__head-main"><span>
        <?php echo get_the_title(); ?>
      </span></h1>
    <p class="section__head-sub"><?php echo post_custom('sub_title') ?></p>
  </div>
  <div class="section__gallery-note">
    <?php echo markdown_post_custom('notification'); ?>
  </div>
  <?php wp_reset_postdata(); ?>

  <div class="u-gallery__container">
    <div id="gallery">
      <gallery ajax-url="<?php echo $ajax_url; ?>" :items="<?php echo $items ?>"
        :is-heart-closed="<?php var_export((bool)$is_heart_closed); ?>"
        :is-heart-active="<?php var_export(!(bool)$clicked_post_id); ?>"
        <?php if ($dep) echo 'department="' . $dep . '"'; ?> />
    </div>

    <?php //ページネーション
      ?>
    <?php if ($posts_per_page < $total) :
        $page_max = (int) ($total / $posts_per_page + 1);
      ?>
    <ul class="u-pagination">
      <?php if (1 < $pagenum) : ?>
      <li>
        <a href="<?php echo add_query_arg('pagenum', $pagenum - 1, $_SERVER["REQUEST_URI"]); ?>"
          class="u-pagination__numbers prev">
          <i class="icon-left"></i>
        </a>
      </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $page_max; $i++) : ?>
      <li>
        <a <?php if ($pagenum != $i) : ?> href="<?php echo add_query_arg('pagenum', $i, $_SERVER["REQUEST_URI"]); ?>"
          <?php endif; ?> class="u-pagination__numbers">
          <?php echo $i; ?>
        </a>
      </li>
      <?php endfor; ?>

      <?php if ($pagenum < $page_max) : ?>
      <li>
        <a href="<?php echo add_query_arg('pagenum', $pagenum + 1, $_SERVER["REQUEST_URI"]); ?>"
          class="u-pagination__numbers next">
          <i class="icon-right"></i>
        </a>
      </li>
      <?php endif; ?>
    </ul>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>