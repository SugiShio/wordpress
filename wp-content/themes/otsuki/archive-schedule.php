<?php get_header(); ?>
<main class="o-main">
  <div class="o-title">
    <h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titles/schedule.svg" alt="schedule">
    </h2>
    <span class="o-title__sub">スケジュール</span>
  </div>

  <?php
  $posts = get_posts(array(
    'post_type' => 'schedule',
    'order' => 'ASC'
  ));
  ?>
  <ul>
    <?php foreach($posts as $post) : ?>
    <li>
      <?php setup_postdata( $post ); ?>
      <?php echo get_the_title(); ?>
      <?php wp_reset_postdata(); ?>
    </li>
    <?php endforeach; ?>
  </ul>
</main>

<?php get_footer(); ?>
