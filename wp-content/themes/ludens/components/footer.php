<?php
$footer_groups = array(
  array(
    array(
      'name' => 'トップ',
    ),
    array(
      'name' => 'コンセプト',
      'slug' => 'concept'
    ),
    array(
      'name' => 'プラン',
      'slug' => 'plan'
    ),
    array(
      'name' => 'フェア',
      'url' => 'https://zexy.net/wedding/c_7770020837/'
    ),
    array(
      'name' => '施設',
      'slug' => 'facility'
    ),
    array(
      'name' => 'ギャラリー',
      'slug' => 'gallery'
    ),
    array(
      'name' => 'アクセス',
      'slug' => 'access'
    ),
    array(
      'name' => '料理',
      'slug' => 'cuisine'
    )
  ),
  array(
    array(
      'name' => '来店予約',
      'slug' => 'reserve-input'
    ),
    array(
      'name' => '資料請求',
      'slug' => 'request-input'
    ),
    array(
      'name' => 'お問い合わせ',
      'slug' => 'contact-input'
    )
  ),
  array(
    'name' => 'SNS',
    array(
      'name' => 'Facebook',
      'url' => 'https://www.facebook.com/lds.isesaki/'
    ),
    array(
      'name' => 'Instagram',
      'url' => 'https://www.instagram.com/ludens_isesaki_weddingvilla/'
    )
  )
);
?>

<footer class="footer">
  <ul class="footer__groups">
    <?php foreach ($footer_groups as $footer_group) : ?>
    <li class="footer__group">
      <?php if(array_key_exists('name', $footer_group)) : ?>
        <h2 class="footer__group-title"><?php echo $footer_group['name']; ?></h2>
      <?php endif; ?>
      <ul class="footer__links">
        <?php foreach ($footer_group as $footer_link) : ?>
        <?php
          if(!is_array($footer_link)) continue;
          $name = $footer_link['name'];
          if(array_key_exists('url', $footer_link)) {
            $url = $footer_link['url'];
            $target = '_blank';
          } else if(array_key_exists('slug', $footer_link)) {
            $slug = $footer_link['slug'];
            if(get_page_by_path($slug)) {
              $url = esc_url(get_permalink(get_page_by_path($slug)->ID));
            } else if(get_category_by_slug($slug)) {
              $url = esc_url(get_category_link(get_category_by_slug($slug)->cat_ID));
            } else {
              continue;
            }
            $target = '';
          } else {
            $url = '/';
            $target = '';
          }
         ?>
        <li class="footer__linkitem">
          <a href="<?php echo $url; ?>" class="footer__link" target="<?php echo $target ?>">
            <?php echo $name; ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </li>
    <?php endforeach; ?>
  </ul>

  <div class="footer__copyright">
    <small>
      Copyright ©︎ 2018 Ludens Isesaki All Rights Reserved.
    </small>
  </div>
</footer>
