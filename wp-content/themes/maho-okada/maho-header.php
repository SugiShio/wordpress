<maho-header>
  <nav class="mo-menu">
    <ul class="mo-menu__list">
      <li>
        <a class="mo-menu__link" href="<?php echo get_site_url() ?>">Top</a>
      </li>

      <li>
        <a class="mo-menu__link" href="<?php echo get_permalink(get_page_by_path('biography')); ?>">Biography</a>
      </li>

      <li>
        <a class="mo-menu__link" href="<?php echo get_post_type_archive_link('schedule'); ?>">Schedule</a>
      </li>

      <li>
        <a class="mo-menu__link" href="<?php echo get_post_type_archive_link('works'); ?>">Works</a>
      </li>

      <li>
        <a class="mo-menu__link" href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact</a>
      </li>
    </ul>
  </nav>
</maho-header>