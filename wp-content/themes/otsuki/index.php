<?php get_header(); ?>
<div id="app">
  <section class="o-mainview">
    <h2>
      <img src="<?php echo get_template_directory_uri()."/assets/images/title-".$GLOBALS['theme_name'].".svg"; ?>"
        alt="">
    </h2>
    <p class='o-mainview__sub'>Freelance Guitarist/Producer, based in Tokyo</p>
  </section>

  <parallax-box image="<?php echo get_template_directory_uri()."/assets/images/image.jpg"; ?>" :rate="1.618">
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
    ?>

    <h2 class="o-show__title">Upcoming show</h2>
    <?php if (empty($posts)) : ?>
    <div class="o-show__item">
      予定されているスケジュールはありません
    </div>
    <?php /* todo
    <p>
      <a href="<?php echo get_post_type_archive_link('schedule'); ?>" class="o-show__morelink">
    Past schedule
    </a>
    </p>
    */ ?>

    <?php
    else :
    $post = $posts[0];
    setup_postdata( $post );
    $date = get_field('date');
    $place = get_field('place');
    ?>
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
    <?php endif; ?>
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