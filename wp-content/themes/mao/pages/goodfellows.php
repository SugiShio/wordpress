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
      $medias = set_medias( $post );
      setup_postdata( $post );
      $title = get_field('subtitle');
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
      <?php if($medias) : ?>
      <ul class="m-goodFellows__sns">
        <?php foreach($medias as $item) : ?>
        <li class="m-goodFellows__snsItem">
          <a href="<?php echo $item['url']; ?>" class="m-goodFellows__snsLink" target='_blank'>
            <i class="m-goodFellows__icon icon-<?php echo $item['name']; ?>"></i>
            <span class="m-goodFellows__label">
              <?php echo $item['label']; ?>
            </span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </li>
    <?php
      $medias = null;
      wp_reset_postdata();
      endforeach;
    ?>
  </ul>
</section>
