<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo home_url(); ?>" />
  <meta property="og:image" content="<?php echo get_template_directory_uri()."/assets/images/ogp.jpg"; ?>">
  <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
  <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary" />
  <?php
    $index = array_search("twitter", array_column($GLOBALS['medias'], 'name'));
    $twitter = $GLOBALS['medias'][$index];
    if($twitter) :
  ?>
  <meta name="twitter:site" content="@<?php echo $twitter['label']; ?>" />
  <?php endif; ?>

  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri()."/assets/images/favicon.ico"; ?>">

  <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
  <style>
    <?php
    $post=get_page_by_path('background-images');
    setup_postdata($post);
    foreach($GLOBALS['page_config'] as $page) :
      if (get_field($page['id'])) : ?>
      .m-container.<?php echo $page['id'];?> {
        background-image: url(<?php echo get_field($page['id']);?>);
      }
    <?php
      endif;
    endforeach;
    wp_reset_postdata();
    ?>
  </style>
</head>

<body <?php body_class(); ?>>