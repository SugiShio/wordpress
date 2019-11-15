<header id="js-header" class="o-header">
  <nav class="o-nav">
    <ul class="o-nav__list">
      <?php if(!is_home()) : ?>
      <li class="o-nav__item">
        <a href="<?php echo get_site_url() ?>"><i class="icon-title"></i></a>
      </li>
      <?php endif; ?>

      <li class="o-nav__item">
        <a href="<?php echo get_permalink(get_page_by_path('biography')) ?>">Biography</a>
      </li>

      <li class="o-nav__item">
        <a href="<?php echo get_post_type_archive_link('schedule') ?>">Schedule</a>
      </li>

      <li class="o-nav__item">
        <a href="<?php echo get_post_type_archive_link('works') ?>">Works</a>
      </li>

      <li class="o-nav__item">
        <a href="<?php echo get_post_type_archive_link('videos') ?>">Videos</a>
      </li>

      <li class="o-nav__item">
        <a href="<?php echo get_permalink(get_page_by_path('contact')) ?>">Contact</a>
      </li>

      <li class="o-nav__item">
        <span>Mongoloid Union</span>
        <?php /*
        <a href="https://mongoloid-union.jp">Mongoloid Union</a>
        */ ?>
      </li>
    </ul>
  </nav>
</header>