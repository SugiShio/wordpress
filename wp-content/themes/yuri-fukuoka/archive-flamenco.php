<?php get_header(); ?>

<?php
$posts = get_posts(array(
  'post_type' => 'flamenco',
  'meta_key' => 'order',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'posts_per_page' => 50,
));
?>

<section class="y-classmain y-classmain--flamenco">
  <div class="y-classmain__inner">
    <h3 class="y-classmain__subtitle">福岡由理フラメンコ教室</h3>
    <h2 class="y-classmain__title">lasgracias</h2>

    <p class="y-classmain__text">
      当教室は、ヨガ・ピラティスで解剖学（体の筋肉や骨格の仕組み）を学んだ講師が、<br>
      それぞれの生徒さんの体にあった無理のない使い方を丁寧に指導いたしますので、安心して受講していただけます。<br>
      『体を動かすことの楽しさを知る』ことにより少しでも皆様の生活の質を高めていただけることを願い、<br>
      『体を動かすと、心が動く』をモットーにレッスンを行っております。
    </p>

    <p class="y-classmain__text">
      随時生徒さん募集しております。<a href="">こちら</a>より気軽にお問い合わせください！
    </p>
    <div class="y-classmain__about">
      <h3 class="y-classmain__abouttitle">フラメンコとは</h3>
      <p class="y-classmain__abouttext">
        スペイン南部アンダルシア地方に発生した民族音楽舞踊。ジプシー・アラブ系・スペイン固有の音楽が混ざって出来上がったのが現在のフラメンコの始まり。そのため、フラメンコは西洋の中にありながらも非常に東洋的な色彩を持った独特な音楽で私たち日本人にも親しみやすいものである。<br>
        ​カンテ（歌）・トケ（ギター）・バイレ（踊り）が三位一体となり作られる。
      </p>
    </div>
  </div>
</section>

<section class="y-container y-classes">
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
    $post = get_post(get_page_by_path('flamenco-bottom'));
    setup_postdata( $post );
    the_content();
    wp_reset_postdata();
    ?>
  </div>
</section>

<?php get_footer(); ?>