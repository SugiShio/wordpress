<section class="m-works" key="works">
  <?php
    $posts = get_posts(array(
      'post_type' => 'works',
      'meta_key' => 'order',
      'order' => 'ASC',
      'orderby' => 'meta_value',
    ));
  ?>
  <ul>
    <?php
      foreach($posts as $post) :
      setup_postdata( $post );
      foreach($MEDIA as $item) {
        if(get_field($item)) {
          $media_item[$item] = get_field($item);
        }
      }
    ?>
    <li class="m-works__item">
      <?php if(get_field('image')) : ?>
      <div class="m-works__image">
        <img src="<?php echo get_field('image')?>" alt="">
      </div>
      <?php endif; ?>
      <h3 class="m-works__title"><?php echo get_the_title(); ?></h3>
      <span class="m-works__year"><?php echo post_custom('year'); ?></span>
      <div class="m-works__content"><?php the_content(); ?></div>
      <?php if($media_item) : ?>
      <ul class="m-works__media">
        <?php foreach($media_item as $key => $url) : ?>
        <li class="m-works__mediaitem">
          <a href="<?php echo $url; ?>" target="_blank">
            <i class="icon-<?php echo $key; ?>"></i>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </li>
    <?php
      wp_reset_postdata();
      $media_item = null;
      endforeach;
    ?>
  </ul>
</section>