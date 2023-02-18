<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="<?php bloginfo('name') ?>" />
  <?php if (is_home()) : ?>
    <meta property="og:type" content="website" />
  <?php else : ?>
    <meta property="og:type" content="article" />
  <?php endif; ?>
  <meta property="og:url" content="<?php echo home_url(); ?>" />
  <meta property="og:image" content="<?php echo get_template_directory_uri() . "/assets/images/ogp/" . $GLOBALS['lang']['value'] . ".png"; ?>">
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:site_name" content="<?php bloginfo('name') ?>" />
  <meta property="og:description" content="<?php bloginfo('description') ?>" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@UkuleleContest" />
  <meta name="twitter:title" content="<?php bloginfo('name') ?>" />
  <meta name="twitter:description" content="<?php bloginfo('description') ?>" />
  <meta name="twitter:image" content="<?php echo get_template_directory_uri() . "/assets/images/ogp/" . $GLOBALS['year_prefix'] . "/" . $GLOBALS['lang']['value'] . ".png"; ?>">

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />

  <?php get_template_part('gatag'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  get_template_part('loading');
  if (!post_custom('no_nav')) {
    get_template_part('navigation');
  } else {
    wp_reset_postdata();
  }
  if (!is_home() && !is_404() && !post_custom('no_header')) {
    get_template_part('breadcrumb');
  }
  ?>
  <div class="u-wrapper">
    <?php get_template_part('to_page_top'); ?>