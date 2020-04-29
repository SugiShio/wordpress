<?php get_header(); ?>
<?php
  $MEDIA = ['spotify', 'applemusic'];
  $SNS = [
    ['media' => 'instagram', 'url_base' => 'https://www.instagram.com/##ID##' ],
    ['media' => 'twitter', 'url_base' => 'https://twitter.com/##ID##' ],
    ['media' => 'facebook', 'url_base' => 'https://www.facebook.com/##ID##' ],
    ['media' => 'youtube', 'url_base' => 'https://www.youtube.com/user/##ID##' ],
    ['media' => 'web', 'url_base' => '##ID##' ]
  ];
?>
<div id="app" class="m-wrapper">
  <component :is='layout'>
    <router-view></router-view>

    <template #about-mao>
      <?php
        $post = get_page_by_path('about-mao');
        setup_postdata( $post );
      ?>
      <div class="m-about">
        <div class="m-about__image">
          <img src="<?php echo get_field('image')?>" alt="">
        </div>
        <h3 class="m-about__name">
          <?php echo post_custom('name'); ?>
        </h3>
        <span class="m-about__title"><?php echo post_custom('title'); ?></span>
        <div class="m-about__content"><?php the_content(); ?></div>
      </div>
      <?php wp_reset_postdata(); ?>
    </template>

    <template #works>
      <?php
        $posts = get_posts(array(
          'post_type' => 'works',
          'meta_key' => 'order',
          'order' => 'ASC',
          'orderby' => 'meta_value',
        ));
      ?>
      <ul class="m-works">
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
    </template>

    <template #schedule>
      <?php
        $posts = get_posts(array(
          'post_type' => 'schedule',
          'meta_key' => 'date',
          'order' => 'ASC',
          'orderby' => 'meta_value',
          'meta_value' => date('Ymd'),
          'meta_compare' => '>=',
        ));
      ?>
      <?php if (empty($posts)) : ?>
      no schedules
      <?php
        else :
        foreach($posts as $post) :
        setup_postdata( $post );
        $date = get_field('date');
        $place = get_field('place');
      ?>

      <ul class="m-schedule">
        <li class="m-schedule__item">
          <time class="m-schedule__date" datetime="<?php echo $date; ?>">
            <?php echo date("Y.m.d D", strtotime($date));?>
          </time>
          <h3 class="m-schedule__title"><?php echo get_the_title(); ?></h3>
          <?php if($place) : ?>
          <a href="<?php echo get_field('place_url');?>" class="m-schedule__place">@ <?php echo $place; ?></a>
          <?php endif; ?>
          <div class="m-schedule__content"> <?php the_content(); ?> </div>

        </li>
      </ul>
      <?php
        wp_reset_postdata();
        endforeach;
        endif;
      ?>
    </template>

    <template #good-fellows>
      <?php
        $posts = get_posts(array(
          'post_type' => 'good-fellows',
          'meta_key' => 'order',
          'order' => 'ASC',
          'orderby' => 'meta_value',
        ));
      ?>
      <ul class="m-goodFellows">
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
    </template>

    <template #contact>
      <?php
        $post = get_page_by_path('contact');
        setup_postdata( $post );
        the_content();
      ?>
      <?php wp_reset_postdata(); ?>
    </template>
  </component>
</div>
<?php get_footer(); ?>