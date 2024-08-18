<?php get_header(); ?>

<section class="section u-qa">
  <?php
  $categories = get_categories(array(
    'taxonomy' => 'qa_category',
    'orderby' => 'slug'
     ));
   ?>

  <ul class="u-qa__link-list">
    <?php foreach ($categories as $category) : ?>
      <li class="u-qa__link-item">
        <div class="u-qa__link-body">
          <a href="#<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php foreach ($categories as $category) : ?>
    <h2 class="u-qa__category-title" id="<?php echo $category->slug; ?>"><?php echo $category->name; ?></h2>
    <?php
      $posts = get_posts(array(
        'posts_per_page' => 20,
        'post_type' => 'qa',
        'orderby' => 'meta_value_num',
        'meta_key' => 'order',
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'qa_category',
            'terms' => $category->term_id
          )
        )
      ));
      foreach ($posts as $post) :
        setup_postdata( $post );
    ?>
      <article class="u-qa__item">
        <div class="u-qa__box u-qa__box--question">
          <span class="u-qa__icon">Q</span>
          <h3 class="u-qa__content"><?php the_title(); ?></h3>
        </div>
        <div class="u-qa__box">
          <span class="u-qa__icon">A</span>
          <div class="u-qa__content"><?php echo post_custom('answer'); ?></div>
        </div>
      </article>
      <?php wp_reset_postdata(); ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</section>

<?php get_footer(); ?>
