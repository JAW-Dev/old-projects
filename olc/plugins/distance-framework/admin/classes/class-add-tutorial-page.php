<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Add Tutorial Page
 *
 * @package     DFW
 * @subpackage  DFW/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Add_Tutorial_page' ) ) {
  class Add_Tutorial_page {

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() { 
      add_action( 'admin_menu', array( $this, 'add_tutorial_page' ) );
    } // end __construct

    /**
     * Tutorial Page
     *
     * @since      0.0.1
     * @return     void
     */
    public function add_tutorial_page() {
      add_menu_page( 
        __( 'WordPress Tutorials', 'dfw' ), 
        __( 'WP Tutorials', 'dfw' ), 
        'edit_posts', 
        'wp_tutorials', 
        array( $this, 'tutorial_page' ), 
        'dashicons-video-alt2'
      ); 
    } // end add_tutorial_page

    /**
     * Tutorial Page
     *
     * @since      Version
     * @return     Return
     */
    public function tutorial_page() {
      ?>
      <div class="wrap">
        <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
        <div class="dfw__wrapper">
        <?php
          if( have_rows( 'dfw_wordpress_tutorials' ) ) {
            while ( have_rows( 'dfw_wordpress_tutorials' ) ) {
              the_row();
              $dfw_wp_video_title = get_sub_field( 'dfw_wp_video_title', 'option' );
              $dfw_wp_video_embed = get_sub_field( 'dfw_wp_video_embed', 'option' );
              $iframe = $dfw_wp_video_embed;
              preg_match('/src="(.+?)"/', $iframe, $matches);
              $src = $matches[1];
              $params = array(
                  'controls' => 0,
                  'hd'       => 1,
                  'autohide' => 1
              );
              $new_src = add_query_arg($params, $src);
              $iframe = str_replace($src, $new_src, $iframe);
              $attributes = 'frameborder="0"';
              $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
              ?>
              <hr />
              <div class="dfw__tutorial">
                <h3 class="dfw__tutorial-title">
                  <?php echo $dfw_wp_video_title; ?>
                </h3>
                <div class="dfw__tutorial-video-wrapper">
                  <div class="dfw__tutorial-video">
                    <?php echo $dfw_wp_video_embed; ?>
                  </div>
                </div>
              </div>
              <?php
            }
          }
        ?>
        </div>
      </div>
      <?php
    } // end tutorial_page
  }
} // end Add_Tutorial_page