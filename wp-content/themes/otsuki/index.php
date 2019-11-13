<?php get_header(); ?>
<div id="app">
  <section class="o-mainview">
    <p>Freelance Guitarist/Producer, based in Tokyo</p>
  </section>

  <parallax-box image="http://img.youtube.com/vi/<?php echo $GLOBALS['featured_video']; ?>/maxresdefault.jpg">
  </parallax-box>

  <?php /* Schedule */ ?>
  <section class="o-show">
    <?php
  $posts = get_posts(array(
    'post_type' => 'schedule',
    'meta_key' => 'date',
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'meta_value' => date('Ymd'),
    'meta_compare' => '>=',
  ));
  $post = $posts[0];
  setup_postdata( $post );
  $date = get_field('date');
  $place = get_field('place');
  ?>
    <h2 class="o-show__title">Upcoming show</h2>

    <div class="o-show__item">
      <time class="o-show__date" datetime="<?php echo $date; ?>">
        <?php echo date("Y.m.d D", strtotime($date));?>
      </time>
      <div class="o-show__itemtitle">
        <?php echo get_the_title(); ?>
        <?php if($place) : ?>
        &nbsp;@<?php echo $place; ?>
        <?php endif; ?>
      </div>
    </div>

    <?php wp_reset_postdata(); ?>
    <p>
      <a href="<?php echo get_post_type_archive_link('schedule'); ?>" class="o-show__morelink">
        More show
      </a>
    </p>
  </section>

  <?php
$post = get_post(get_page_by_path('config'));
setup_postdata( $post );
?>

  <?php /* Video */ ?>
  <section class="o-featuredvideo">
    <div class="o-featuredvideo__video">
      <iframe src="https://www.youtube.com/embed/<?php echo $GLOBALS['featured_video']; ?>?controls=0" frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <a href="<?php echo get_post_type_archive_link('videos'); ?>" class="o-featuredvideo__link">More videos</a>
  </section>

  <?php /* SNS */ ?>
  <section class="o-sns">
    <?php include 'snslist.php' ?>
  </section>

  <?php wp_reset_postdata(); ?>

</div>
<?php get_footer(); ?>
