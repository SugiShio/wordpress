<?php
    function my_scripts() {
        wp_enqueue_style('my-style', get_template_directory_uri() . '/public/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('my-scripts', get_template_directory_uri() . '/public/js/index.js');
    }
    add_action('wp_enqueue_scripts', 'my_scripts');