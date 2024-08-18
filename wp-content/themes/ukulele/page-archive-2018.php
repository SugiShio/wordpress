<?php get_header();?>

<section class="section u-2018">
  <div class="u-2018__container">
    <?php the_content(); ?>
  </div>
</section>

<?php
$parent_id = get_term_by('slug', 'dep-2018', 'department')->term_id;
$departments = get_categories(array(
  'child_of' => $parent_id,
  'taxonomy' => 'department',
  'hide_empty' => 0,
  'orderby' => 'slug'
));
foreach ($departments as $department) :
?>
<section class="section">
  <div class="section__head">
    <h1 class="section__head-main"><span>
      <?php echo $department->name; ?>部門
    </span></h1>
  </div>

  <?php
  $posts = get_posts(array(
    'post_type' => 'winner',
    'orderby' => 'meta_value_num',
    'meta_key' => 'order',
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'department',
        'terms' => $department->term_id
      )
    )
  ));
  ?>
  <ul class="u-2018__list">
    <?php
    foreach ($posts as $post) :
      setup_postdata( $post );
    ?>
      <li class="u-2018__listitem">
        <h3 class="u-2018__award-title"><span><?php echo get_the_title(); ?></span></h3>
        <div class="u-2018__winner-name"><?php echo post_custom('entry_name') ?><span class="u-2018__san">さん</span></div>
        <div class="u-2018__work-title-label">作品名</div>
        <div class="u-2018__work-title"><?php echo post_custom('title'); ?></div>
        <?php
        if(post_custom('youtube_id')) {
          $url = 'https://www.youtube.com/watch?v='.post_custom('youtube_id');
        } else {
          $url = post_custom('url');
        };
        ?>
        <a href="<?php echo $url; ?>" target="_blank" class="u-2018__link">作品ページへ</a>
      </li>
    <?php
      wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</section>
<?php endforeach; ?>

<?php get_footer();?>
