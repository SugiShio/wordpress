<?php
    function ludens_setup() {
        add_theme_support('title-tag');
    }
    add_action('after_setup_theme', 'ludens_setup');

    function ludens_scripts() {
        wp_enqueue_style('slick-style', get_template_directory_uri() . '/public/plugins/slick/slick.css');
        wp_enqueue_style('slick-theme-style', get_template_directory_uri() . '/public/plugins/slick/slick-theme.css');
        wp_enqueue_style('ludens-style', get_template_directory_uri() . '/public/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('slick-scripsts', get_template_directory_uri() . '/public/plugins/slick/slick.min.js');
        wp_enqueue_script('ludens-scripts', get_template_directory_uri() . '/public/js/index.js');
    }
    add_action('wp_enqueue_scripts', 'ludens_scripts');
