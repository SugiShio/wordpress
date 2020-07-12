<?php get_header(); ?>

<?php
  // memo ページネーション未実装
  $posts = get_posts(array(
    'post_type' => 'live',
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'posts_per_page' => 30
  ));
?>
<section class="y-container y-live">
  <h2 class="y-title">Live</h2>

  <ul class="y-live__list">
    <?php
    foreach($posts as $post) :
    setup_postdata( $post );
    ?>
    <li class="y-live__item">
      <div class="y-live__date">
        <?php
        $date = get_field('date');
        echo date('Y.n.j D', strtotime($date));
        ?>
      </div>

      <h3 class="y-live__title">
        <?php the_title(); ?>
      </h3>

      <?php if (get_the_content()) : ?>
      <div class="y-live__content">
        <?php the_content(); ?>
      </div>
      <?php endif; ?>

      <table class="y-live__table">
        <?php if (get_field('date_text')) : ?>
        <tr class="y-live__tr">
          <th class="y-live__th">日時</th>
          <td class="y-live__td"><?php echo get_field('date_text'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if (get_field('actors')) : ?>
        <tr class="y-live__tr">
          <th class="y-live__th">出演</th>
          <td class="y-live__td"><?php echo get_field('actors'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if (get_field('charge')) : ?>
        <tr class="y-live__tr">
          <th class="y-live__th">料金</th>
          <td class="y-live__td"><?php echo get_field('charge'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if (get_field('place')) : ?>
        <tr class="y-live__tr">
          <th class="y-live__th">場所</th>
          <td class="y-live__td">
            <?php if (get_field('place_url')) : ?>
            <a href="<?php echo get_field('place_url'); ?>" target="_blank">
              <?php echo get_field('place'); ?>
            </a>
            <?php else : ?>
            <?php echo get_field('place'); ?>
            <?php endif; ?>
          </td>
        </tr>
        <?php endif; ?>

        <?php if (get_field('remarks')) : ?>
        <tr class="y-live__tr">
          <th class="y-live__th">備考</th>
          <td class="y-live__td"><?php echo get_field('remarks'); ?></td>
        </tr>
        <?php endif; ?>

      </table>



      <div class="y-live__map">
        <?php echo get_field('html_map'); ?>
      </div>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
</section>

<?php get_footer(); ?>