<div>
	<?php
	$allowed_logo_html = array(
		'a'   => array(
			'href' => array(),
			'rel'  => array(),
		),
		'img' => array(
			'src'    => array(),
			'srcset' => array(),
			'sizes'  => array(),
			'alt'    => array(),
			'width'  => array(),
			'height' => array(),
		),
	);
	echo( wp_kses( get_custom_logo(), $allowed_logo_html ) );
	?>
	<!-- <a href="/">Skyward Design Logo</a> -->
</div>
<p>子テーマを使用し、サイト毎に<code>template-parts/sitelogo.php</code>を書き換えてロゴが変更できます。<br>
外観＞カスタマイズ＞サイト基本情報にロゴを設定し、<code>get_custom_logo()</code>を使用する方法もあり、ここでは<code>get_custom_logo()</code>を使用して表示しています。</p>
