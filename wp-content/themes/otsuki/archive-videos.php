<?php get_header(); ?>
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

<?php get_footer(); ?>