<?php get_header(); ?>

<section class="section u-info">
  <div class="section__head">
    <h1 class="section__head-main"><span>
      <?php echo post_custom('concept_title'); ?>
    </span></h1>
  </div>
  <div class="u-info__concept">
    <?php echo markdown_post_custom('concept_text'); ?>
  </div>

  <ul class="u-info__logos">
    <?php
    $posts = get_posts(array(
      'post_type' => 'department',
      'meta_key' => 'order',
      'orderby' => 'meta_value_num',
      'order' => 'ASC'
    ));
    foreach($posts as $post) : setup_postdata( $post );
    ?>
    <li class="u-info__logo">
      <i class="icon-<?php echo $post->post_name ?> color-<?php echo $post->post_name ?>"></i>
    </li>
    <?php wp_reset_postdata(); endforeach; ?>
  </ul>
</section>

<!-- スケジュール -->
<section class="section u-info">
  <div class="section__head">
    <h1 class="section__head-main"><span>
      <?php echo post_custom('schedule_title'); ?>
    </span></h1>
  </div>
  <div class="u-info__container">
    <div class="u-info__schedule">
      <?php echo markdown_post_custom('schedule_text'); ?>
    </div>
  </div>
</section>

<!-- 過去大会 -->
<section class="section u-info">
  <div class="section__head">
    <h1 class="section__head-main"><span>
      <?php echo post_custom('past_result_title'); ?>
    </span></h1>
  </div>
  <div class="u-info__past-result">
    <?php echo markdown_post_custom('past_result_text'); ?>
  </div>
  <div id="movie-player">
    <?php
    for ($i=1; $i<=3 ; $i++) {
      if(post_custom('movie_id_'.$i)){
        $item = [];
        $item['title'] = post_custom('movie_title_'.$i);
        $item['id'] = post_custom('movie_id_'.$i);
        $items[] = $item;
      }
    }
    $item = htmlspecialchars(json_encode($items));
    ?>
    <movie-list
    :items="<?php echo $item; ?>"
    ></movie-list>
  </div>
  <div class="u-info__past-result">
    <?php echo markdown_post_custom('past_result_bottom_text'); ?>
  </div>
</ul>
</section>

<?php get_footer(); ?>
