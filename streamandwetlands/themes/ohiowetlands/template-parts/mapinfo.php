<?php
$swf_mitigation_display = ( get_field( 'swf_mitigation_display' ) ? get_field( 'swf_mitigation_display' ) : '' );
$swf_mitigation_site_data = ( get_field( 'swf_mitigation_site_data' ) ? get_field( 'swf_mitigation_site_data' ) : '' );
$swf_mititgation_habitat = ( get_field( 'swf_mititgation_habitat' ) ? get_field( 'swf_mititgation_habitat' ) : '' );
$swf_maitigation_service_area = ( get_field( 'swf_maitigation_service_area' ) ? get_field( 'swf_maitigation_service_area' ) : '' );
$swf_mitigation_stewardship = ( get_field( 'swf_mitigation_stewardship' ) ? get_field( 'swf_mitigation_stewardship' ) : '' );
$swf_mitigation_description = ( get_field( 'swf_mitigation_description' ) ? get_field( 'swf_mitigation_description' ) : '' );
$swf_mitigation_map_link = ( get_field( 'swf_mitigation_map_link' ) ? get_field( 'swf_mitigation_map_link' ) : '' );
?>
<div class="mitigation__info">
    <div class="overlay"></div>
    <h2 class="mitigation__title"><?php the_title(); ?></h2>
    <?php
    if( $swf_mitigation_display == 'child' ) :
        $args = array(
                'child_of'     => get_the_ID(),
                'title_li'     => '',
            );
        ?>
        <div class="mitigation__content">
            <ul class="mitigation__child-listing">
            <?php if( is_page('ohio') ) : ?>
                <li>
                  <a class="map-button" href="<?php echo $swf_mitigation_map_link; ?>">
                      <strong><?php _e( 'Go To Interactive Service Area Map', 'swf' ); ?></strong>
                  </a>
                </li>
            <?php endif; ?>
            <?php wp_list_pages( $args ); ?>
            </ul>
        </div>
    <?php else : ?>
        <div class="panel-group" id="accordion">
            <?php if( $swf_mitigation_map_link != '' ) : ?>
                <div class="panel panel-map panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="map-button" href="<?php echo $swf_mitigation_map_link; ?>">
                                <strong><?php _e( 'Go To Interactive Service Area Map', 'swf' ); ?></strong>
                            </a>
                        </h4>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( $swf_mitigation_site_data != '' ) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                                <?php _e( 'Site Data', 'swf' ); ?>
                            </a>
                        </h4>
                    </div>

                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php echo $swf_mitigation_site_data; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( $swf_mititgation_habitat != '' ) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                                <?php _e( 'Habitat', 'swf' ); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $swf_mititgation_habitat; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( $swf_mitigation_stewardship != '' ) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                                <?php _e( 'Stewardship', 'swf' ); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            if( have_rows('swf_mitigation_stewardship') ):
                                while ( have_rows('swf_mitigation_stewardship') ) : the_row();
                                $image = get_sub_field( 'swf_mit_stew_image' );
                                $desc = get_sub_field( 'swf_mit_stew_description' );
                            ?>
                                <div class="stewart__image">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </div>
                                <div class="stewart__desc">
                                    <?php echo $desc; ?>
                                </div>
                            <?php
                                    the_sub_field('sub_field_name');
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( $swf_mitigation_description != '' ) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                                <?php _e( 'Description', 'swf' ); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $swf_mitigation_description; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>
