<?php get_header(); ?>

<div class="wrapper">
  <?php get_template_part('components/header'); ?>
  <?php get_template_part('components/menu'); ?>

  <main class="access">
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.3961527439064!2d139.1917681153623!3d36.32694758004881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee8ad9c1e8007%3A0xfea84f0e4cbbb1e!2z5LyK5Yui5bSO6aeF!5e0!3m2!1sja!2sjp!4v1535897590598" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
      <p class="map__info">
        ルーデンス伊勢崎<br>住所:群馬県〇〇市0-0-0<br>アクセス:〇〇線〇〇駅より徒歩2分
      </p>
    </div>

  </main>

  <?php get_template_part('components/footer'); ?>
</div>
<?php get_footer(); ?>
