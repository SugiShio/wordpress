<?php get_header(); ?>
<section>
  <p>Freelance Guitarist/Producer, based in Tokyo</p>
</section>

<?php /* Schedule */ ?>
<section>
  <?php
  $posts = get_posts(array(
    'post_type' => 'schedule',
    'meta_key' => 'date',
    'order' => 'ASC'
  ));
  $post = $posts[0];
  setup_postdata( $post );
  ?>

  <?php echo post_custom('date'); ?>
  <?php echo get_the_title(); ?>
  <?php wp_reset_postdata(); ?>
</section>

<?php
$post = get_post(get_page_by_path('config'));
setup_postdata( $post );
?>

<?php /* Video */ ?>
<section>

  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo post_custom('video'); ?>?controls=0"
    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen></iframe>
  <p>
    <a href="<?php echo get_post_type_archive_link('videos'); ?>">More videos</a>
  </p>
</section>

<?php /* SNS */ ?>
<section>
  <ul>
    <li><?php echo post_custom('youtube'); ?></li>
    <li><?php echo post_custom('twitter'); ?></li>
    <li><?php echo post_custom('instagram'); ?></li>
    <li><?php echo post_custom('facebook'); ?></li>
  </ul>
</section>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>