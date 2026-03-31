<?php
//カスタム投稿タイプ「レシピ」とカスタムタクソノミー「レシピカテゴリー」の登録
function register_custom_post_type()
{
    //1. カスタムタクソノミーの登録
    $taxonomy_args = [
        'labels' => [
            //管理画面に表示する名前（複数形）
            'name' => 'レシピカテゴリー',
            //管理画面に表示する名前（単数形）
            'singular_name' => 'レシピカテゴリー'
        ],
        //階層構造にするかどうか
        'hierarchical' => true,
        //一覧画面に表示するかどうか
        'show_admin_column' => true,
        //ブロックエディタで選択可能か
        'show_in_rest' => true
    ];
    //register_taxonomy('カスタムタクソノミーの名称', 'カスタムタクソノミーを使用するオブジェクトタイプ', 'カスタムタクソノミーの設定'); 
    register_taxonomy('recipe-category', 'recipe', $taxonomy_args); //カスタムタクソノミーの登録

    //2. カスタム投稿タイプの登録
    $post_args = [
        'labels' => [
            //管理画面に表示する名前（複数形）
            'name' => 'レシピ',
            //管理画面に表示する名前（単数形）
            'singular_name' => 'レシピ',
            'add_new_item' => 'レシピを追加',
            'not_found' => 'レシピが見つかりませんでした。'
        ],
        //公開するかどうか
        'public' => true,
        //アーカイブを有効にするかどうか
        'has_archive' => true,
        //管理画面のメニューの表示位置
        'menu_position' => 5,
        //管理画面のメニューアイコンの種類
        'menu_icon' => 'dashicons-food',
        //編集画面で利用できる機能
        'supports' => [
            'title',
            'editor',
            'thumbnail'
        ],
        //利用するタクソノミー
        'taxonomies' => ['recipe-category'],
        //ブロックエディタを利用するかどうか
        'show_in_rest' => true
    ];
    //register_post_type('カスタム投稿タイプ名', 'カスタム投稿タイプの設定');
    register_post_type('recipe', $post_args);
}
//3. 関数の実行
add_action('init', 'register_custom_post_type');

// カスタム投稿タイプ一覧ページの表示件数を設定
function set_posts_per_page($query)
{
    // 管理画面、
    if (is_admin() || !$query->is_main_query()) return;
    if ($query->is_post_type_archive('recipe')) $query->set('posts_per_page', '12');
}
add_action('pre_get_posts', 'set_posts_per_page');

// レシピ個別ページのパーマリンクを変更
function custom_recipe_permalink($post_link, $post)
{
    if ($post->post_type === 'recipe') {
        return home_url('/recipe/' . $post->ID . '/');
    }
    return $post_link;
}
add_filter('post_type_link', 'custom_recipe_permalink', 1, 3);

// パーマリンクのルールを追加
function add_recipe_rewrite_rule($rules)
{
    $new_rules = [
        'recipe/([0-9]+)/?$' => 'index.php?post_type=recipe&p=$matches[1]',
    ];
    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'add_recipe_rewrite_rule');

// テーマセットアップ
function setup_theme()
{
    // アイキャッチ画像の有効化
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_theme');



//パンくずリスト
function bread_list()
{
    if (function_exists('bcn_display')) bcn_display_list();
}


// Contact Form 7の自動pタグ無効
function wpcf7_autop_return_false()
{
    return false;
}
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
