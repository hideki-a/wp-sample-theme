<?php
get_header();
?>

<main>
	<h1><?php the_title(); ?></h1>
	<p>サンプルページA専用のテンプレートです。if文を使用せず独自の記述をすることができます。WordPressのテーマを作る際は「<a href="https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E9%9A%8E%E5%B1%A4" target="_blank" rel="noopener noreferrer">テンプレート階層</a>」の概観図を理解することが重要です。</p>
	<?php
		the_content();
	?>
</main>

<?php
get_footer();
