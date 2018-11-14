<?php get_header(); ?>
<main class="w-main js-main">
  <div class="w-columnswrapper">
    <div class="w-maincolumn">
      <section class="w-content">
        <h2 class="w-content__title"><?php echo $GLOBALS["wordset"]["title"]["schedule"]; ?></h2>
        <?php if (have_posts()) : ?>
        <ul class="w-schedulelist">
          <?php while (have_posts()) : the_post(); ?>
          <li class="w-schedulelist__item">
            <article class="w-schedule">
              <time class="w-schedule__date"><?php echo get_post_time('Y.n.j D'); ?></time>
              <h3 class="w-schedule__title"><?php the_title(); ?></h3>
              <div class="w-schedule__body"><?php the_content(); ?></div>
            </article>

          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </section>
    </div>
    <?php get_template_part('module', 'sidecolumn'); ?>
  </div>
</main>
<?php get_footer(); ?>
