		<footer>
			<div>
				<?php
				// ウィジェット
				if ( is_active_sidebar( 'footer-widget' ) ) :
					dynamic_sidebar( 'footer-widget' );
				endif;
				?>
			</div>

			<div class="copyright"><small>© Sample Co., Ltd.</small></div>
		</footer>
		<?php
			wp_footer();
		?>
	</body>
</html>
