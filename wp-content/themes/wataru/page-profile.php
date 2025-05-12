<?php get_header(); ?>
<main class="w-main js-main">
  <div class="w-singlecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="w-content w-profile">
        <div class="w-profile__title">
          <h2 class="w-content__title"><?php the_title(); ?></h2>
        </div>
        <div class="w-profile__container">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="w-profile__image">
              <?php the_post_thumbnail('full'); ?>
            </div>
          <?php endif; ?>
          <div class="w-profile__text">
            <h3 class="w-profile__name">
              田中 航 /
              <span class="w-profile__name-en">Wataru Tanaka</span>
            </h3>
            <?php the_content(); ?>
            <ul class="w-profile__sns">
              <?php foreach($GLOBALS['sns'] as $key => $value) : ?>
              <li class="w-profile__snsitem">
                <a href="<?php echo $value['url'] ?>" class="w-profile__snslink" target='_blank'>
                  <i class="w-profile__snsicon icon-<?php echo $key ?>"></i>
                  <?php echo $value['account']; ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </section>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
