		<footer>
			<div class="footer-content">
				<p>例えばfooter.phpを書き換えると、フッターをまるごとカスタマイズできます。</p>

				<?php
				// ウィジェット
				if ( is_active_sidebar( 'footer-widget' ) ) :
					dynamic_sidebar( 'footer-widget' );
				endif;
				?>
			</div>

			<div class="copyright"><small>© Skyward Design.</small></div>
		</footer>
		<?php
			wp_footer();
		?>
	</body>
</html>
