<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    $bene_hp_hero_image        = ( get_field( 'bene_hp_hero_image' ) ? get_field( 'bene_hp_hero_image' ) : '' );
    $bene_hp_hero_image_mobile = ( get_field( 'bene_hp_hero_image_mobile' ) ? get_field( 'bene_hp_hero_image_mobile' ) : '' );
    $bene_hp_hero_text         = ( get_field( 'bene_hp_hero_text' ) ? get_field( 'bene_hp_hero_text' ) : '' );
    $bene_hero_image_link_type = ( get_field( 'bene_hero_image_link_type' ) ? get_field( 'bene_hero_image_link_type' ) : '' );
    $bene_hero_image_url       = ( get_field( 'bene_hero_image_url' ) ? get_field( 'bene_hero_image_url' ) : '' );
    $bene_hero_image_page_link = ( get_field( 'bene_hero_image_page_link' ) ? get_field( 'bene_hero_image_page_link' ) : '' );
    $hero_link                 = ( $bene_hero_image_link_type == 'url' ) ? $bene_hero_image_url : $bene_hero_image_page_link;
    $html =  '<figure class="hero-image">
                <img class="hero-image__full" src="' . $bene_hp_hero_image['url'] . '" alt="' . $bene_hp_hero_image['alt'] . '" />
                <img class="hero-image__mobile" src="' . $bene_hp_hero_image_mobile['url'] . '" alt="' . $bene_hp_hero_image_mobile['alt'] . '" />
                <figcaption class="hero-image__caption">
                  <div class="hero-image__overlay"></div>
                  <span class="hero-image__caption-text rockwell">' . $bene_hp_hero_text . '</span>
                </figcaption>
              </figure>
              <div class="hero-image__mobile-caption">
                <span class="hero-image__caption-text rockwell">' . $bene_hp_hero_text . '</span>
              </div>';
    fcwp_if_has_link( $hero_link, $html );
  endwhile;
endif;
wp_reset_postdata();