<?php
/**
 * Public Init
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class FCWP_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->public_css();
		$this->public_js();
		$this->add_mimes();
    $this->rename_post();
	}

	/**
     * Load the public CSS
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
	protected function public_css() {
		new FCWP_Public_CSS();
	}

	/**
     * Load the public JS
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
	protected function public_js() {
		new FCWP_Public_JS();
	}

	/**
	 * Add Mimes
	 *
	 * @since      0.0.1
	 * @return     void
	 */
	protected function add_mimes() {
		$args = array(
			'svg' => 'image/svg+xml',
		);
		fcwp_add_mime( $args );
	} // end add_mimes

  /**
   * Rename Post
   *
   * @since      0.0.1
   * @return     void
   */
  protected function rename_post() {
    fcwp_rename_post( 'News', 'News' );
  } // end rename_post
}