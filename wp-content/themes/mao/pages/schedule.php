<section class="m-schedule" key="schedule">
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
  <?php if (empty($posts)) : ?>
  no schedules
  <?php else : ?>
  <ul>
    <?php
      foreach($posts as $post) :
      setup_postdata( $post );
      $date = get_field('date');
      $place = get_field('place');
    ?>
    <li class="m-schedule__item">
      <time class="m-schedule__date" datetime="<?php echo $date; ?>">
        <?php echo date("Y.m.d D", strtotime($date));?>
      </time>
      <h3 class="m-schedule__title"><?php echo get_the_title(); ?></h3>
      <?php if($place) : ?>
      <a href="<?php echo get_field('place_url');?>" class="m-schedule__place">@ <?php echo $place; ?></a>
      <?php endif; ?>
      <div class="m-schedule__content"> <?php the_content(); ?> </div>
    </li>
    <?php
      wp_reset_postdata();
      endforeach;
      endif;
    ?>
  </ul>
</section>