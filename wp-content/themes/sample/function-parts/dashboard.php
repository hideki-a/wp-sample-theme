<?php
function anothersky_announce_dashboard_widget_function() {
	echo <<<EOM
<h2>ショートカット</h2>
<ul style="margin-left: 25px; list-style: disc outside;">
<li><a href="/wp-admin/post-new.php">新規記事の作成</a></li>
<li><a href="/wp-admin/post-new.php?post_type=page">新規ページの作成</a></li>
<li><a href="/wp-admin/nav-menus.php">メニューの編集</a></li>
</ul>
<hr>
<h2>注意事項</h2>
<ul style="margin-left: 25px; list-style: disc outside;">
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
		'ご利用にあたって',
		'anothersky_announce_dashboard_widget_function'
	);
}

add_action( 'wp_dashboard_setup', 'anothersky_announce_add_dashboard_widgets' );
