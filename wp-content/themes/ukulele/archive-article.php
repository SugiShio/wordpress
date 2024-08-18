<?php get_header(); ?>

<?php
$args = array(
  'post_type' => 'article',
  'orderby' => 'date',
  'posts_per_page' => 10,
);
$cat_query = $_GET['cat'];
if($cat_query) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'category',
      'field' => 'slug',
      'terms' => $cat_query
    )
  );
}

$posts = get_posts($args);
$the_query = new WP_Query( $args );
?>
<section class="section u-article">
  <div class="u-article__container">
    <?php if($the_query->have_posts()) : ?>
    <ul class="u-articlelist">
      <?php
      while($the_query->have_posts()) :
      $the_query->the_post();
      include 'articleitem.php';
      endwhile;
      ?>
    </ul>
    <?php else : ?>
    記事がありません。
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>