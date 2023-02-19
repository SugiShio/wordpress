<?php
get_header();
$lang = $GLOBALS['lang']['value'];
$text_set = $lang == 'ja'
  ? array(
    'department' => '部門',
    'prizes' => '賞品',
    'judges' => '審査員',
    'evaluation_criteria' => '評価基準',
    'awards' => '賞',
    'application_requirements' => '応募要項',
  )
  : array(
    'department' => 'Department',
    'prizes' => 'Prizes',
    'judges' => 'Judges',
    'evaluation_criteria' => 'Evaluation Criteria',
    'awards' => 'Awards',
    'application_requirements' => 'Application requirements',
  );
?>

<section class="section u-guidelines">
  <div class="u-guidelines__container">
    <div class="section__markdown">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php
$posts = get_posts(array(
  'post_type' => 'department',
  'meta_key' => 'order',
  'orderby' => 'meta_value_num',
  'order' => 'ASC'
));
?>

<section class="section u-guidelines">
  <ul class="u-guidelines__link-list">
    <?php foreach($posts as $post) : setup_postdata( $post ); ?>
    <li class="u-guidelines__link-item">
      <a href="#<?php echo $post->post_name ?>" class="u-guidelines__link-body">
        <i class="icon-<?php echo $post->post_name ?> color-<?php echo $post->post_name ?> u-guidelines__link-icon"></i>
        <p class="u-guidelines__link-text">
          <?php the_title(); ?> <?php echo $text_set['department']; ?>
        </p>
      </a>
    </li>
    <?php endforeach; ?>
    <li class="u-guidelines__link-item u-guidelines__link-item--w50">
      <a href="#prizes" class="u-guidelines__link-body">
        <p class="u-guidelines__link-text"><?php echo $text_set['prizes']; ?></p>
      </a>
    </li>
    <li class="u-guidelines__link-item u-guidelines__link-item--w50">
      <a href="#judges" class="u-guidelines__link-body">
        <p class="u-guidelines__link-text"><?php echo $text_set['judges']; ?></p>
      </a>
    </li>
  </ul>
</section>

<section class="section u-guidelines">
  <?php foreach($posts as $post) : setup_postdata( $post ); ?>
  <ul class="u-guidelines__list">
    <li class="u-guidelines__item" id="<?php echo $post->post_name ?>">
      <div class="u-guidelines__icon">
        <i class="icon-<?php echo $post->post_name ?> color-<?php echo $post->post_name ?>"></i>
      </div>
      <h1 class="u-guidelines__name"><em><?php the_title(); ?></em> <?php echo $text_set['department']; ?></h1>
      <ul class="u-guidelines__table">
        <li class="u-guidelines__row">
          <h2 class="u-guidelines__th u-guidelines__th--<?php echo $post->post_name; ?>">
            <?php echo $text_set['evaluation_criteria']; ?></h2>
          <div class="u-guidelines__td"><?php echo markdown_post_custom('evaluation_criteria'); ?></div>
        </li>
        <li class="u-guidelines__row">
          <h2 class="u-guidelines__th u-guidelines__th--<?php echo $post->post_name; ?>">
            <?php echo $text_set['awards']; ?></h2>
          <div class="u-guidelines__td"><?php echo markdown_post_custom('awards'); ?></div>
        </li>
        <li class="u-guidelines__row">
          <h2 class="u-guidelines__th u-guidelines__th--<?php echo $post->post_name; ?>">
            <?php echo $text_set['prizes']; ?></h2>
          <div class="u-guidelines__td"><?php echo markdown_post_custom('prizes'); ?></div>
        </li>
        <li class="u-guidelines__row">
          <h2 class="u-guidelines__th u-guidelines__th--<?php echo $post->post_name; ?>">
            <?php echo $text_set['application_requirements']; ?></h2>
          <div class="u-guidelines__td"><?php echo markdown_post_custom('guidelines'); ?></div>
        </li>
      </ul>
    </li>
  </ul>
  <?php wp_reset_postdata(); endforeach; ?>
</section>

<section class="section u-guidelines" id="prizes">
  <?php
  $post = get_page_by_path('prizes');
  setup_postdata( $post );
  ?>
  <div class="section__head">
    <h1 class="section__head-main"><span>
      <?php echo get_the_title(); ?>
    </span></h1>
    <p class="section__head-sub"><?php echo post_custom('sub_title') ?></p>
  </div>
  <div class="u-guidelines__container">
    <div class="section__markdown">
      <?php the_content(); ?>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
</section>

<section class="section u-guidelines" id="judges">
  <?php
  $post = get_page_by_path('judges');
  setup_postdata( $post );
  ?>
  <div class="section__head">
    <h1 class="section__head-main"><span>
      <?php echo get_the_title(); ?>
    </span></h1>
    <p class="section__head-sub"><?php echo post_custom('sub_title') ?></p>
  </div>
  <div class="u-guidelines__container">
    <div class="section__markdown">
      <?php the_content(); ?>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>

  <?php
  $posts = get_posts(array(
    'post_type' => 'judge',
    'meta_key' => 'order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'posts_per_page' => 20,
  ));
  ?>
  <ul class="u-guidelines__judge-list">
  <?php foreach ($posts as $post) : ?>
    <li class="u-guidelines__judge-item">
    <?php setup_postdata( $post ); ?>
      <div class="u-guidelines__judge-image">
        <img src="<?php echo get_field('image') ?>" alt="<?php the_title(); ?>">
      </div>
      <div class="u-guidelines__judge-body">
        <h2 class="u-guidelines__judge-name"><?php the_title(); ?></h2>
        <h3 class="u-guidelines__judge-sub"><?php echo markdown_post_custom('title'); ?></h3>
        <p class="u-guidelines__judge-text"><?php echo markdown_post_custom('profile'); ?></p>
      </div>
    <?php wp_reset_postdata(); ?>
    </li>
  <?php endforeach; ?>
  </ul>

</section>

<?php get_footer(); ?>
