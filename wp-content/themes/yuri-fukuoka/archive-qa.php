<?php get_header(); ?>

<?php
  $posts = get_posts(array(
    'post_type' => 'qa',
    'meta_key' => 'order',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'posts_per_page' => 50
  ));
?>
<section class="y-container y-qa">
  <h2 class="y-title">Q&A</h2>

  <ul class="y-qa__list">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    ?>
    <li class="y-qa__item">
      <h3 class="y-qa__question">
        <?php the_title(); ?>
      </h3>
      <div class="y-qa__answer">
        <?php the_content(); ?>
      </div>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</section>

<?php get_footer(); ?>