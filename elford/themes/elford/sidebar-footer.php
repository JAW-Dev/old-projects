<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" <?php twentyeleven_footer_sidebar_class(); ?>>

	<div id="first" class="widget-area" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
        <?php endif; ?>
		<div class="copyright">
			©2012 ELFORD, Inc.All rights reserved.
		</div>
	</div><!-- #first .widget-area -->

	<div id="second" class="widget-area" role="complementary">
		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
		<?php endif; ?>
	</div><!-- #second .widget-area -->

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div id="third" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
</div><!-- #supplementary -->