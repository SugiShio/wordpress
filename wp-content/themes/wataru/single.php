<?php get_header(); ?>
<main class="w-main js-main">
  <div class="w-columnswrapper">
    <div class="w-maincolumn">
      <section class="w-content">
        <?php if (have_posts()) : ?>
        <ul class="w-category-list">
          <?php while (have_posts()) : the_post(); ?>
          <li class="w-category-list__item">
            <article class="w-category">
              <time class="w-category__date"><?php echo get_post_time('Y.n.j D'); ?></time>
              <h3 class="w-category__title"><?php the_title(); ?></h3>
              <div class="w-category__body"><?php the_content(); ?></div>
            </article>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </section>
      <a href="#" onclick="javascript:window.history.back(-1);return false;" class="w-category__back">← 戻る</a>
    </div>
    <?php get_template_part('module', 'sidecolumn'); ?>
  </div>
</main>
<?php get_footer(); ?>
