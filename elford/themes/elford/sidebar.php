<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>



<?php   if ( types_render_field("proj-testimonial", array())) { ?>

		<div id="secondary" class="widget-project-specific" role="complementary">
        
        	<?php
$testimonial = types_render_field("proj-testimonial", array("output"=>"html"));
$name = types_render_field("proj-testimonial-name", array("output"=>"html"));
$title = types_render_field("proj-testimonial-name-title", array("output"=>"html"));
?> 
 
<h3 class='widget-title'><?php echo get_the_title(); ?> Testimonals</h3>
<?php printf($testimonial); ?>
<span class="testimonialswidget_author">
<?php printf($name); ?>
<?php printf($title); ?></span>
</div>

<?php } else { ?>

<div id="secondary" class="widget-area" role="complementary">
        
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<?php endif; // end sidebar widget area ?>
            
            
            
		</div><!-- #secondary .widget-area -->
        
        <?php } ?>
        
<?php endif; ?> 