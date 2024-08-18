<div id="fb-root"></div>
<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.0&appId=465285097275680&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<?php
get_header();
$back_to_top_text = $GLOBALS['lang']['value'] == 'ja' ? 'トップへ戻る' : 'Back to Top';
?>
<section class="section u-entry">
  <div class="u-entry__container">
    <h2 class="u-entry__title"><?php echo post_custom('title') ?></h2>
    <div class="u-entry__description-comp">
      <?php echo post_custom('description'); ?>
    </div>
    <div style="display: none;"><?php the_content(); ?></div>
  </div>

  <ul class="u-entry__sns-buttons">
    <li class="u-entry__sns-button">
      <a href="https://twitter.com/intent/tweet?button_hashtag=Ukulele4ALL&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-size="large" data-text="Ukulele Contest 4 All にエントリーしました！" data-url="http://ukulelecontest4all.com/" data-related="UkuleleContest" data-show-count="false">Tweet #Ukulele4ALL</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </li>
    <li class="u-entry__sns-button">
      <div class="fb-share-button" data-href="http://ukulelecontest4all.com/" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fukulelecontest4all.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div>
    </li>
  </ul>

  <div class="u-entry__button">
    <a href="<?php echo home_url(); ?>"><?php echo $back_to_top_text; ?></a>
  </div>
</section>

<?php get_footer(); ?>