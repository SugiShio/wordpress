<?php get_header(); ?>

<ul class="f-breadcrumb">
  <li class="f-breadcrumb__item">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Top</a>
  </li>
  <li class="f-breadcrumb__item"><?php the_title(); ?></li>
</ul>

<?php while ( have_posts() ) : the_post(); ?>
<section class="f-content"><?php the_content(); ?></section>
<?php endwhile; ?>
<?php get_footer(); ?>
