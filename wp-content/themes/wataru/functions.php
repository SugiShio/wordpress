<?php
    function wataru_setup() {
        // <title>の挿入
        add_theme_support('title-tag');
        // アイキャッチ画像有効化
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme', 'wataru_setup');

    function wataru_scripts() {
        wp_enqueue_style('wataru-style', get_template_directory_uri() . '/public/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('wataru-scripts', get_template_directory_uri() . '/public/js/index.js');
    }
    add_action('wp_enqueue_scripts', 'wataru_scripts');
