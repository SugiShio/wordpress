<?php
    function mybm_setup() {
        // <title>の挿入
        add_theme_support('title-tag');

        // アイキャッチ画像有効化
        add_theme_support('post-thumbnails');

        // カスタムメニュー
        // register_nav_menus();
    }
    add_action('after_setup_theme', 'mybm_setup');

    function mybm_scripts() {
        wp_enqueue_style('mybm-style', get_template_directory_uri() . '/public/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('mybm-nav', get_template_directory_uri() . '/public/js/index.js');
    }
    add_action('wp_enqueue_scripts', 'mybm_scripts');


    add_theme_support('menus');

    function shortenUrl($url) {
        return preg_replace('/https?:\/\//', '', $url);
    }

    add_action('pre_get_posts', 'my_pre_get_posts');
    function my_pre_get_posts($query) {
        if (is_admin() || ! $query->is_main_query()) return;

        if(is_home()) {
            $query->set('category_name', 'news');
        }
    }
?>
