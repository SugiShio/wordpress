<?php
$sns = array('youtube', 'twitter', 'instagram', 'facebook');
$url_base = array(
  'youtube' => "https://www.youtube.com/user/ACCOUNT_ID",
  'twitter' => "https://twitter.com/ACCOUNT_ID",
  'instagram' => "https://www.instagram.com/ACCOUNT_ID",
  'facebook' => "https://www.facebook.com/ACCOUNT_ID",
);
$post = get_post(get_page_by_path('config'));
setup_postdata($post);
foreach ($sns as $item) {
  if (get_field($item)) {
    $accounts[] = array(
      "name" => $item,
      "id" => get_field($item),
      "url" => str_replace("ACCOUNT_ID", get_field($item), $url_base[$item])
    );
  }
};
wp_reset_postdata();
?>



<footer class="mo-footer">
  <nav class="mo-footer-sns">
    <ul class="mo-footer-sns__list">
      <?php foreach ($accounts as $account) : ?>
      <li class="mo-footer-sns__item">
        <a href="<?php echo $account['url']; ?>" target="_blank" class="mo-footer-sns__link">
          <i class="icon-<?php echo $account['name']; ?>"></i>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <small class="mo-footer__copyright">&copy; 2021 Maho Okada</small>
</footer>
<?php wp_footer(); ?>
</body>

</html>