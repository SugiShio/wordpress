<?php
    function pp_setup() {
        // <title>の挿入
        add_theme_support('title-tag');

        // アイキャッチ画像有効化
        add_theme_support('post-thumbnails');

        // カスタムメニュー
        register_nav_menus();
    }
    add_action('after_setup_theme', 'pp_setup');

    function pp_scripts() {
        wp_enqueue_style('pp-reset', get_template_directory_uri() . '/assets/css/reset.css');
        wp_enqueue_style('pp-style', get_template_directory_uri() . '/assets/css/style.css');
        wp_enqueue_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        wp_enqueue_script('pp-scripts', get_template_directory_uri() . '/assets/js/script.js');
        wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js');
    }
    add_action('wp_enqueue_scripts', 'pp_scripts');

    function pp_addClass($classes) {
        if (is_page()) $classes[] = get_post()->post_name;
        return $classes;
    }
    add_filter('body_class', 'pp_addClass');

    // 日付けによる表示・非表示を操作
    function pp_setLiveInfo($query) {
        if (is_admin() || ! $query->is_main_query()) return;

        $currnet_date = date_i18n( 'y/m/d' );

        if ( $query->is_category('live-info') ) {
            $query->set( 'posts_per_page', -1 );
            $query->set( 'orderby', 'meta_value' );
            $query->set( 'meta_key', 'date' );
            $query->set( 'order', 'ASC' );
            $query->set('meta_query',
                array(
                    array(
                        'key' => 'date',
                        'value' => $currnet_date,
                        'compare' => '>=',
                        'type' => 'DATE'
                    )
                )
            );
        }
    }
    add_action('pre_get_posts', 'pp_setLiveInfo');
?>