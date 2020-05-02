<section class="m-goodFellows" key="goodFellows">
  <?php
    $posts = get_posts(array(
      'post_type' => 'goodfellows',
      'meta_key' => 'order',
      'order' => 'ASC',
      'orderby' => 'meta_value',
    ));
  ?>
  <ul>
    <?php
      foreach($posts as $post) :
      setup_postdata( $post );
      $title = get_field('subtitle');
      foreach($SNS as $item) {
        $media_name = $item['media'];
        $account_id = get_field($media_name);
        if($account_id) {
          $sns_item[$media_name] = [
            'account_id' => $account_id,
            'url' => str_replace('##ID##', $account_id, $item['url_base'])
          ];
        }
      }
    ?>
    <li class="m-goodFellows__item">
      <div class="m-goodFellows__head">
        <h3 class="m-goodFellows__name"><?php echo get_the_title(); ?></h3>
        <?php if($title) : ?>
        <span class="m-goodFellows__title"><?php echo $title; ?></span>
        <?php endif; ?>
      </div>
      <?php if(get_the_content()) : ?>
      <div class="m-goodFellows__content"><?php the_content(); ?></div>
      <?php endif; ?>
      <?php if($sns_item) : ?>
      <ul class="m-goodFellows__sns">
        <?php foreach($sns_item as $media_name => $item) : ?>
        <li class="m-goodFellows__snsItem">
          <a href="<?php echo $item['url']; ?>" class="m-goodFellows__snsLink" target='_blank'>
            <i class="m-goodFellows__icon icon-<?php echo $media_name; ?>"></i>
            <span class="m-goodFellows__label">
              <?php echo $item['account_id']; ?>
            </span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </li>
    <?php
      $sns_item = null;
      wp_reset_postdata();
      endforeach;
    ?>
  </ul>
</section>
