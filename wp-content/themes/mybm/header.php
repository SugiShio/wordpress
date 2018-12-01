<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="11人組フェスティバル・ポップバンド。1stミニアルバム『かくも素晴らしき日々』全国のCDショップ、Amazonにて発売中！">
    <meta property="og:title" content="メロウ・イエロー・バナナムーン" />
    <?php if(is_home()) : ?>
        <meta property="og:type" content="website" />
    <?php else : ?>
        <meta property="og:type" content="article" />
    <?php endif; ?>
    <meta property="og:url" content="http://mellowyellowbananamoon.tokyo" />
    <meta property="og:image" content="http://mellowyellowbananamoon.tokyo/wp-content/themes/mybm/assets/img/common/ogp.jpg">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:site_name"  content="メロウ・イエロー・バナナムーン" />
    <meta property="og:description" content="11人組フェスティバル・ポップバンド。1stミニアルバム『かくも素晴らしき日々』全国のCDショップ、Amazonにて発売中！" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@mellowyellow877" />

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107611993-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-107611993-1');
    </script>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
