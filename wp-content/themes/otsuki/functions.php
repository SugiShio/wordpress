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
$theme_name = get_field('theme');
$twitter_account = get_field('twitter');

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
  wp_enqueue_style('o-style', get_template_directory_uri() . '/public/css/style_'.$GLOBALS['theme_name'].'.css');
  wp_enqueue_script('o-scripts', get_template_directory_uri() . '/public/js/index_'.$GLOBALS['theme_name'].'.js');
}
add_action('wp_enqueue_scripts', 'o_scripts');

function o_init() {
  $post_types = [
    'otsuki' => [
      ['label'=>'Schedule', 'term'=>'schedule', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-calendar-alt'],
      ['label'=>'Works', 'term'=>'works', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-format-audio'],
      ['label'=>'Videos', 'term'=>'videos', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-video-alt3'],
    ],
    'mongoloid' => [
      ['label'=>'Schedule', 'term'=>'schedule', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-calendar-alt'],
      ['label'=>'Profile', 'term'=>'profile', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-admin-users'],
      ['label'=>'Discography', 'term'=>'discography', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-format-audio'],
      ['label'=>'Videos', 'term'=>'videos', 'has_archive'=>true, 'menu_position'=>5, 'menu_icon'=>'dashicons-video-alt3'],
    ]
  ];
  foreach($post_types[$GLOBALS['theme_name']] as $post_type) {
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

function o_registar_rest_field() {
  register_rest_field( 'videos',
  'youtube_id',
  array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      return get_post_meta( $object[ 'id' ], $field_name, true );
    },
    'update_callback' => null,
    'schema'          => null,
    )
  );
  register_rest_field( 'videos',
  'show_thumbnail',
  array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      return get_post_meta( $object[ 'id' ], $field_name, true ) == "1";
    },
    'update_callback' => null,
    'schema'          => null,
    )
  );
  register_rest_field( 'videos',
  'thumbnail',
  array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      $image_id = get_post_meta( $object[ 'id' ], $field_name, true );
      return wp_get_attachment_url($image_id);
    },
    'update_callback' => null,
    'schema'          => null,
    )
  );

  register_rest_field( 'works',
  'image',
  array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      $image_id = get_post_meta( $object[ 'id' ], $field_name, true );
      return wp_get_attachment_url($image_id);
    },
    'update_callback' => null,
    'schema'          => null,
    )
  );

  register_rest_field( 'works',
  'year',
  array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      return get_post_meta( $object[ 'id' ], $field_name, true );
    },
    'update_callback' => null,
    'schema'          => null,
    )
  );
}
add_action( 'rest_api_init', 'o_registar_rest_field' );
?>