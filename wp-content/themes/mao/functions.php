<?php
function mao_scripts() {
  wp_enqueue_style('mao-style', get_template_directory_uri() . '/public/css/style.css');
  wp_enqueue_script('mao-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'mao_scripts');
?>