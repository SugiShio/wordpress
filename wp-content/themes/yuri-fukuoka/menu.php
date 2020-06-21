<div class="y-header" id="js-menu">
  <div class="y-header__upperInner">
    <a class="y-header__siteTitle" href="/">
      <img src="<?php echo get_template_directory_uri()."/assets/images/header.png"; ?>" alt="">
    </a>
  </div>
  <div class="h-header__bottomInner">
    <nav>
      <ul class="y-header__menu">
        <li class="y-header__accordion js-menu_accordion">
          <span class="y-header__item" @click='toggleIsOpen'>
            Classes
          </span>
          <transition name='fade'>
            <ul class="y-header__accordionMenu" v-show="isOpen">
              <li>
                <a class="y-header__accordionItem"
                  href="<?php echo get_post_type_archive_link( 'lesson' ); ?>">Flamenco</a>
              </li>
              <li>
                <a class="y-header__accordionItem" href="<?php echo get_post_type_archive_link( 'lesson' ); ?>">Yoga</a>
              </li>
            </ul>
          </transition>
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
  </div>
</div>