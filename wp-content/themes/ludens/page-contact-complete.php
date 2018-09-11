<?php get_header(); ?>

<section class="contact">
  <div class="content-head">
    <div class="content-head__main">
      <h2 class="content-head__title">
        CONTACT
      </h2>
      <span class="content-head__sub">お問い合わせ</span>
    </div>
    <p class="content-head__description">どんなことでもお気軽にお問い合わせください</p>
  </div>

  <div class="content-main">
    <?php if(have_posts()): while(have_posts()): the_post();?>
      <div class="contact__complete">
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>
