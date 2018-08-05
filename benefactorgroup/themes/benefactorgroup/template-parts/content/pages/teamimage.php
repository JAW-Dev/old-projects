<?php
$team_member_image = ( get_field( 'team_member_image' ) ? get_field( 'team_member_image' ) : '' );
if( $team_member_image ) :
$memeber_alt = $team_member_image['alt'];
$memeber_base = $team_member_image['sizes']['page-large'];
$memeber_retina = $team_member_image['sizes']['page-large@2'];
?>
<div class="team__image">
    <a href="<?php the_permalink(); ?>">
        <img src="<?php echo $memeber_base ?>" alt="<?php echo $memeber_alt ?>" /></picture>
    </a>
</div>
<?php endif; ?>