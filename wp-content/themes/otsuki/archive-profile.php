<?php get_header(); ?>
<?php
  $posts = get_posts(array(
    'post_type' => 'profile',
    'meta_key' => 'order',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'posts_per_page' => 10
  ));
  ?>
<div class="o-content o-profile">
  <?php
  $term = 'profile';
  include 'title.php';
  ?>

  <ul class="o-profile__list">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    $accounts = [];

    foreach($GLOBALS['sns'] as $item) {
      if(get_field($item)) {
        $accounts[] = array(
          "name" => $item,
          "id" => get_field($item),
          "url" => str_replace("ACCOUNT_ID", get_field($item), $GLOBALS['url_base'][$item])
        );
      }
    };
    ?>
    <li class="o-profile__item">
      <div class="o-profile__image">
        <img src="<?php echo get_field('image')['url'] ?>" alt="">
      </div>

      <h3 class="o-profile__name">
        <?php echo get_the_title(); ?>
        <?php if(post_custom('part') || post_custom('en')) : ?>
          <div class="o-profile__sub">
          <?php if(post_custom('en')) : ?>
            <span><?php echo post_custom('en'); ?></span>
          <?php endif; ?>
          <?php if(post_custom('part')) : ?>
            <span><?php echo post_custom('part'); ?></span>
          <?php endif; ?>
          </div>
        <?php endif; ?>
      </h3>


      <?php if(get_the_content()) : ?>
      <div class="o-profile__content"><?php the_content(); ?></div>
      <?php endif; ?>

      <ul class="o-snslist">
        <?php foreach($accounts as $account) : ?>
        <li class="o-snslist__item">
          <a href="<?php echo $account['url']; ?>" target="_blank" class="o-snslist__link">
            <div class="o-snslist__icon o-snslist__icon--profile">
              <img src="<?php echo get_template_directory_uri()."/assets/images/".$account['name'].".svg"; ?>" alt="">
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>


    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</div>
</main>

<?php get_footer(); ?>
