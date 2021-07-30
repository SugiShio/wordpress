<?php
function mo_scripts()
{
  wp_enqueue_style('mo-style', get_template_directory_uri() . '/public/css/style.css');
  wp_enqueue_script('mo-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'mo_scripts');