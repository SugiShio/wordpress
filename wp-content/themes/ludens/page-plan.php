<?php get_header(); ?>

<section class="plan">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        PLAN
      </h2>
      <span class="content-head__sub">プラン</span>
      <div class="content-head-box-pc">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/banner.jpg" alt="ベストプライス保証">
      </div>
    </div>
    <p class="content-head__description">最高のウエディングを演出するプランをご用意しております</p>
  </div>
  <div class="content-head-box-sp">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/banner.jpg" alt="ベストプライス保証">
  </div>

  <article class="plan__item">
    <div class="plan__box">
      <div class="plan__text">
        <h2 class="plan__title">グランドオープン記念プラン　第１弾</h2>
        <p class="plan__detail">80名 100万円 OFF</p>
        <p class="plan__description">プラン内容：挙式料、会場費、衣装、装花、マイクロバス、マッピング映像、他</p>
        <dl class="plan__condition">
          <dt class="plan__condition-term">適用条件</dt>
          <dd class="plan__condition-desc">年内〜2019年3月までの結婚式</dd>
        </dl>
      </div>
      <div class="plan__image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/image_1.jpg" alt="">
      </div>
    </div>
    <div class="plan__cta">
      <p class="plan__cta-text">費用についてすぐに相談したい方はこちらから</p>
      <a href="<?php echo get_permalink(get_page_by_path('contact-input')->ID); ?>" class="plan__cta-link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/button.png" alt="見積もり依頼をする">
      </a>
    </div>
    <p class="plan__note">※2018年10月末日までのご成約特典となります。</p>
  </article>

  <article class="plan__item">
    <div class="plan__box">
      <div class="plan__text">
        <h2 class="plan__title">グランドオープン記念プラン　第２弾</h2>
        <p class="plan__detail">80名 80万円 OFF</p>
        <p class="plan__description">プラン内容：挙式料、会場費、衣装、装花、マイクロバス、マッピング映像、他</p>
        <dl class="plan__condition">
          <dt class="plan__condition-term">適用条件</dt>
          <dd class="plan__condition-desc">2019年4月〜8月までの結婚式</dd>
        </dl>
      </div>
      <div class="plan__image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/image_2.jpg" alt="">
      </div>
    </div>
    <div class="plan__cta">
      <p class="plan__cta-text">費用についてすぐに相談したい方はこちらから</p>
      <a href="<?php echo get_permalink(get_page_by_path('contact-input')->ID); ?>" class="plan__cta-link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan/button.png" alt="見積もり依頼をする">
      </a>
    </div>
    <p class="plan__note">※2018年10月末日までのご成約特典となります。</p>
  </article>
</section>

<?php get_footer(); ?>
