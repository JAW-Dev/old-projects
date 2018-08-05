<?php
$team_member_title = ( get_field( 'team_member_title' ) ? get_field( 'team_member_title' ) : '' );
$team_member_email = ( get_field( 'team_member_email' ) ? get_field( 'team_member_email' ) : '' );
$bene_email_name = ( get_field( 'bene_email_name' ) ? get_field( 'bene_email_name' ) : '' );
if( $team_member_email ) :
?>
<em><?php echo $team_member_title; ?></em> | <a href="mailto:<?php echo $team_member_email; ?>">Email <?php echo $bene_email_name; ?></a>
<?php else : ?>
	<a href="mailto:info@benefactorgroup.com">Email Benefactor<?php echo $bene_email_name; ?></a>
<?php endif; ?>