<?php get_header(); ?>
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
          <ul class="m-goodFellows__sns">
            <li class="m-goodFellows__snsItem">
              <a href="" class="m-sns" target='_blank'>
                <i class="m-sns__icon icon-twitter"></i>
                <span class="m-sns__label">hoge</span>
              </a>
            </li>
          </ul>
        </li>
        <?php
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