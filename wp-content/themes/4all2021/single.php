<?php get_header(); ?>
<section class="section u-single">
  <div class="u-single__container">
    <article>
      <h1 class="u-single__title">
        <?php the_title(); ?>
      </h1>
      <time datetime="<?php echo get_the_date(DATE_W3C); ?>" class="u-single__date"><?php echo get_the_date(); ?></time>

      <?php if(has_post_thumbnail()) : ?>
      <div class="u-single__thumbnail">
        <?php the_post_thumbnail('full'); ?>
      </div>
      <?php endif; ?>

      <div class="u-single__content">
        <?php echo WPCom_Markdown::get_instance()->transform( get_the_content(), array('id'=>false,'unslash'=>false)); ?>
      </div>
    </article>

    <?php
    $i = 0;
    while(post_custom('id_'.++$i)) {
      $article_id = post_custom('id_'.$i);
      if($article_id) {
        $related_article_ids[] = $article_id;
      }
    }
    if($related_article_ids[0]) :
    ?>
    <h2 class="u-single__title2">関連記事</h2>
    <ul class="u-articlelist">
      <?php
      foreach($related_article_ids as $related_article_id) :
      $post = get_post($related_article_id);
      setup_postdata( $post );
      include 'articleitem.php';
      wp_reset_postdata();
      endforeach;
      ?>
    </ul>
    <?php endif;?>
  </div>
</section>
<div>

  <?php get_footer(); ?>