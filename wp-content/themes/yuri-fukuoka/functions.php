<?php
function yf_scripts() {
  wp_enqueue_style('my-style', get_template_directory_uri() . '/public/css/style-1.0.6.css');
  wp_enqueue_script('my-scripts', get_template_directory_uri() . '/public/js/index-1.0.6.js');
}
add_action('wp_enqueue_scripts', 'yf_scripts');

function yf_init() {
  $post_types = [
    ['label'=>'お知らせ', 'term'=>'announce', 'menu_position'=>5, 'menu_icon'=>'dashicons-megaphone'],
    ['label'=>'レッスン（フラメンコ）', 'term'=>'flamenco', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-universal-access'],
    ['label'=>'レッスン（ヨガ）', 'term'=>'yoga', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-universal-access'],
    ['label'=>'アクセス', 'term'=>'access', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-location-alt'],
    ['label'=>'ライブ', 'term'=>'live', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-calendar-alt'],
    ['label'=>'フォト', 'term'=>'photo', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-camera-alt'],
    ['label'=>'Q&A', 'term'=>'qa', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-editor-help'],
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
      'show_in_rest' => true
      )
    );
  };
}
add_action('init', 'yf_init');