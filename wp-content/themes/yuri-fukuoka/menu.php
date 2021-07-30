<nav id="js-menu" class="js-accordion">
  <div class="y-header__menuTrigger js-accordion_trigger">
    Menu
    <img src="<?php echo get_template_directory_uri()."/assets/images/hamburger.svg"; ?>" alt="">
  </div>
  <ul class="y-header__menu js-accordion_body js-menu_body">
    <li class="y-header__accordion js-accordion">
      <span class="y-header__item js-accordion_trigger">
        Classes
      </span>
      <ul class="y-header__accordionMenu js-accordion_body" style="display: none;">
        <li>
          <a class="y-header__accordionItem" href="<?php echo get_post_type_archive_link( 'flamenco' ); ?>">
            Flamenco
          </a>
        </li>
        <li>
          <a class="y-header__accordionItem" href="<?php echo get_post_type_archive_link( 'yoga' ); ?>">
            Yoga
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="y-header__link" href="<?php echo get_post_type_archive_link( 'access' ); ?>">Access</a>
    </li>
    <li>
      <a class="y-header__link" href="<?php echo get_post_type_archive_link( 'live' ); ?>">Live</a>
    </li>
    <li>
      <a class="y-header__link" href="<?php echo get_permalink(get_page_by_path( 'profile' )); ?>">Profile</a>
    </li>
    <li>
      <a class="y-header__link" href="<?php echo get_post_type_archive_link( 'photo' ); ?>">Photo</a>
    </li>
    <li>
      <a class="y-header__link" href="<?php echo get_permalink(get_page_by_path( 'contact' )); ?>">Contact</a>
    </li>
    <li>
      <a class="y-header__link" href="<?php echo get_post_type_archive_link( 'qa' ); ?>">Q&A</a>
    </li>
  </ul>
</nav>