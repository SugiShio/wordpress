<?php
$sns = array('youtube', 'twitter','instagram','facebook');
$url_base = array(
  'youtube' => "https://www.youtube.com/user/ACCOUNT_ID",
  'twitter' => "https://twitter.com/ACCOUNT_ID",
  'instagram' => "https://www.instagram.com/ACCOUNT_ID",
  'facebook' => "https://www.facebook.com/ACCOUNT_ID",

);
$post = get_post(get_page_by_path('config'));
setup_postdata( $post );
$featured_video = get_field('video');

foreach($sns as $item) {
  if(get_field($item)) {
    $accounts[] = array(
      "name" => $item,
      "id" => get_field($item),
      "url" => str_replace("ACCOUNT_ID", get_field($item), $url_base[$item])
    );
  }
};
wp_reset_postdata();

function o_scripts() {
  wp_enqueue_style('o-style', get_template_directory_uri() . '/public/css/style.css');
  wp_enqueue_script('o-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'o_scripts');

function o_init() {
  $post_types = [
    ['label'=>'Schedule', 'term'=>'schedule', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-calendar-alt'],
    ['label'=>'Works', 'term'=>'works', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-format-audio'],
    ['label'=>'Videos', 'term'=>'videos', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-video-alt3'],
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
add_action('init', 'o_init');
?>
