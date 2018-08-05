<?php
/**
 * Public Init
 *
 * @package     SWF
 * @subpackage  SWF/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class SWF_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->public_css();
          $this->register_post_type();
          $this->register_taxonomy();
	}

	/**
     * Load the public CSS
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
	protected function public_css() {
		new SWF_Public_CSS();
	}

	/**
     * Register custom post type
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
	protected function register_post_type() {
		$partners_post_type = new SWF_Register_Post_Type( 'Partners' );
	}

	/**
     * Register taxonomy
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
	protected function register_taxonomy() {
		$register_partner_type_taxonomy = new SWF_Register_Taxonomies( 'partners', 'Partner Type' );
	}
}