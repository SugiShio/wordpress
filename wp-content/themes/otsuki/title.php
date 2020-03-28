<?php
include 'page-config.php';
$page_item = $page_config[$GLOBALS['theme_name']][$term];
?>

<div class="o-title">
  <h2>
    <img
      src="<?php echo get_template_directory_uri()."/assets/images/".$GLOBALS['theme_name']."/titles/".$term.".svg"; ?>"
      alt="<?php echo $term; ?>">
  </h2>
  <?php if($page_item['ja']) : ?>
  <span class="o-title__sub">
    <?php echo $page_item['ja']; ?>
  </span>
  <?php endif; ?>
</div>