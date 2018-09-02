<?php get_header(); ?>

<div class="wrapper">
  <?php get_template_part('components/header'); ?>
  <?php get_template_part('components/menu'); ?>

  <main>
    <div class="main-view">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mainview.jpg" alt="Espoir LumineuxからLUDENS WEDDING VILLAへ...大人のラグジュアリー空間へ生まれ変わります。">
    </div>

    <div class="top-content">
      <div class="top-content__top-box">
        <section class="pickup">
          <ul class="pickup__list">
            <li class="pickupItem">
              <div class="pickupItem__image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fair.jpg" alt="">
              </div>
              <div class="pickupItem__body">
                <h2 class="pickupItem__title">【サンプルフェア】テキストテキストテキスト♪</h2>
                <p class="pickupItem__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
              </div>
            </li>
            <li class="pickupItem">
              <div class="pickupItem__image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fair.jpg" alt="">
              </div>
              <div class="pickupItem__body">
                <h2 class="pickupItem__title">【サンプルフェア】テキストテキストテキスト♪</h2>
                <p class="pickupItem__text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
              </div>
            </li>
          </ul>
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="pickup__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/show-all-fair.svg" alt="全てのフェアを見る">
          </a>
        </section>
        <div class="top-content__top-links">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__top-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/staff-blog.jpg" alt="スタッフブログ">
          </a>
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__top-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/event-calender.jpg" alt="イベントカレンダー">
          </a>
        </div>
      </div>

      <ul class="top-content__links">
        <li class="top-content__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/concept.jpg" alt="コンセプト">
          </a>
        </li>
        <li class="top-content__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan.jpg" alt="プラン">
          </a>
        </li>
        <li class="top-content__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fair.jpg" alt="フェア">
          </a>
        </li>
        <li class="top-content__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility.jpg" alt="施設">
          </a>
        </li>
        <li class="top-content__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery.jpg" alt="ギャラリー">
          </a>
        </li>
        <li class="top-content__item">
          <a href="<?php echo get_permalink(get_page_by_path('coming-soon')->ID); ?>" class="top-content__link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/access.jpg" alt="アクセス">
          </a>
        </li>
      </ul>
    </div>
  </main>

  <?php get_template_part('components/footer'); ?>
</div>
<?php get_footer(); ?>
