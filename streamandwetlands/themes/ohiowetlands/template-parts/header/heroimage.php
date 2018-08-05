<?php
$header_bg_id = get_post_meta( get_the_ID(), 'swf_header_background' );
$header_bg = wp_get_attachment_url( $header_bg_id[0] );
$swf_header_text_heading = ( get_field( 'swf_header_text_heading' ) ? get_field( 'swf_header_text_heading' ) : '' );
$swf_header_text_body = ( get_field( 'swf_header_text_body' ) ? get_field( 'swf_header_text_body' ) : '' );
$swf_header_url = ( get_field( 'swf_header_url' ) ? get_field( 'swf_header_url' ) : '' );
$swf_header_link_text = ( get_field( 'swf_header_link_text' ) ? get_field( 'swf_header_link_text' ) : '' );
if( $header_bg_id ) :
?>
<figure class="header__bg">
	<img src="<?php echo $header_bg; ?>" alt="Background Image">
	<figcaption class="header__text">
		<?php if( $swf_header_text_heading != '' ) : ?>
		<span class="header__text--heading">
			<h2><?php echo $swf_header_text_heading; ?></h2>
		</span>
		<?php
		endif;
		if( $swf_header_text_body != '' ) :
		?>
		<span class="header__text--body">
			<p><?php echo $swf_header_text_body; ?></p>
		</span>
		<?php
		endif;
		if( $swf_header_url != '' ) :
		?>
		<span class="header__text--link">
			<a href="<?php echo $swf_header_url; ?>"><?php echo $swf_header_link_text; ?></a>
		</span>
		<?php endif; ?>
	</figcaption>
</figure>
<?php endif; ?>
