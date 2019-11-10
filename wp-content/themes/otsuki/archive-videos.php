<?php get_header(); ?>
<main class="o-main">
  <div class="o-title">
    <h2>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titles/videos.svg" alt="videos">
    </h2>
    <span class="o-title__sub">動画</span>
  </div>

  <?php
  $posts = get_posts(array(
    'post_type' => 'videos',
    'order' => 'ASC'
  ));
  ?>
  <ul>
    <?php foreach($posts as $post) : ?>
    <li>
      <?php setup_postdata( $post ); ?>
      <h3><?php echo get_the_title(); ?></h3>
      <div>
        <img src="http://img.youtube.com/vi/<?php echo post_custom('video_id'); ?>/maxresdefault.jpg" alt="">
      </div>
      <?php wp_reset_postdata(); ?>
    </li>
    <?php endforeach; ?>
  </ul>
</main>

<?php get_footer(); ?>
