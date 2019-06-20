<?php
function felico_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'felico_setup');

function felico_scripts() {
    wp_enqueue_style('felico-style', get_template_directory_uri() . '/public/css/style.css');
    wp_enqueue_script('felico-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'felico_scripts');
