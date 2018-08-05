<?php
$elf_image = ( get_field( 'elf_image' ) ? get_field( 'elf_image' ) : '' );
?>
<div id="portfolio-slider" class="centering-container home" >
<?php if( $elf_image ) : ?>
  <img class="hero-image" src="<?php echo $elf_image['url']; ?>" alt="<?php echo $elf_image['alt']; ?>" />
<?php endif; ?>
</div>