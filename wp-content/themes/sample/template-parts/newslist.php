<?php
	$news = new WP_Query(
		array(
			'post_type'      => array( 'post' ),
			'posts_per_page' => 5,
		)
	);

	if ( $news->have_posts() ) : ?>
	<h2>最新のお知らせ</h2>
	<ul>
		<?php
		while ( $news->have_posts() ) :
			$news->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y.m.d' ); ?></time>
					<span>
						<?php the_title(); ?>
					</span>
				</a>
			</li>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>
