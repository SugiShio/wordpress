<?php get_header(); ?>

<ul class="f-breadcrumb">
  <li class="f-breadcrumb__item">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Top</a>
  </li>
  <li class="f-breadcrumb__item">
    <a href="<?php echo esc_url( get_post_type_archive_link( get_post_type() ) ); ?>">
      <?php echo get_post_type_object(get_post_type())->label; ?>一覧
    </a>
  </li>
  <li class="f-breadcrumb__item"><?php the_title(); ?></li>
</ul>

<section class="f-single">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="f-single__head">

      <h3 class="f-single__title"><?php the_title(); ?></h3>
      <time class="f-single__date"><?php echo get_post_time('Y年n月j日'); ?></time>
    </div>
    <div class="f-single__content"><?php the_content(); ?></div>
  <?php endwhile; ?>
</section>

<section class="f-navigation">
  <?php the_post_navigation(); ?>
</section>
<?php get_footer(); ?>
