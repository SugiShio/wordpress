<?php get_header(); ?>
<div class="y-top">
  <section class='y-mainview'>
    <div class="y-mainview__flamenco">
      <img src="<?php echo get_template_directory_uri()."/assets/images/main_flamenco.png"; ?>" alt="">

      <div class="y-mainview__text">
        <h3 class="y-mainview__subtext">下北沢のフラメンコ教室</h3>
        <h2 class="y-mainview__maintext">Flamenco studio Las gracias</h2>
      </div>
    </div>
    <div class="y-mainview__yoga">
      <img src="<?php echo get_template_directory_uri()."/assets/images/main_yoga.jpg"; ?>" alt="">
      <div class="y-mainview__text">
        <h3 class="y-mainview__subtext">港区芝浦の少人数制ヨガサロン</h3>
        <h2 class="y-mainview__maintext">yoga salon GRACIAGE</h2>
      </div>
    </div>
  </section>

  <section class="y-top__menu">
    <?php include 'menu.php'; ?>
  </section>

  <section class="y-top__copy">
    <img src="<?php echo get_template_directory_uri()."/assets/images/flowers_upper.png"; ?>" alt="">
    <p>
      当教室はフラメンコ・ヨガ・ピラティスのクラスを設けております。<br>
      まずは体を動かして日々のストレスを発散し、<br>
      体と心のスペースを取り戻し、<br>
      さらに魅力的で健康的な自分と、<br>
      充実した生活を見つけてみませんか？
    </p>
    <p class="y-top__maincopy">
      <span>
        <strong>カラダ</strong>を動かせば、<strong>ココロ</strong>が動く
      </span>
      <span><strong>ココロ</strong>が動けば、<strong>カラダ</strong>も動く</span>
    </p>
    <p>
      日常の生活を変えたくても誰も変えてくれません。<br>
      変えられるのはアナタです。<br>
      まずは行動してみてください。<br>
      きっと、今までと違う何かが見えてきます！<br>
      心が動けばあなたの生活の質はもっともっと向上します。<br>
      ​一緒に楽しい時間を共有しましょう！<br>
    </p>
    <img src="<?php echo get_template_directory_uri()."/assets/images/flowers_bottom.png"; ?>" alt="">
  </section>

  <section class="y-topAnnounce">
    <?php
    $posts = get_posts(array(
      'post_type' => 'announce',
      'posts_per_page' => 1,
    ));
    $post = $posts[0];
    setup_postdata( $post );
    $date = get_the_date('Y-m-d');
    ?>
    <h4 class="y-topAnnounce__title">お知らせ</h4>
    <div class="y-topAnnounce__description">
      <time class="y-topAnnounce__date" datetime="<?php echo $date; ?>">
        <?php echo date('Y.n.j', strtotime($date)); ?>
      </time>
      <?php the_title(); ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </section>
</div>

<?php get_footer(); ?>