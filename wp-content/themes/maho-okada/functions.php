<?php
function mo_scripts()
{
  wp_enqueue_style('mo-style', get_template_directory_uri() . '/public/css/style.css');
  wp_enqueue_script('mo-scripts', get_template_directory_uri() . '/public/js/index.js');
}
add_action('wp_enqueue_scripts', 'mo_scripts');

function mo_init()
{
  $post_types = [
    ['label' => 'Schedule', 'term' => 'schedule', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-calendar-alt'],
    ['label' => 'Works', 'term' => 'works', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-format-audio']
  ];
  foreach ($post_types as $post_type) {
    register_post_type(
      $post_type['term'],
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
add_action('init', 'mo_init');

function mo_registar_rest_field()
{
  register_rest_field(
    'works',
    'image',
    array(
      'get_callback'    => function ($object, $field_name, $request) {
        $image_id = get_post_meta($object['id'], $field_name, true);
        return wp_get_attachment_url($image_id);
      },
      'update_callback' => null,
      'schema'          => null,
    )
  );

  register_rest_field(
    'works',
    'year',
    array(
      'get_callback'    => function ($object, $field_name, $request) {
        return get_post_meta($object['id'], $field_name, true);
      },
      'update_callback' => null,
      'schema'          => null,
    )
  );
}
add_action('rest_api_init', 'mo_registar_rest_field');