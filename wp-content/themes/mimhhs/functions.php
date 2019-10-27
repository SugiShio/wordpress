<?php
    function mimhhs_setup() {
        // <title>の挿入
        add_theme_support('title-tag');

        // アイキャッチ画像有効化
        add_theme_support('post-thumbnails');

        // カスタムメニュー
        register_nav_menus(array(
            'Top' => 'Top',
            'Default' => 'Default'
        ));
    }
    add_action('after_setup_theme', 'mimhhs_setup');

    function mimhhs_scripts() {
        wp_enqueue_style('mimhhs-style', get_template_directory_uri() . '/public/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('mimhhs-scripts', get_template_directory_uri() . '/public/js/index.js');
    }
    add_action('wp_enqueue_scripts', 'mimhhs_scripts');

    function mimhhs_getPageTitle() {
        if (is_category()) {
                $title = single_cat_title('', false);
            } elseif (is_tag()) {
                $title = single_tag_title('', false);
            }
        return $title;
    }
    add_filter('get_the_archive_title', 'mimhhs_getPageTitle');
?>
