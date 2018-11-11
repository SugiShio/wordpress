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
        <ul class="w-schedule">
          <li class="w-schedule__item">
            <a href="" class="w-schedule__link">
              <time class="w-schedule__date">2018.9.1 Sat</time>
              <p class="w-schedule__text">T-SQUARE ChilpoJazz 韓国・浦項(Pohang)</p>
            </a>
          </li>
          <li class="w-schedule__item">
            <a href="" class="w-schedule__link">
              <time class="w-schedule__date">2018.9.1 Sat</time>
              <p class="w-schedule__text">T-SQUARE ChilpoJazz 韓国・浦項(Pohang)</p>
            </a>
          </li>
          <li class="w-schedule__item">
            <a href="" class="w-schedule__link">
              <time class="w-schedule__date">2018.9.1 Sat</time>
              <p class="w-schedule__text">T-SQUARE ChilpoJazz 韓国・浦項(Pohang)</p>
            </a>
          </li>
        </ul>
        <a href="" class="w-button">More</a>
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
