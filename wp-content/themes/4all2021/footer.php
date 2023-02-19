  </div>
  <?php if (!post_custom('no_footer')) : ?>
  <footer class="u-footer<?php if (post_custom('no_nav')) echo " is-single"; ?>">
    <div class="u-footer__inner">
      <div class="u-footer__banner">
        <a href="https://www.kiwayasbest.com/" target="_blank">
          <img src="<?php echo get_template_directory_uri()."/assets/images/banner-footer.jpg"; ?>" alt="">
        </a>
      </div>
      <section class="u-sponsors">
        <?php
        $parent_id = get_term_by('slug', 'sponsor-2019', 'sponsor_category')->term_id;
        $categories = get_categories(array(
          'child_of' => $parent_id,
          'taxonomy' => 'sponsor_category',
          'orderby' => 'slug',
          ));
        ?>
        <ul>
          <?php foreach ($categories as $category) : ?>
          <li class="u-sponsors__container">
            <div class="u-sponsors__title"><?php echo $category->name; ?></div>
            <?php
            $posts = get_posts(array(
              'posts_per_page' => 20,
              'post_type' => 'sponsor',
              'orderby' => 'meta_value_num',
              'meta_key' => 'order',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'sponsor_category',
                  'terms' => $category->term_id,
                )
              )
            ));
            ?>
            <ul class="u-sponsors__banners">
              <?php
              foreach ($posts as $post) :
                setup_postdata( $post );
              ?>
              <li class="u-sponsors__banner">
                <a href="<?php echo post_custom('url') ?>" class="u-sponsors__link" target="_blank">
                  <img src="<?php echo get_field('image') ?>" alt="<?php the_title(); ?>">
                </a>
              </li>
            <?php
              wp_reset_postdata();
            endforeach;
            ?>
            </ul>
          </li>
          <?php endforeach; ?>
        </ul>

      </section>
      <ul class="u-footer__links">
        <li class="u-footer__linkitem">
          <?php $sctl = get_page_by_path('sctl'); ?>
          <a href="<?php echo get_permalink($sctl->ID); ?>"><?php echo $sctl->post_title ?></a>
        </li>
      </ul>
      <div class="u-footer__contact">Contact: <a href="mailto:info@ukulelecontest4all.com">info@ukulelecontest4all.com</a></div>
      <small class="u-footer__copyright">©︎ 2018 - 2021 The Ukulele Contest 4 All</small>
    </div>
  </footer>
  <?php endif; ?>

  <?php wp_footer(); ?>
</body>
</html>
