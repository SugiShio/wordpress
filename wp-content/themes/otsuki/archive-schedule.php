<?php get_header(); ?>
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

<?php get_footer(); ?>