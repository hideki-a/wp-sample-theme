<?php
get_header();
?>

<main>
	<h1><?php the_title(); ?></h1>
	<p>サンプルページA専用のテンプレートです。if文を使用せず独自の記述をすることができます。WordPressのテーマを作る際は「<a href="https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E9%9A%8E%E5%B1%A4" target="_blank" rel="noopener noreferrer">テンプレート階層</a>」の概観図を理解することが重要です。</p>
	<?php
		the_content();
	?>

	<h2>製品一覧</h2>
	<?php
		$parent_id = get_the_ID(); // 現在のページのIDを取得
		$args = array(
			'posts_per_page' => -1,           // 無限に取得
			'post_type'      => 'page',       // 「ページ」を取得
			'orderby'        => 'menu_order', // 一覧の表示順で並び替え
			'order'          => 'ASC',        // 並び順は昇順
			'post_parent'    => $parent_id,   // 親ページのID
		);
		$product_pages = new WP_Query( $args );
		if ( $product_pages->have_posts() ): // ページがある場合はif分の中を処理
			?>
			<ul>
				<?php
					while( $product_pages->have_posts() ): // ページを繰り返し表示
						$product_pages->the_post(); // 変数$postにページの情報をセット
						?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<span><?php the_title(); ?></span>
								<p style="margin-top: 0.5em;">
									<?php
										// テキスト
										echo esc_html( get_post_meta( $post->ID , 'parent_page_text' , true ) );
									
										// 画像
										$image_id = get_post_meta( $post->ID , 'parent_page_image' , true );
										$image_data = wp_get_attachment_image_src( $image_id, 'thumbnail' );
										if ( $image_data ) :
											?>
										<br><img src="<?php echo esc_attr( $image_data[0] ); ?>" alt="">
											<?php
										endif;
									?>
								</p>
							</a>
						</li>
						<?php
					endwhile;
					wp_reset_postdata(); // 変数$postをサンプルページAのデータに戻す
				?>
			</ul>
			<?php
		endif;
	?>
</main>

<?php
get_footer();
