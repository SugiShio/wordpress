<?php get_header(); ?>

<div class="main-view js-slick">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mainview_1.jpg" alt="エスポワールからルーデンスウェディングヴィラへ...大人のラグジュアリー空間へ生まれ変わります。">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mainview_2.jpg" alt="">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mainview_3.jpg" alt="">
</div>

<div class="top-content">
  <div class="top-content__top-box">
    <section class="pickup">
      <h2 class="pickup__title">PICK UP</h2>
      <ul class="pickup__list">
        <?php
          $posts = get_posts(array(
            'category_name' => 'pickup',
            'order_by' => 'post_date',
            'posts_per_page' => 3
          ));
         ?>
        <?php foreach( $posts as $post ) : ?>
          <?php setup_postdata( $post ); ?>
          <li class="pickupItem">
            <div class="pickupItem__image">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('full'); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.jpg" alt="">
              <?php endif; ?>
            </div>
            <div class="pickupItem__body">
              <h2 class="pickupItem__title"><?php the_title(); ?></h2>
              <div class="pickupItem__text"><?php the_content(); ?></div>
            </div>
          </li>
          <?php wp_reset_postdata(); ?>
        <?php endforeach; ?>
      </ul>
      <a href="https://zexy.net/wedding/c_7770020837/" class="pickup__link" target="_blank">
        全てのフェアを見る
      </a>
    </section>
    <div class="instagram">
      <!-- InstaWidget -->
      <!-- InstaWidget -->
      <?php if(is_mobile()) : ?>
        <a href="https://instawidget.net/v/user/ludens_isesaki_weddingvilla" id="link-60d61e34d5a3058fe9346881b0d3c1bf2f74aeb5f1bdebbd8bfd07a374f792fc">@ludens_isesaki_weddingvilla</a>
        <script src="https://instawidget.net/js/instawidget.js?u=60d61e34d5a3058fe9346881b0d3c1bf2f74aeb5f1bdebbd8bfd07a374f792fc&width=270px"></script>
      <?php else : ?>
        <a href="https://instawidget.net/v/user/ludens_isesaki_weddingvilla" id="link-2572492325313cb11064a0af7c5742d4a4247b3e0a41cdf4b1f2fdfbfcc2c49f">@ludens_isesaki_weddingvilla</a>
        <script src="https://instawidget.net/js/instawidget.js?u=2572492325313cb11064a0af7c5742d4a4247b3e0a41cdf4b1f2fdfbfcc2c49f&width=330px"></script>
      <?php endif; ?>
    </div>
  </div>

  <ul class="top-content__links">
    <li class="top-content__item">
      <a href="<?php echo get_permalink(get_page_by_path('concept')->ID); ?>" class="top-content__link">
        <span class="top-content__link-text">
          <span class="top-content__link-text-sub">コンセプト</span>
          <span class="top-content__link-text-main">CONCEPT</span>
        </span>
      </a>
    </li>
    <li class="top-content__item">
      <a href="<?php echo get_permalink(get_page_by_path('plan')->ID); ?>" class="top-content__link">
        <span class="top-content__link-text">
          <span class="top-content__link-text-sub">プラン</span>
          <span class="top-content__link-text-main">PLAN</span>
        </span>
      </a>
    </li>
    <li class="top-content__item">
      <a href="https://zexy.net/wedding/c_7770020837/" class="top-content__link" target="_blank">
        <span class="top-content__link-text">
          <span class="top-content__link-text-sub">フェア</span>
          <span class="top-content__link-text-main">FAIR</span>
        </span>
      </a>
    </li>
    <li class="top-content__item">
      <a href="<?php echo get_permalink(get_page_by_path('facility')->ID); ?>" class="top-content__link">
        <span class="top-content__link-text">
          <span class="top-content__link-text-sub">施設</span>
          <span class="top-content__link-text-main">FACILITY</span>
        </span>
      </a>
    </li>
    <li class="top-content__item">
      <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
        <span class="top-content__link-text">
          <span class="top-content__link-text-sub">ギャラリー</span>
          <span class="top-content__link-text-main">GALLERY</span>
        </span>
      </a>
    </li>
    <li class="top-content__item">
      <a href="<?php echo get_permalink(get_page_by_path('access')->ID); ?>" class="top-content__link">
        <span class="top-content__link-text">
          <span class="top-content__link-text-sub">アクセス</span>
          <span class="top-content__link-text-main">ACCESS</span>
        </span>
      </a>
    </li>
  </ul>
</div>
<?php get_footer(); ?>
