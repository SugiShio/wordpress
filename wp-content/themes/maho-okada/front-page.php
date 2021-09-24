<?php get_header(); ?>
<div class="mo-front">
  <div class="mo-front__mainview">
    <img src="<?php echo get_template_directory_uri() . "/assets/images/front/mainview.jpg"; ?>" alt="">

    <img src="" alt="">
  </div>
  <h1 class="mo-front__title">
    <span class="mo-front__title-main">Maho Okada</span>
    <span class="mo-front__title-sub">Official Website</span>
  </h1>

  <section class="mo-front-parallax mo-front-parallax--1">
    <maho-parallax-item class="mo-front-parallax__item mo-front-parallax__item--1">
      <img src="<?php echo get_template_directory_uri() . "/assets/images/front/image_1.png"; ?>" alt="">
    </maho-parallax-item>

    <maho-parallax-item :parallax-rate='0.1' class="mo-front-parallax__item mo-front-parallax__item--2">
    </maho-parallax-item>
    <maho-parallax-item :parallax-rate='0.09' class="mo-front-parallax__item mo-front-parallax__item--3">
      <img src="<?php echo get_template_directory_uri() . "/assets/images/front/image_2.png"; ?>" alt="">
    </maho-parallax-item>
  </section>

  <?php /* Upcoming show */ ?>

  <section class="mo-front-show">
    <?php
    $posts = get_posts(array(
      'post_type' => 'schedule',
      'meta_key' => 'date',
      'order' => 'ASC',
      'orderby' => 'meta_value',
      'meta_value' => date('Ymd'),
      'meta_compare' => '>=',
    ));
    ?>
    <h2 class="mo-front-show__title">Upcoming show</h2>
    <?php if (empty($posts)) : ?>
    <div class="mo-front-show__item">
      予定されているスケジュールはありません
    </div>

    <?php
    else :
      $post = $posts[0];
      setup_postdata($post);
      $date = get_field('date');
      $place = get_field('place');
    ?>
    <div class="mo-front-show__item">
      <time class="mo-front-show__date" datetime="<?php echo $date; ?>">
        <?php echo date("Y.m.d D", strtotime($date)); ?>
      </time>
      <div class="mo-front-show__itemtitle">
        <?php echo get_the_title(); ?>
        <?php if ($place) : ?>
        &nbsp;@<?php echo $place; ?>
        <?php endif; ?>
      </div>
    </div>
    <?php wp_reset_postdata(); ?>

    <p>
      <a href="<?php echo get_post_type_archive_link('schedule'); ?>" class="mo-front-show__morelink">
        More show
      </a>
    </p>
    <?php endif; ?>
  </section>

  <section class="mo-front-parallax mo-front-parallax--2">
    <maho-parallax-item :parallax-rate='0.08' class="mo-front-parallax__item mo-front-parallax__item--4">
      <img src="<?php echo get_template_directory_uri() . "/assets/images/front/image_3.png"; ?>" alt="">
    </maho-parallax-item>

    <maho-parallax-item :parallax-rate='0.02' class="mo-front-parallax__item mo-front-parallax__item--5">
    </maho-parallax-item>
  </section>

  <nav class="mo-front-menu">
    <ul class="mo-front-menu__list">
      <li class="mo-front-menu__item">
        <a class="mo-front-menu__link" href="<?php echo get_permalink(get_page_by_path('biography')); ?>">Biography</a>
      </li>
      <li class="mo-front-menu__item">
        <a class="mo-front-menu__link" href="<?php echo get_post_type_archive_link('works'); ?>">Works</a>
      </li>
      <li class="mo-front-menu__item">
        <a class="mo-front-menu__link" href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact</a>
      </li>
    </ul>
  </nav>
</div>
<?php get_footer(); ?>