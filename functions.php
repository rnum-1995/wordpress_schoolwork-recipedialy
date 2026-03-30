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


//パンくずリスト
function bread_list()
{
    if (function_exists('bcn_display')) bcn_display_list();
}


// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', '__return_false');
