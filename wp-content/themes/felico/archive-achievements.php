<?php get_header(); ?>

<?php
$post = get_page_by_path('profile'); //事業概要
setup_postdata( $post );
 ?>
<section class="f-content"><?php the_content(); ?></section>
<?php wp_reset_postdata(); ?>

<?php if ( have_posts() ) : ?>
  <section class="f-content">
    <h2><?php post_type_archive_title(); ?></h2>
    <ul class="f-archive">
      <?php while ( have_posts() ) : the_post(); ?>
        <li class="f-archive__item">
          <a href="<?php echo esc_url(get_the_permalink()); ?>" class="f-archive__a">
            <div class="f-archive__image">
              <?php if(has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail'); ?>
              <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/no-image.jpg" alt="">
              <?php endif; ?>
            </div>
            <time class="f-archive__date"><?php echo get_post_time('Y年n月j日'); ?></time>
            <div class="f-archive__title"><?php the_title(); ?></div>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>

  <section class="f-pagination">
    <?php
      the_posts_pagination(array(
        'mid_size'           => 2,
        'prev_text'          => '←',
        'next_text'          => '→',
        'screen_reader_text' => ' ',
      ));
    ?>
  </section>
<?php endif; ?>
<?php get_footer(); ?>
