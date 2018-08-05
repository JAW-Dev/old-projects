<?php
/**
 * Posts Pagination
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Link_pages' ) ) {
	class FCWP_Link_pages {

		/**
		 * The arguments
		 * 
		 * @var array
		 */
		public $args;

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 * @param array $args the class arguments
		 */
		public function __construct( $args = array() ) {
			$this->args = $args;
			$this->arguments();
			$this->display();
			add_action( 'wp_footer', array( $this, 'load_public_js' ) );
		}

		/**
		 * The class arguments
		 *
		 * @global $paged the paged number
		 * 
		 * @since 0.0.1
         * @access private
         * @return void
		 */
		private function arguments() {
			global $paged;
			$defaults = array(
				'container'             => 'nav',
				'container_id'          => 'linked-pages-navigation-' . $paged,
				'container_class'       => 'navigation posts-navigation',
				'container_attr'        => 'aria-labelledby="linked-pages-navigation-heading-' . $paged . '" role="navigation"',
				'sr_conatiner'          => 'h1',
				'sr_id'                 => 'linked-pages-navigation-heading-' . $paged,
				'sr_class'              => 'screen-reader-text',
				'sr_attr'               => '',
				'sr_text'               => __('Posts navigation', FCWP_TAXDOMAIN ),
				'links_container'       => 'div',
				'links_container_id'    => '',
				'links_container_class' => 'page-links',
				'links_container_attr'  => 'aria-label="Pagination"',
				'before'                => esc_html__( 'Pages: ', FCWP_TAXDOMAIN ),
				'after'                 => '',
				'link_before'           => '',
				'link_after'            => '',
				'next_or_number'        => 'number',
				'separator'             => ' ',
				'nextpagelink'          => __( 'Next page' ),
				'previouspagelink'      => __( 'Previous page' ),
				'pagelink'              => '%',
				'echo'                  => 1
				
			);
	        $this->args = array_merge( $defaults, $this->args );
		}

		/**
		 * Display the pagination
		 *
		 * @since 0.0.1
         * @access private
         * @return string the html output for the pagination
		 */
		private function display() {
			
			$container_id          = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
			$container_class       = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
			$container_attr        = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
			$sr_id                 = ( !empty( $this->args['sr_id'] ) ? 'id="' . $this->args['sr_id'] . '"' : "" );
			$sr_class              = ( !empty( $this->args['sr_class'] ) ? 'class="' . $this->args['sr_class'] . '"' : "" );
	   		$sr_attr               = ( !empty( $this->args['sr_attr'] ) ? $this->args['sr_attr'] : "" );
	   		$links_container_class = ( !empty( $this->args['links_container_class'] ) ? 'class="' . $this->args['links_container_class'] . '"' : "" );
			$links_container_id    = ( !empty( $this->args['links_container_id'] ) ? 'id="' . $this->args['links_container_id'] . '"' : "" );
			$links_container_attr  = ( !empty( $this->args['links_container_attr'] ) ? $this->args['links_container_attr'] : "" );

	        echo '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>';
			echo '<' . $this->args['sr_conatiner'] . ' ' . $sr_id . ' ' . $sr_class  . ' ' . $sr_attr . '>' . esc_html__( $this->args['sr_text'] ) . '</' . $this->args['sr_conatiner'] . '>';
				echo '<' . $this->args['links_container'] . ' ' . $links_container_id . ' ' . $links_container_class  . ' ' . $links_container_attr . '>';
					wp_link_pages( $this->args );
				echo '</' . $this->args['links_container'] . '>';
	        echo '</' . $this->args['container'] . '>';
		}

		/**
		 * Load required JavaScript
		 *
		 * @since 0.0.1
         * @access public
         * @return void
		 */
		public function load_public_js() {
			wp_register_script( 'fcwp-page-links.js', FCWP_PL_PLUGIN_URL . 'includes/js/page-links.js',  array( 'jquery' ), FCWP_PL_VERSION, true );
	    	wp_enqueue_script( 'fcwp-page-links.js' );
		}
	}
}