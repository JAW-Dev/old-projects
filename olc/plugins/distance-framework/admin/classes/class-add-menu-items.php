<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Add Custom Menu Items
 *
 * @package     DFW
 * @subpackage  DFW/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Add_Menu_Items' ) ) {
	class Add_Menu_Items {

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() { 
    	if( class_exists( 'acf' ) ) {
        $this->add_distance_settings();
        $this->add_distance_general();
        $this->add_distance_template_functions();
        $this->add_distance_tutorial_videos();
    		$this->add_social_settings();
    		$this->add_company_settings();
    		$this->add_logos_settings();
    	}
      add_action( 'admin_menu', array( $this, 'tutorials_page' ) );
      //add_action( 'admin_menu', array( $this, 'support_page' ) );
    }

    /**
     * Add Distance settings page
     *
     * @since 0.0.1
     * @return void
     */
    public function add_distance_settings(){
      if( function_exists( 'acf_add_options_page') ) {
        acf_add_options_page( array( 
          'page_title'  => 'Distance Settings',
          'menu_slug'   => 'distance_settings',
        ) );
      }
    }

    /**
     * Add Distance settings general subpage
     *
     * @since 0.0.1
     * @return void
     */
    public function add_distance_general(){
      if( function_exists( 'acf_add_options_sub_page') ) {
        acf_add_options_sub_page( array( 
          'page_title'  => 'General Settings',
          'parent_slug' => 'distance_settings'
        ) );
      }
    }

    /**
     * Add Distance settings template functions subpage
     *
     * @since 0.0.1
     * @return void
     */
    public function add_distance_template_functions(){
      if( function_exists( 'acf_add_options_sub_page') ) {
        acf_add_options_sub_page( array( 
          'page_title'  => 'Template Functions',
          'parent_slug' => 'distance_settings'
        ) );
      }
    }

    /**
     * Add Distance tutorial videos
     *
     * @since 0.0.1
     * @return void
     */
    public function add_distance_tutorial_videos(){
      if( function_exists( 'acf_add_options_sub_page') ) {
        acf_add_options_sub_page( array( 
          'page_title'  => 'Tutorial Videos',
          'parent_slug' => 'distance_settings'
        ) );
      }
    }

	/**
     * Add social settings page
     *
     * @since 0.0.1
     * @return void
     */
		public function add_social_settings(){
		  if( function_exists( 'acf_add_options_sub_page') ) {
				acf_add_options_sub_page( array( 
					'page_title'  => 'Social Links',
					'parent_slug' => 'options-general.php'
				) );
			}
		}

	/**
     * Add company settings page
     *
     * @since 0.0.1
     * @return void
     */
		public function add_company_settings(){
		  if( function_exists( 'acf_add_options_sub_page') ) {
				acf_add_options_sub_page( array( 
					'page_title'  => 'Company Information',
					'parent_slug' => 'options-general.php'
				) );
			}
		}

    /**
     * Add logos settings page
     *
     * @since 0.0.1
     * @return void
     */
		public function add_logos_settings(){
		  if( function_exists( 'acf_add_options_sub_page') ) {
				acf_add_options_sub_page( array( 
					'page_title'  => 'Logos',
					'parent_slug' => 'themes.php'
				) );
			}
		}

    /**
     * Video Tutorial Page
     *
     * @since      0.0.1
     * @return     void
     */
    public function tutorials_page() {
      add_menu_page( 
        'WordPress Tutorials', 
        'WP Tutorials', 
        'edit_posts', 
        'dfw_tutorials', 
        array( $this, 'tutorials_page_display' ), 
        'dashicons-video-alt2'
      );
    } // end tutorials_page

    /**
     * Video Page
     *
     * @since      0.0.1
     * @return     void
     */
    public function tutorials_page_display() {
      include DFW_PL_PLUGIN_DIR . 'admin/views/tutorials-page.php';
    } // end tutorials_page_display

    /**
     * Support Page
     *
     * @since      0.0.15
     * @return     void
     */
    public function support_page() {
      add_menu_page( 
        'Support Form', 
        'Support Form', 
        'edit_posts', 
        'dfw_support', 
        array( $this, 'support_page_display' ), 
        'dashicons-phone'
      );
    } // end support_page

    /**
     * Video Page
     *
     * @since      0.0.15
     * @return     void
     */
    public function support_page_display() {
      include DFW_PL_PLUGIN_DIR . 'admin/views/support-page.php';
    } // end tutorials_page_display
  }
} // end Add_Menu_Items