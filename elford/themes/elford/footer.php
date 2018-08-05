<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<div class="clear"></div>
	</div><!-- #main -->

	<div id="footer-wrapper">
		<footer id="colophon" role="contentinfo">
		<div class="centering-container">
				<?php
					/* A sidebar in the footer? Yep. You can can customize
					 * your footer with three columns of widgets.
					 */
					if ( ! is_404() )
						get_sidebar( 'footer' );
				?>
		</div>
		</footer><!-- #colophon -->
		
		<footer id="footer-nav">
		<div class="table center">
		<?php wp_nav_menu( array('menu' => 'Primary Navigation' )); ?>
		<div class="clear crush">&nbsp;</div>
		</div>
		</footer>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>