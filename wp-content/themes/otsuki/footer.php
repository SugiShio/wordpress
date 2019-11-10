<?php wp_footer(); ?>
</div>
<footer class="o-footer">
  <?php if(!is_home()) : ?>
  <ul class="o-footer__list">
    <?php foreach($GLOBALS['accounts'] as $account) : ?>
    <li class="o-footer__item">
      <a href="<?php echo $account['url']; ?>" target="_blank" class="o-footer__link">
        <div class="o-footer__icon">
          <img src="<?php echo get_template_directory_uri()."/assets/images/".$account['name'].".svg"; ?>" alt="">
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  <small class="o-footer__copyright">&copy; 2019 Bunta Otsuki</small>

</footer>
</body>

</html>
