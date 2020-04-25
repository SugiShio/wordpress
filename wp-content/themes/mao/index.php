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