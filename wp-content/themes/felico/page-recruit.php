<?php get_header(); ?>
<section class="f-content">
<?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
</section>

<section>
  <?php
  $posts = get_posts(array(
    'post_type' => 'staff',
    'posts_per_page' => 10
  ));
  ?>
  <?php while (have_posts()) : the_post(); ?>
    <ul>
      <?php foreach ($posts as $post) : ?>
        <?php setup_postdata( $post ); ?>
          <li class="f-voice">
            <div class="f-voice__image">
              <?php if(get_field('image')) : ?>
                <img src="<?php echo get_field('image'); ?>" alt="<?php the_title(); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/noimg-person.png" alt="">
              <?php endif; ?>
            </div>

            <div class="f-voice__jobtype"><?php echo get_field('job_type'); ?></div>
            <div class="f-voice__name"><?php the_title(); ?></div>
            <div class="f-voice__voice"><?php the_content(); ?></div>
          </li>
        <?php wp_reset_postdata(); ?>
      <?php endforeach; ?>
    </ul>
  <?php endwhile; ?>
</section>
<?php get_footer(); ?>
