<?php
/**
 * スタイルの読み込み
 */
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * お問い合わせ先を表示するショートコード
 */
add_shortcode(
	'contact-info',
	function () {
		ob_start();
		?>
		<div class="contact">
			<div>ショートコードの作成例です。</div>
			<div>お問い合わせ先</div>
			<div>03-1234-5678</div>
			<div><a href="#">お問い合わせフォーム</a></div>
		</div>
		<?php
		return ob_get_clean();
	}
);
