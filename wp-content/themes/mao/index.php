<?php get_header(); ?>
<?php
  $MEDIA = ['spotify', 'applemusic'];
  $SNS = [
    ['media' => 'instagram', 'url_base' => 'https://www.instagram.com/##ID##' ],
    ['media' => 'twitter', 'url_base' => 'https://twitter.com/##ID##' ],
    ['media' => 'facebook', 'url_base' => 'https://www.facebook.com/##ID##' ],
    ['media' => 'youtube', 'url_base' => 'https://www.youtube.com/user/##ID##' ],
    ['media' => 'web', 'url_base' => '##ID##' ]
  ];
?>
<div id="app" class="m-wrapper">
  <template v-if='isTop'>
    <?php include('pages/top.php'); ?>
  </template>

  <layout-default v-else>
    <template #about-mao>
      <?php include('pages/about_mao.php'); ?>
    </template>

    <template #works>
      <?php include('pages/works.php'); ?>
    </template>

    <template #schedule>
      <?php include('pages/schedule.php'); ?>
    </template>

    <template #good-fellows>
      <?php include('pages/good_fellows.php'); ?>
    </template>

    <template #contact>
      <?php include('pages/contact.php'); ?>
    </template>
  </layout-default>
</div>
<?php get_footer(); ?>