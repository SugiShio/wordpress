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
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php include 'menu.php'; ?>