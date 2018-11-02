<?php get_header(); ?>

<section class="facility content-wrapper">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        FACILITY
      </h2>
      <span class="content-head__sub">施設</span>
      <ul class="content-head-box-pc">
        <li class="content-head__link-item">
          <a href="#chapel" class="content-head__link">チャペル</a>
        </li>
        <li class="content-head__link-item">
          <a href="#banquet" class="content-head__link">バンケット</a>
        </li>
        <li class="content-head__link-item">
          <a href="#entrance" class="content-head__link">ガーデン</a>
        </li>
      </ul>
    </div>
    <p class="content-head__description">お二人のための最高の場を演出いたします</p>
  </div>

  <ul class="content-head-box-sp">
    <li class="content-head__link-item">
      <a href="#chapel" class="content-head__link">チャペル</a>
    </li>
    <li class="content-head__link-item">
      <a href="#banquet" class="content-head__link">バンケット</a>
    </li>
    <li class="content-head__link-item">
      <a href="#entrance" class="content-head__link">ガーデン</a>
    </li>
  </ul>

  <article class="content-main" id="chapel">
    <h2 class="content-main__head content-main__head--facility">
      チャペル
    </h2>
    <p class="content-main__text">
      全面ガラス張りのチャペルは、光に包まれとても明るく、夜はライトアップで神秘的な雰囲気に。最大100名。
    </p>
    <div class="content-main__image-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility/image_1.jpg" alt="" class="content-main__image">
    </div>
  </article>

  <article class="content-main" id="banquet">
    <h2 class="content-main__head content-main__head--facility">
      バンケット
    </h2>
    <p class="content-main__text">
      珍しい丸形の会場は、どのゲストからも2人と近い距離感を実現。会場の全ての壁面を使った「プロジェクションマッピング」は迫力満点。最大150名の大型会場。
    </p>
    <div class="content-main__image-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility/image_2.jpg" alt="" class="content-main__image">
    </div>
  </article>

  <article class="content-main" id="entrance">
    <h2 class="content-main__head content-main__head--facility">
      エントランス／２次会専用会場
    </h2>
    <p class="content-main__text">
      緑に囲まれたエントランスも貸し切りに！
    </p>
    <div class="content-main__image-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility/image_3.jpg" alt="" class="content-main__image">
    </div>
    <p class="content-main__text">
      2次会専用の会場も用意あり。顔合わせ等の食事会でもＯＫ
    </p>
    <div class="content-main__image-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facility/image_4.jpg" alt="" class="content-main__image">
    </div>
  </article>

</section>

<?php get_footer(); ?>
