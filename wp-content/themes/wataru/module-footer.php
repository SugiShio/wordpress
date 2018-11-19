<footer class="w-footer">
  <ul class="w-footer__sns">
    <li class="w-footer__snsitem">
      <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')->ID)); ?>">
        <i class="w-footer__snsicon icon-mail"></i>
      </a>
    </li>
    <?php foreach($GLOBALS['sns'] as $key => $value) : ?>
    <li class="w-footer__snsitem">
      <a href="<?php echo $value['url'] ?>" class="w-footer__snslink" target='_blank'>
        <i class="w-footer__snsicon icon-<?php echo $key ?>"></i>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <small class="w-footer__copyright">©︎2018 Wataru Tanaka</small>
</footer>
