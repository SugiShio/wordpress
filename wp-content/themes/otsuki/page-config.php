<?php
$page_config = [
  'otsuki' => [
    'biography' => [
      'label' => 'Biography',
      'ja' => '',
      'url' => get_permalink(get_page_by_path('biography'))
    ],
    'schedule' => [
      'label' => 'Schedule',
      'ja' => 'スケジュール',
      'url' => get_post_type_archive_link('schedule')
    ],
    'works' => [
      'label' => 'Works',
      'ja' => '作品',
      'url' => get_post_type_archive_link('works'),
    ],
    'videos' => [
      'label' => 'Videos',
      'ja' => '動画',
      'url' => get_post_type_archive_link('videos'),
    ],
    'contact' => [
      'label' => 'Contact',
      'ja' => 'お問い合わせ',
      'url' => get_permalink(get_page_by_path('contact')),
    ],
    'mongoloid_union' => [
      'label' => 'Mongoloid Union',
      'url' => 'http://mongoloid-union.tokyo'
    ]
  ],
  'mongoloid' => [
    'about' => [
      'label' => 'About',
      'ja' => 'アバウト',
      'url' => get_permalink(get_page_by_path('about')),
    ],
    'profile' => [
      'label' => 'Profile',
      'ja' => 'プロフィール',

    ],
    'schedule' => [
      'label' => 'Schedule',
      'ja' => 'スケジュール',
      'url' => get_post_type_archive_link('schedule'),
    ],
    'discography' => [
      'label' => 'Discography',
      'ja' => 'ディスコグラフィー',
      'url' => get_post_type_archive_link('discography'),
    ],
    'videos' => [
      'label' => 'Videos',
      'ja' => '動画',
      'url' => get_post_type_archive_link('videos'),
    ],
    'contact' => [
      'label' => 'Contact',
      'ja' => 'お問い合わせ',
      'url' => get_permalink(get_page_by_path('contact'))
    ]
  ]
]
?>