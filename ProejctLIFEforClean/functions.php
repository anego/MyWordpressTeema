<?php

/**
 * ユーザープロフィールの項目のカスタマイズ
 */
function my_user_meta($x)
{
	//項目の削除
	/*
	unset($x['aim']);
	unset($x['jabber']);
	unset($x['yim']);*/

	//項目の追加
	$x['twitter'] = 'twitter';
	$x['facebook'] = 'facebook';
	$x['github'] = 'github';
	$x['pixiv'] = 'pixiv';

	return $x;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);

/** メニューのカスタマイズ */
register_nav_menu('mainmenu', 'Main menu');

/** ウィジット */
if (function_exists ( 'register_sidebar' ))
	register_sidebar ( array (
			'name' => 'sidebar',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2 class="widget_title">',
			'after_title' => '</h2>'
	) );
register_sidebar ( array (
	'name' => 'footer',
	'before_widget' => '<div id="%1$s" class="col-sm-4">',
	'after_widget' => '</div>',
	'before_title' => '<div class="page-header text-muted divider">',
	'after_title' => '</div>'
) );

// 分割したファイル読み込み
$custom_functions_dir = 'functions/';
$custom_functions_files = array(
		// カテゴリーウィジェット用
		$custom_functions_dir . 'category-template',
		// アーカイブウィジェット用
		$custom_functions_dir . 'archive-template',
		// タグクラウドウィジェット用
		$custom_functions_dir. 'tagcloud-template'
);
foreach ($custom_functions_files as $custom_functions_file) {
	get_template_part($custom_functions_file);
}


// 管理画面にウィジェットの追加
add_action ( 'widgets_init', create_function ( '', 'return register_widget("BSWidgetCategory");' ) );
add_action ( 'widgets_init', create_function ( '', 'return register_widget("BSWidgetArchive");' ) );
add_action ( 'widgets_init', create_function ( '', 'return register_widget("BSWidgetTagCloud");' ) );


/**
 * ページャー.
 * @param string $pages
 * @param number $range
 * @link http://kyasper.com/note/memo-49/
 */
function pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

	global $paged;//現在のページ値
	if(empty($paged)) $paged = 1;//デフォルトのページ

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;//全ページ数を取得
		if(!$pages)//全ページ数が空の場合は、１とする
		{
			$pages = 1;
		}
	}

	if(1 != $pages)//全ページが１でない場合はページネーションを表示する
	{
		echo "<ul class=\" text-center pager\">\n";
		//Prev：現在のページ値が１より大きい場合は表示
		if($paged > 1){
			echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";
		}else {
			echo "<li class=\"prev disabled\"><a href=\"#\">Prev<span class=\"sr-only\">(current)</span></a></li>\n";
		}

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				//三項演算子での条件分岐
				echo ($paged == $i)? "<li class=\"active\"><a href=\"#\">".$i."<span class=\"sr-only\">(current)</span></a></li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
			}
		}
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages){
			echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		}else {
			echo "<li class=\"next disabled\"><a href=\"#\">Next<span class=\"sr-only\">(current)</span></a></li>\n";
		}
		echo "</ul>\n";
	}
}

/**
 * テーマカスタマイザー
 */
add_action( 'customize_register', 'themename_customize_register' );
function themename_customize_register($wp_customize) {
	// セクションを追加
	$wp_customize->add_section( 'projectlife_clean_box_background_image', array(
			'title'		=> 'ボックス背景画像',
			'priority'	=> 100,
	) );

	// セクションの動作設定
	$wp_customize->add_setting( 'projectlife_clean_box_background_image', array(
			'default'		=> '',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
	) );

	// セクションのUIを作成する
	$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'box_background_image',
			array(
					'label'		=> '画像',
					'section'	=> 'projectlife_clean_box_background_image',
					'settings'	=> 'projectlife_clean_box_background_image',
			)
	) );

}


// wordpressのバージョンメタ情報削除
remove_action('wp_head', 'wp_generator');

// RSSフィールドなどをヘッダに追加
add_theme_support('automatic-feed-links');
// コメントフィールドは削除
remove_action('wp_head', 'feed_links_extra', 3);

// スクリプトとスタイルシートの管理
// wp-config/theme/[子テーマ名]/functions.php
function projectlife_styles() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null, 'all');
	wp_enqueue_style( 'projectlife-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'projectlife_styles');

// wp-config/theme/[子テーマ名]/functions.php
function projectlife_scripts() {
	wp_enqueue_script( 'projectlife-clean-script', get_template_directory_uri() . '/js/clean-blog.min.js', array(), '20150314', true );
	wp_enqueue_script( 'projectlife-script', get_template_directory_uri() . '/js/functions.js', array(), '20150314', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'projectlife_scripts');


