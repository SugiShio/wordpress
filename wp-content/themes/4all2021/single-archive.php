<?php get_header(); ?>

<section class="section u-single">
  <article class="u-single__container">
    <?php the_content(); ?>
  </article>
</section>

<?php
$archive_year = post_custom('archive_year');
$parent_id = get_term_by('slug', 'dep-'.$archive_year, 'department')->term_id;
$deps = get_categories(array(
  'child_of' => $parent_id,
  'taxonomy' => 'department',
  'hide_empty' => 0,
  'orderby' => 'slug'
));
foreach ($deps as $index => $dep) :
$posts = get_posts(array(
  'post_type' => 'winner',
  'orderby' => 'meta_value_num',
  'meta_key' => 'order',
  'order' => 'ASC',
  'tax_query' => array(
    array(
      'taxonomy' => 'department',
      'terms' => $dep->term_id
    )
  )
));
if (count($posts)):
?>
<section class="section u-winners-archive">
  <div class="section__head">
    <h1 class="section__head-main"><span>
        <?php echo $dep->name; ?>部門
      </span>
    </h1>
  </div>

  <ul class="u-winners-archive__list">
    <?php
    foreach ($posts as $post) :
      setup_postdata( $post );
      $post_id = post_custom('post_id');
    ?>
    <li class="u-winners-archive__listitem">
      <h3 class="u-winners-archive__award-title"><span><?php echo get_the_title(); ?></span></h3>
      <div class="u-winners-archive__winner-name"><?php echo get_post_meta($post_id, 'name', true) ?><span
          class="u-winners-archive__san">さん</span></div>
      <div class="u-winners-archive__work-title-label">作品名</div>
      <div class="u-winners-archive__work-title"><?php echo get_the_title($post_id); ?></div>
      <?php
        $youtube_id = get_post_meta($post_id, 'id', true);
        $photo_url = get_post_meta($post_id, 'url', true);
        if($youtube_id) {
          $url = 'https://www.youtube.com/watch?v='.$youtube_id;
        } else if ($photo_url) {
          $url = $photo_url;
        }
      ?>
      <a href="<?php echo $url; ?>" target="_blank" class="u-winners-archive__link">作品ページへ</a>
    </li>
    <?php
      wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</section>

<?php
endif;
endforeach;
?>

<?php get_footer(); ?>