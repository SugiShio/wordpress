<?php get_header(); ?>
<main class="o-main">
  <div class="o-title">
    <h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titles/works.svg" alt="works">
    </h2>
    <span class="o-title__sub">作品</span>
  </div>

  <?php
  $posts = get_posts(array(
    'post_type' => 'works',
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
