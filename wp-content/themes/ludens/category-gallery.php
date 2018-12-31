<?php get_header(); ?>

<section class="content-wrapper">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        GALLERY
      </h2>
      <span class="content-head__sub">ギャラリー</span>
    </div>
  </div>

  <?php if(have_posts()) : ?>
    <ul class="gallery-list">
      <?php while(have_posts()) : the_post(); ?>
        <li class="gallery-list__item">
          <a href="<?php the_permalink(); ?>" class="gallery-list__link">
            <div class="gallery-list__image">
              <?php if(has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full') ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/no_image.jpg" alt="">
              <?php endif; ?>
              </div>
            <h2 class="gallery-list__title"><?php the_title(); ?></h2>
          </a>
        </li>
      <?php endwhile ?>
    </ul>
  <?php endif; ?>

  <?php
  the_posts_pagination(array(
    'mid_size'           => 2,
    'prev_text'          => '←',
    'next_text'          => '→',
    'screen_reader_text' => ' ',
  ));
  ?>
</section>

<?php get_footer(); ?>
