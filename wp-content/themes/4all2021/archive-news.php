<?php get_header(); ?>

<?php
$posts = get_posts(array(
  'post_type' => 'news',
  'orderby' => 'date',
  'posts_per_page' => 10,
));
?>
<section class="section u-archive">
  <?php while (have_posts()) { the_post(); ?>
    <ul class="u-archive__container">
      <li class="u-archive__item">
        <a class="u-archive__link" <?php if($post->post_content) { echo 'href="'.get_the_permalink().'"';}; ?>>
          <time datetime="<?php echo get_the_date(DATE_W3C); ?>" class="u-archive__date"><?php echo get_the_date(); ?></time>
          <h2 class="u-archive__title"><?php the_title(); ?></h2>
        </a>
      </li>
    </ul>
  <?php }; ?>
</section>

<?php get_footer(); ?>
