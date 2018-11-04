<?php
    function mybm_setup() {
        // <title>の挿入
        add_theme_support('title-tag');

        // アイキャッチ画像有効化
        add_theme_support('post-thumbnails');

        // カスタムメニュー
        // register_nav_menus();
    }
    add_action('after_setup_theme', 'mybm_setup');

    function mybm_scripts() {
        wp_enqueue_style('mybm-reset', get_template_directory_uri() . '/assets/css/reset.css');
        wp_enqueue_style('mybm-style', get_template_directory_uri() . '/assets/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('velocity', get_template_directory_uri() . '/assets/js/velocity.min.js');
        wp_enqueue_script('mybm-nav', get_template_directory_uri() . '/assets/js/nav.js');
    }
    add_action('wp_enqueue_scripts', 'mybm_scripts');


    add_theme_support('menus');

    function shortenUrl($url) {
        return preg_replace('/https?:\/\//', '', $url);
    }

    //予約投稿機能を無効化
    add_action('save_post', 'futuretopublish', 99);
    add_action('edit_post', 'futuretopublish', 99);
    function futuretopublish() {
        global $wpdb;
        $sql = 'UPDATE `'.$wpdb->prefix.'posts` ';
        $sql .= 'SET post_status = "publish" ';
        $sql .= 'WHERE post_status = "future"';
        $wpdb->get_results($sql);
    }

    // 日付けによる表示・非表示を操作
    add_action('pre_get_posts', 'my_pre_get_posts');
    function my_pre_get_posts($query) {
        if (is_admin() || ! $query->is_main_query()) return;

        if (is_category('schedule')) {
            $query->set('order', 'ASC');
            $query->set('date_query', array(
                        array(
                            'after' => date('Y') . '-' . date('m') . '-' . (date('d')-1)
                        ),
                        'inclusive' => true,
                    )
            );
        } else {
            $query->set('date_query', array(
                        array(
                            'before' => date('Y') . '-' . date('m') . '-' . date('d') . ' ' . (date('H')+9) . ':' . date('i') . ':59'
                        ),
                        'inclusive' => true,
                    )
            );
        }

        if(is_home()) {
            $query->set('category_name', 'news');
        }
    }
?>