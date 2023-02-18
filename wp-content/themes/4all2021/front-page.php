<?php
get_header();
$top_image_path = get_template_directory_uri() . "/assets/images/top/" . $GLOBALS['lang']['value'];
$depertment_text = $GLOBALS['lang']['value'] == 'ja' ? '部門' : 'depertment';
$view_more_text = $GLOBALS['lang']['value'] == 'ja' ? 'もっと見る' : 'view more';
?>
<h1 class="u-hero">
  <picture>
    <source media="(min-width: 1000px)" srcset="<?php echo $top_image_path; ?>/hero.png,
        <?php echo $top_image_path; ?>/hero_2x.png 2x">
    <source media="(min-width: 320px)" srcset="<?php echo $top_image_path; ?>/hero_sp.png,
        <?php echo $top_image_path; ?>/hero_sp_2x.jpg 2x">
    <img src="<?php echo $top_image_path; ?>/hero.png" alt="" class="u-hero__image">
  </picture>
</h1>

<?php
$posts = get_posts(array(
  'post_type' => 'news',
));
if (count($posts)) {
  $post = $posts[0];
  setup_postdata($post);
?>
<section class="section u-news">
  <h1 class="u-news__head">
    NEWS
  </h1>
  <?php if ($post->post_content) : ?>
  <a href="<?php the_permalink(); ?>" class="u-news__item">
    <?php else : ?>
    <a class="u-news__item">
      <?php endif; ?>
      <time class="u-news__time"><?php the_date("Y.n.j"); ?></time>
      <p class="u-news__text"><?php echo get_the_title(); ?></p>
    </a>
    <?php wp_reset_postdata(); ?>
    <?php if (count($posts) > 1) : ?>
    <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>"
      class="u-news__link"><?php echo $view_more_text; ?></a>
    <?php endif; ?>
</section>
<?php }; ?>

<section class="section u-department">
  <?php
  $post = get_post(get_page_by_path('about-departments'));
  setup_postdata($post);
  ?>
  <div class="section__head">
    <h1 class="section__head-main"><span>
        <?php echo get_the_title(); ?>
      </span></h1>
    <p class="section__head-sub"><?php echo post_custom('sub_title') ?></p>
  </div>
  <?php wp_reset_postdata(); ?>

  <?php
  $posts = get_posts(array(
    'post_type' => 'department',
    'meta_key' => 'order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
  ));
  ?>
  <ul class="u-department__list">
    <?php foreach ($posts as $post) {
      setup_postdata($post); ?>
    <li class="u-department__item">
      <div class="u-department__icon">
        <i class="icon-<?php echo $post->post_name ?> color-<?php echo $post->post_name ?>"></i>
      </div>
      <h2 class="u-department__name">
        <em><?php echo get_the_title(); ?></em>
        <?php echo $depertment_text; ?>
      </h2>
      <p class="u-department__text"><?php echo post_custom('description'); ?></p>
    </li>
    <?php wp_reset_postdata();
    }; ?>
  </ul>
  <?php
  $post = get_post(get_page_by_path('about-departments'));
  setup_postdata($post);
  ?>
  <small class="section__note section__note--red">
    <?php echo post_custom('notification'); ?>
  </small>
  <?php wp_reset_postdata(); ?>
</section>

<section class="section u-schedule">
  <?php
  $post = get_post(get_page_by_path('schedule'));
  setup_postdata($post);
  ?>
  <div class="section__head">
    <h1 class="section__head-main section__head-main--white"><span>
        <?php echo get_the_title(); ?>
      </span></h1>
    <p class="section__head-sub section__head-sub--white"><?php echo post_custom('sub_title') ?></p>
  </div>

  <ul class="u-schedule__list">
    <?php for ($i = 1; $i <= 3; $i++) : ?>
    <li class="u-schedule__item">
      <div class="u-schedule__month">
        <em><?php echo post_custom('month_' . $i) ?></em><?php echo post_custom('suffix') ?>
      </div>
      <div class="u-schedule__body">
        <h2 class="u-schedule__head"><?php echo post_custom('title_' . $i) ?></h2>
        <p class="u-schedule__text"><?php echo post_custom('body_' . $i) ?></p>
      </div>
    </li>
    <?php endfor; ?>
  </ul>
  <small class="section__note section__note--white">
    <?php echo post_custom('notification'); ?>
  </small>
  <?php wp_reset_postdata(); ?>
</section>

<section class="section u-message">
  <?php
  $post = get_post(get_page_by_path('message'));
  setup_postdata($post);
  ?>
  <div class="section__head">
    <h1 class="section__head-main"><span>
        <?php echo get_the_title(); ?>
      </span></h1>
    <p class="section__head-sub"><?php echo post_custom('sub_title') ?></p>
    <div class="u-message__container">
      <?php the_content(); ?>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
</section>

<section class="section u-message">
  <?php
  $post = get_post(get_page_by_path('message-2'));
  setup_postdata($post);
  ?>
  <div class="section__head">
    <h1 class="section__head-main"><span>
        <?php echo get_the_title(); ?>
      </span></h1>
    <p class="section__head-sub"><?php echo post_custom('sub_title') ?></p>
    <div class="u-message__container">
      <?php the_content(); ?>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
</section>

<section class="section u-twitter">
  <p class="u-twitter__text">Follow for more updates!</p>
  <a href="https://twitter.com/UkuleleContest&ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large"
    data-related="" data-show-count="false">Tweet #UkuleleContest</a>
  <div class="u-twitter__timeline">
    <a class="twitter-timeline" data-height="400" href="https://twitter.com/UkuleleContest?ref_src=twsrc%5Etfw">Tweets
      by UkuleleContest</a>
  </div>
</section>

<?php get_footer(); ?>