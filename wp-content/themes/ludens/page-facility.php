<?php get_header(); ?>

<section class="facility content-wrapper">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        FACILITY
      </h2>
      <span class="content-head__sub">施設</span>
      <ul class="content-head-box-pc">
        <?php $i=0; while ($facility = get_page_by_path('facility-'.++$i)) : ?>
          <li class="content-head__link-item">
            <a href="#<?php echo $facility->post_name ?>" class="content-head__link">
              <span><?php echo $facility->post_title; ?></span>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <p class="content-head__description">お二人のための最高の場を演出いたします</p>
  </div>
  <ul class="content-head-box-sp">
  <?php $i=0; while ($facility = get_page_by_path('facility-'.++$i)) : ?>
    <li class="content-head__link-item">
      <a href="#<?php echo $facility->post_name ?>" class="content-head__link">
        <span><?php echo $facility->post_title; ?></span>
      </a>
    </li>
  <?php endwhile; ?>
  </ul>

  <?php $i=0; while ($post = get_page_by_path('facility-'.++$i)) : ?>
    <?php setup_postdata( $post ); ?>
    <article class="content-main" id="<?php echo $post->post_name ?>">
      <h2 class="content-main__head content-main__head--facility">
        <?php the_title(); ?>
      </h2>
      <div class="content-main__content">
        <?php the_content(); ?>
      </div>
    </article>
    <?php wp_reset_postdata(); ?>
  <?php endwhile; ?>
</section>

<?php get_footer(); ?>
