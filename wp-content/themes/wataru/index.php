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
      <?php
        $posts = get_posts(array(
          'category_name' => 'news',
          'order_by' => 'post_date',
          'order' => 'desc',
          'posts_per_page' => 1
        ));
        if(!empty($posts)) :
      ?>
      <?php
        $post = array_shift($posts);
        setup_postdata( $post );
       ?>
      <a href="<?php echo esc_url(get_category_link(get_category_by_slug( 'news' )->cat_ID)); ?>" class="w-topnews__link">
        <h2 class="w-topnews__head">News</h2>
        <time class="w-topnews__date" datetime="<?php echo get_the_date(DATE_W3C); ?>"><?php echo date('Y.n.j', strtotime($post->post_date)); ?></time>
        <p class="w-topnews__title"><?php the_title(); ?></p>
      </a>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
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
            $dt = new DateTime('', new DateTimeZone('Asia/Tokyo'));
            $today = $dt->format('Y').$dt->format('m').$dt->format('d');
            $posts = get_posts(array(
              'category_name' => 'schedule',
              'order_by' => 'meta_value',
              'order' => 'asc',
              'posts_per_page' => 5,
              'meta_key' => 'date',
              'meta_value' => $today,
              'meta_compare' => '>=',
              'meta_type' => 'NUMERIC'
            ));
           ?>
          <?php foreach( $posts as $post ) : ?>
            <?php
              setup_postdata( $post );
              $date_int = (int)post_custom('date');
              $year = floor($date_int / 10000);
              $month = floor($date_int % 10000 / 100);
              $day = $date_int % 100;

              $date_dt = new DateTime( $year.'-'.$month.'-'.$day );
             ?>
            <li class="w-topschedule__item">
              <a href="<?php echo esc_url(get_permalink()); ?>" class="w-topschedule__link">
                <time class="w-topschedule__date" datetime="<?php echo $date_dt->format(DateTime::W3C); ?>"><?php echo $date_dt->format('Y.n.j D'); ?></time>
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
        <div class="w-topblock__container w-topblock__container--instagram">
        <!-- InstaWidget -->
        <?php if(is_mobile()) : ?>
          <script src="https://instawidget.net/js/instawidget.js?u=ca514452e3f42ce72e1e0ddb2ce179edda543e136fe88d4b1835be6b0a977dc8&width=300px"></script>
        <?php else : ?>
          <script src="https://instawidget.net/js/instawidget.js?u=9a7956f6751678ff7749c5d4f4067a61064055f2e0d40aa87826d1b335e4e179&width=640px"></script>
        <?php endif; ?>
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
