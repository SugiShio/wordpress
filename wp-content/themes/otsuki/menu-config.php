<?php
$menu_config = [
  'otsuki' => [
    ['label' => 'Biography', 'url' => get_permalink(get_page_by_path('biography'))],
    ['label' => 'Schedule', 'url' => get_post_type_archive_link('schedule')],
    ['label' => 'Works', 'url' => get_post_type_archive_link('works')],
    ['label' => 'Videos', 'url' => get_post_type_archive_link('videos')],
    ['label' => 'Contact', 'url' => get_permalink(get_page_by_path('contact'))],
    ['label' => 'Mongoloid Union']
  ],
  'mongoloid' => [
    ['label' => 'About', 'url' => get_permalink(get_page_by_path('biography'))],
    ['label' => 'Profile'],
    ['label' => 'Schedule', 'url' => get_post_type_archive_link('schedule')],
    ['label' => 'Discography', 'url' => get_post_type_archive_link('works')],
    ['label' => 'Videos', 'url' => get_post_type_archive_link('videos')],
    ['label' => 'Contact', 'url' => get_permalink(get_page_by_path('contact'))]
  ]
]
?>