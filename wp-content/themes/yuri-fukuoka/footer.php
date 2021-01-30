<footer class="y-footer">
  <div class="y-footer__inner">
    <nav class="y-footer__menu">
      <div class="y-footer__row">
        <div class="y-footer__item">
          <span>Classes</span>
        </div>
        <div class="y-footer__item y-footer__item--indent">
          <div class="y-footer__item">
            <a class="y-footer__link" href="<?php echo get_post_type_archive_link( 'flamenco' ); ?>">Flamenco</a>
          </div>
          <div class="y-footer__item">
            <a class="y-footer__link" href="<?php echo get_post_type_archive_link( 'yoga' ); ?>">Yoga</a>
          </div>
        </div>
        <div class="y-footer__item">
          <a class="y-footer__link" href="<?php echo get_post_type_archive_link( 'access' ); ?>">Access</a>
        </div>
        <div class="y-footer__item">
          <a class="y-footer__link" href="<?php echo get_post_type_archive_link( 'live' ); ?>">Live</a>
        </div>
      </div>
      <div class="y-footer__row">
        <div class="y-footer__item">
          <a class="y-footer__link" href="<?php echo get_permalink(get_page_by_path( 'profile' )); ?>">Profile</a>
        </div>
        <div class="y-footer__item">
          <a class="y-footer__link" href="<?php echo get_post_type_archive_link( 'photo' ); ?>">Photo</a>
        </div>
      </div>
      <div class="y-footer__row">
        <div class="y-footer__item">
          <a class="y-footer__link" href="<?php echo get_permalink(get_page_by_path( 'contact' )); ?>">Contact</a>
        </div>
        <div class="y-footer__item">
          <a class="y-footer__link" href="<?php echo get_post_type_archive_link( 'qa' ); ?>">Q&A</a>
        </div>
      </div>
    </nav>

    <div class="y-footer__banners">
      <?php /*
      <a href="https://www.yogaroom.jp/" target="_blank">
        <img src="<?php echo get_template_directory_uri()."/assets/images/banner_yogaroom.gif"; ?>" alt="">
      </a>
      */?>
      <a href="http://www.jmya.jp/" target="_blank">
        <img src="<?php echo get_template_directory_uri()."/assets/images/banner_jmya.png"; ?>" alt="">
      </a>
    </div>
  </div>
  <small class="y-footer__copyright">©️ 2020 Flamenco studio Las gracias, yoga salon GRACIAGE</small>
</footer>

<?php wp_footer(); ?>
</body>

</html>