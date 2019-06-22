<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php if(is_front_page()) : ?>
    <div class="f-mainview">
      <h1 class="f-mainview__title">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/felico.png" alt="フェリコ株式会社">
      </h1>
      <nav class="f-menu f-menu--home">
        <?php wp_nav_menu( array( 'theme_location' => 'home' ) ); ?>
      </nav>
    </div>
  <?php else : ?>
    <header class="f-header">
      <h1 class="f-header__title">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png" alt="フェリコ株式会社">
      </h1>
      <nav class="f-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'default' ) ); ?>
      </nav>
    </header>
  <?php endif; ?>
  <main class="f-<?php echo get_post_field( 'post_name', get_the_ID() ); ?>">
  <div class="f-container">
    <?php if(!is_front_page()) : ?>
    <ul class="f-breadcrumb">
      <li class="f-breadcrumb__item">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Top</a>
      </li>
      <li class="f-breadcrumb__item"><?php the_title(); ?></li>
    </ul>
    <?php endif; ?>
