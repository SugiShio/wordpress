<?php get_header(); ?>

<?php
$posts = get_posts(array(
  'post_type' => 'yoga',
  'meta_key' => 'order',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'posts_per_page' => 50,
));
?>

<section class="y-classmain y-classmain--yoga">
  <div class="y-classmain__inner">
    <h3 class="y-classmain__subtitle">港区芝浦の完全予約制女性専用ヨガサロン</h3>
    <h2 class="y-classmain__title">yoga salon GRACIAGE</h2>

    <p class="y-classmain__text">
      芝浦ヨガサロングラシアージュは、完全予約制のプライベートレッスンで、ご自身のペースでワークアウトできる空間です。<br>
      アライメントをしっかり確認しながら、アジャストも交えてレッスンいたしますので、周りを気にせずゆっくりやりたい方、<br>ご自身の体としっかり向き合いたい方におすすめです。<br>
    </p>

    <p class="y-classmain__text">
      随時生徒さん募集しております。<a href="<?php echo get_permalink(get_page_by_path( 'contact' )); ?>">こちら</a>より気軽にお問い合わせください。
    </p>
    <div class="y-classmain__about">
      <h3 class="y-classmain__abouttitle">ヨガとは</h3>
      <p class="y-classmain__abouttext">
        ヨガにはサンスクリット語で『結ぶ・繋ぐ』という意味があり、『心・体・魂』が繋がっている状態のことを表します。『呼吸・姿勢・瞑想』を組み合わせ、『心身の解放』と『心の安定と安らぎ』を得るものです。<br>
        決して人と比較することはせず『そこに自分が存在することを大切に』そして『自分と向き合う、自分のための時間』を有意義に過ごして​参りましょう！
      </p>
    </div>
  </div>
</section>

<section class="y-container y-classes">
  <div class="y-classes__buttonArea">
    <div class="y-classes__button">
      <a href="https://coubic.com/yogasalongraciage" class='y-button' target="_blank">オンライン予約</a>
    </div>
  </div>
  <h3 class="y-classes__title-1">レッスン</h3>
  <?php
  if($posts) :
  ?>

  <ul class="y-classes__list">
    <?php
    foreach($posts as $post) :
      setup_postdata( $post );
      ?>
    <li class="y-classes__item">
      <h4 class="y-classes__title-2"><?php the_title(); ?></h4>
      <div class="y-classes__content">
        <?php the_content(); ?>
      </div>
    </li>
    <?php
    wp_reset_postdata();
    endforeach;
    ?>
  </ul>
  <?php endif; ?>

  <div class="y-classes__bottom">
    <?php
    $post = get_post(get_page_by_path('yoga-bottom'));
    setup_postdata( $post );
    the_content();
    wp_reset_postdata();
    ?>
  </div>
</section>

<?php get_footer(); ?>