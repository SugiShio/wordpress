<?php get_header(); ?>
<div class="w-mainview">
  <div class="w-mainview__container">
    <h1 class="w-mainview__title">
      <span class="w-mainview__title-en"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/wataru.svg" alt="Wataru"></span>
      <span class="w-mainview__title-en"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/tanaka.svg" alt="Tanaka"></span>
      <span class="w-mainview__title-ja"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/田中航.svg" alt="田中航"></span>
    </h1>
    <p class="w-mainview__subtitle"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/index/official-website.svg" alt="Official Website"></p>
    <section class="w-topnews">
      <a href="#" class="w-topnews__link">
        <h2 class="w-topnews__head">News</h2>
        <time class="w-topnews__date">2018.9.1</time>
        <p class="w-topnews__title">スケジュールを更新しました</p>
      </a>
    </section>
  </div>
</div>

<main class="w-main js-main">
  <div class="w-columnswrapper">
    <div class="w-maincolumn">
      <section class="w-topblock w-topblock--schedule">
        <h2 class="w-topblock__title w-topblock__title--schedule">Schedule</h2>
        <ul class="w-topschedule">
          <?php
            $posts = get_posts(array(
              'category_name' => 'schedule',
              'order_by' => 'post_date',
              'order' => 'asc',
              'posts_per_page' => 5
            ));
           ?>
          <?php foreach( $posts as $post ) : ?>
            <?php setup_postdata( $post ); ?>
            <li class="w-topschedule__item">
              <a href="" class="w-topschedule__link">
                <time class="w-topschedule__date" datetime="<?php echo get_the_date(DATE_W3C); ?>"><?php echo date('Y.n.j D', strtotime($post->post_date)); ?></time>
                <p class="w-topschedule__text"><?php the_title() ?></p>
              </a>
            </li>
            <?php wp_reset_postdata(); ?>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('schedule')->cat_ID)); ?>" class="w-button">More</a>
      </section>

      <section class="w-topblock">
        <h2 class="w-topblock__title">Instagram</h2>
        <div class="w-topblock__container">
          <!-- InstaWidget -->
          <script src="https://instawidget.net/js/instawidget.js?u=9a7956f6751678ff7749c5d4f4067a61064055f2e0d40aa87826d1b335e4e179&width=640px"></script>
        </div>
        <a href="https://www.instagram.com/watarutanaka_drums/" class="w-button" target="_blank">More</a>
      </section>

      <section class="w-topblock">
        <h2 class="w-topblock__title">Movies</h2>
        <div class="w-topblock__container">
        </div>
      </section>
    </div>
    <?php get_template_part('module', 'sidecolumn'); ?>
  </div>
</main>
<?php get_footer(); ?>
