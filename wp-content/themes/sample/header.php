<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="format-detection" content="telephone=no">
		<title><?php the_title(); ?></title>
		<?php wp_head(); ?>
	</head>

	<body>
		<header>
			<?php get_template_part( 'template-parts/sitelogo' ); ?>
		</header>
