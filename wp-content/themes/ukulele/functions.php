<?php
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}

function markdown_post_custom($key)
{
    $desc = post_custom($key);
    if ($desc) {
        return WPCom_Markdown::get_instance()->transform($desc, array('id' => false, 'unslash' => false));
    };
};

$post = get_post(get_page_by_path('config'));
setup_postdata($post);
$year_prefix = get_field('year');
wp_reset_postdata();

$posts = get_posts(array(
    'post_type' => 'department',
    'meta_key' => 'order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
));
foreach ($posts as $post) {
    setup_postdata($post);
    $departments[] = $post->post_name;
    wp_reset_postdata();
};

$langs = [['value' => 'ja', 'label' => '日本語'], ['value' => 'en', 'label' => 'English']];
$lang_values = array_map(function ($var) {
    return $var['value'];
}, $langs);
$lang = explode('/', $_SERVER["REQUEST_URI"])[1];
$index = array_search($lang, $lang_values);
$lang = $index ? $langs[$index] : $langs[0];

require_once(dirname(__FILE__) . '/lib/stripe/init.php');
$post = get_page_by_path('entry');
setup_postdata($post);
$secret_key = post_custom('secret_key');
$entry_fee = post_custom('entry_fee');
wp_reset_postdata();
\Stripe\Stripe::setApiKey($secret_key);

add_action('template_redirect', 'ukulele_stripe', 100);
function ukulele_stripe($entry_fee)
{
    $token = $_POST['stripeToken'];
    if ($token) {
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $GLOBALS["entry_fee"],
                "currency" => "jpy",
                "source" => $token,
                "description" => "エントリーフィー",
            ));
        } catch (\Stripe\Error\Card $e) {
            die('決済が完了しませんでした');
        }
    }
}

function forall2021_setup()
{
    // <title>の挿入
    add_theme_support('title-tag');

    // アイキャッチ画像有効化
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'forall2021_setup');

function forall2021_scripts()
{
    wp_enqueue_style('forall2021-style', get_template_directory_uri() . '/public/css/style.css');
    wp_enqueue_script('twitter-publish', 'https://platform.twitter.com/widgets.js');
    wp_enqueue_script('forall2021-scripts', get_template_directory_uri() . '/public/js/index.js');
    wp_enqueue_script('forall2021-stripe', 'https://js.stripe.com/v3/');
    wp_enqueue_script('forall2021-zipcode', 'https://postcode-jp.com/js/postcodejp.js');
}
add_action('wp_enqueue_scripts', 'forall2021_scripts');

function forall2021_init()
{
    $post_types = [
        ['label' => '更新情報', 'term' => 'news', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-megaphone'],
        ['label' => 'ブログ', 'term' => 'article', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-edit'],
        ['label' => '応募作品', 'term' => 'gallery', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-format-audio'],
        ['label' => '広告', 'term' => 'pr', 'menu_position' => 5, 'menu_icon' => 'dashicons-store'],
        ['label' => 'Q&A', 'term' => 'qa', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-editor-help'],
        ['label' => '結果発表', 'term' => 'winner', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-awards'],
        ['label' => '過去大会', 'term' => 'archive', 'has_archive' => true, 'menu_position' => 5, 'menu_icon' => 'dashicons-category'],
        ['label' => 'メニュー', 'term' => 'menu', 'menu_position' => 20, 'menu_icon' => 'dashicons-editor-ul'],
        ['label' => '部門', 'term' => 'department', 'menu_position' => 20, 'menu_icon' => 'dashicons-screenoptions'],
        ['label' => '審査員', 'term' => 'judge', 'menu_position' => 20, 'menu_icon' => 'dashicons-businessman'],
        ['label' => '協賛', 'term' => 'sponsor', 'menu_position' => 20, 'menu_icon' => 'dashicons-money'],
        ['label' => '設定', 'term' => 'settings', 'menu_position' => 20, 'menu_icon' => 'dashicons-hammer'],
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
                'supports' => array('title', 'editor', 'thumbnail')
            )
        );
    };

    $taxonomy_types = [
        ['label' => 'カテゴリー', 'taxonomy' => 'category', 'object_type' => 'article'],
        ['label' => 'カテゴリー', 'taxonomy' => 'qa_category', 'object_type' => 'qa'],
        ['label' => 'カテゴリー', 'taxonomy' => 'department', 'object_type' => ['winner', 'gallery']],
        ['label' => '部門', 'taxonomy' => 'department', 'object_type' => ['winner', 'gallery']],
        ['label' => '協賛枠', 'taxonomy' => 'sponsor_category', 'object_type' => 'sponsor'],
        ['label' => '広告タイプ', 'taxonomy' => 'pr_type', 'object_type' => 'pr'],
    ];

    foreach ($taxonomy_types as $taxonomy_type) {
        register_taxonomy(
            $taxonomy_type['taxonomy'],
            $taxonomy_type['object_type'],
            array(
                'labels' => array(
                    'name' => $taxonomy_type['label'],
                ),
                'hierarchical' => true,
            )
        );
    };
}
add_action('init', 'forall2021_init');