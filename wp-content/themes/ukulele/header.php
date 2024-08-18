<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $ogp_title = post_custom('ogp_title') ? get_field('ogp_title') : get_bloginfo('name'); ?>
<?php $ogp_image = post_custom('ogp_image') ? get_field('ogp_image') : get_template_directory_uri() . "/assets/images/ogp/" . $GLOBALS['lang']['value'] . ".png"; ?>
<?php $ogp_description = post_custom('ogp_description') ? get_field('ogp_description') : get_bloginfo('description'); ?>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="<?php echo $ogp_title; ?>" />
  <?php if (is_home()) : ?>
    <meta property="og:type" content="website" />
  <?php else : ?>
    <meta property="og:type" content="article" />
  <?php endif; ?>
  <meta property="og:url" content="<?php echo home_url(); ?>" />
  <meta property="og:image" content="<?php echo $ogp_image ?>">
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:site_name" content="<?php echo $ogp_title ?>" />
  <meta property="og:description" content="<?php echo $ogp_description ?>" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@UkuleleContest" />
  <meta name="twitter:title" content="<?php echo $ogp_title ?>" />
  <meta name="twitter:description" content="<?php echo $ogp_description ?>" />
  <meta name="twitter:image" content="<?php echo $ogp_image; ?>">

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