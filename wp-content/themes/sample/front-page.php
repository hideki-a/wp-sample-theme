<?php
get_header();
?>

<main>
	<div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sample_01.jpg" style="margin: 0 -10px; width: calc(100% + 20px);" alt="">
	</div>
	<?php
		the_content();
	?>

	<?php get_template_part( 'template-parts/newslist' ); ?>

	<h2>設定の表示</h2>
	<p>設定＞一般＞独自の項目テストの入力内容は「<?php echo esc_html( get_option( 'test_option' ) ); ?>」です。</p>
</main>

<?php
get_footer();
