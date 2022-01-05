<?php
/**
 * ヘッダークリーンアップ
 */
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function anothersky_remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}

add_filter( 'wp_resource_hints', 'anothersky_remove_dns_prefetch', 10, 2 );


/**
 * ウィジェット
 */
require_once dirname( __FILE__ ) . '/function-parts/widget/footer-company-data.php';

// Deactivate new block editor.
// ウィジェットの編集はブロックエディタでなくてもよいかも（要検討）
// add_action(
// 	'after_setup_theme',
// 	function () {
// 		remove_theme_support( 'widgets-block-editor' );
// 	}
// );


/**
 * 独自の設定項目
 */
function anothersky_display_test_option() {
	$test_option = get_option( 'test_option' );
	?>
	<input name="test_option" id="test_option" type="text" value="<?php echo esc_html( $test_option ); ?>" class="regular-text">
	<p class="description">これはfunctions.phpで設定したフィールドです。フィールド入力のヒントを記述します。</p>
	<?php
}

function anothersky_test_option_field() {
	add_settings_field( 'test_option', '独自の項目テスト', 'anothersky_display_test_option', 'general' );
	register_setting( 'general', 'test_option' );
}

add_filter( 'admin_init', 'anothersky_test_option_field' );


/**
 * ロゴの設定
 *
 * Twenty Twentyより
 */
$logo_width  = 120;
$logo_height = 90;

if ( get_theme_mod( 'retina_logo', false ) ) {
	$logo_width  = floor( $logo_width * 2 );
	$logo_height = floor( $logo_height * 2 );
}

add_theme_support(
	'custom-logo',
	array(
		'height'      => $logo_height,
		'width'       => $logo_width,
		'flex-height' => true,
		'flex-width'  => true,
	)
);


/**
 * メニュー設定
 */
register_nav_menus(
	array(
		'nav_global' => 'グローバルメニュー',
	)
);


/**
 * 独自のカラーパレットを定義
 *
 * https://ja.wordpress.org/team/handbook/block-editor/how-to-guides/themes/theme-support/
 */
add_theme_support(
	'editor-color-palette',
	array(
		array(
			'name'  => 'strong magenta',
			'slug'  => 'strong-magenta',
			'color' => '#a156b4',
		),
		array(
			'name'  => 'light grayish magenta',
			'slug'  => 'light-grayish-magenta',
			'color' => '#d0a5db',
		),
		array(
			'name'  => 'very light gray',
			'slug'  => 'very-light-gray',
			'color' => '#eee',
		),
		array(
			'name'  => 'very dark gray',
			'slug'  => 'very-dark-gray',
			'color' => '#444',
		),
	)
);


/**
 * after_setup_themeフックの処理
 */
add_action( 'after_setup_theme', function () {
	// ブロックエディタ用スタイル機能をテーマに追加
	add_theme_support( 'editor-styles' );

	// ブロックエディタ用CSSの読み込み
	add_editor_style( 'block-editor-style.css' );
});


function anothersky_announce_dashboard_widget_function() {
	echo <<<EOM
<h2>注意事項</h2>
<ul>
<li>スラッグは英語表記でお願いします。</li>
</ul>
<hr>
<h2>更新マニュアル</h2>
<p>HTMLで自由に内容が書けます。例えばここにPDFファイルへのリンクを貼ることもできます。</p>
EOM;
}

function anothersky_announce_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'announce_dashboard_widget',
		'Sample Theme Read Me',
		'anothersky_announce_dashboard_widget_function'
	);
}

add_action( 'wp_dashboard_setup', 'anothersky_announce_add_dashboard_widgets' );
