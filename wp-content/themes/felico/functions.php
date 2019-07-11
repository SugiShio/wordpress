<?php
function felico_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array( 'post','achievements' ));
}
add_action('after_setup_theme', 'felico_setup');

function felico_scripts() {
    wp_enqueue_style('felico-style', get_template_directory_uri() . '/public/css/style.css');
    wp_enqueue_script('felico-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'felico_scripts');

function felico_init() {
  // メニュー
  register_nav_menu('default', 'デフォルト' );
  register_nav_menu('home', 'ホーム' );

  $post_types = [
    ['label'=>'実績', 'term'=>'achievements', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-star-filled'],
    ['label'=>'スタッフの声', 'term'=>'staff', 'has_archive'=>false, 'menu_position'=>5, 'menu_icon'=>'dashicons-star-filled'],
  ];
  foreach($post_types as $post_type) {
    register_post_type($post_type['term'],
      array(
        'labels' => array(
          'name' => $post_type['label'],
        ),
        'public' => true,
        'has_archive' => $post_type['has_archive'],
        'menu_position' => $post_type['menu_position'],
        'menu_icon' => $post_type['menu_icon'],
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields',)
      )
    );
  };
}
add_action( 'init', 'felico_init' );
