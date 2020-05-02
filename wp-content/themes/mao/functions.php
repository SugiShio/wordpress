<?php
$post = get_page_by_path('profile');
setup_postdata( $post );
$site_title = post_custom('name');
$subtitle = post_custom('title');
wp_reset_postdata();
$medias = set_medias( $post );

function set_medias($post) {
  setup_postdata( $post );
  $MEDIAS = [
    ['name' => 'spotify', 'label' => 'Spotify'],
    ['name' => 'applemusic', 'label' => 'Apple Music'],
    ['name' => 'instagram', 'label' => 'Instagram', 'url_base' => 'https://www.instagram.com/##ID##' ],
    ['name' => 'twitter', 'label' => 'Twitter', 'url_base' => 'https://twitter.com/##ID##' ],
    ['name' => 'facebook', 'label' => 'Facebook', 'url_base' => 'https://www.facebook.com/##ID##' ],
    ['name' => 'youtube', 'label' => 'Youtube', 'url_base' => 'https://www.youtube.com/user/##ID##' ],
    ['name' => 'web', 'label' => 'Web']
  ];
  $result = [];
  foreach($MEDIAS as $item) {
    $value = post_custom($item['name']);
    if($value) {
      $label = $item['url_base']
        ? $value
        : $item['label'];
      $url = $item['url_base']
        ? str_replace('##ID##', $value, $item['url_base'])
        : $value;
      $result[] = [
        'label' => $label,
        'name' => $item['name'],
        'url' => $url
      ];
    };
  };
  wp_reset_postdata();
  return $result;
}

function mao_scripts() {
  wp_enqueue_style('mao-style', get_template_directory_uri() . '/public/css/style.css');
  wp_enqueue_script('mao-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'mao_scripts');

function mao_init() {
  $post_types = [
    ['label'=>'Schedule', 'term'=>'schedule', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-calendar-alt'],
    ['label'=>'Works', 'term'=>'works', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-format-audio'],
    ['label'=>'Good Fellows', 'term'=>'goodfellows', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-video-alt3'],
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
add_action('init', 'mao_init');