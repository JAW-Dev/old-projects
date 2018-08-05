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

if( !class_exists( 'FCWP_Posts_Pagination' ) ) {
	class FCWP_Posts_Pagination {

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
			$previous   = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
			$next       = get_adjacent_post( false, '', false );
			if( !$next && !$previous ) {
				return;
			}
			add_filter( 'previous_post_link', array( $this, 'previous_posts_link_filter' ), 10, 5 );
			add_filter( 'next_post_link', array( $this, 'next_posts_link_filter' ) );
			$this->arguments();
			$this->display();
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
				'container_id'          => 'post-navigation-' . $paged,
				'container_class'       => 'navigation posts-navigation',
				'container_attr'        => 'aria-labelledby="post-navigation-heading-' . $paged . '" role="navigation"',
				'sr_conatiner'          => 'h1',
				'sr_id'                 => 'post-navigation-heading-' . $paged,
				'sr_class'              => 'screen-reader-text',
				'sr_attr'               => '',
				'sr_text'               => __('Post navigation', FCWP_TAXDOMAIN ),
				'links_container'       => 'div',
				'links_container_id'    => '',
				'links_container_class' => 'nav-links',
				'links_container_attr'  => 'aria-label="Pagination"',
				'next_container'        => 'div',
				'next_container_id'     => '',
				'next_container_class'  => 'nav-next',
				'next_container_attr'   => '',
				'prev_container'        => 'div',
				'prev_container_id'     => '',
				'prev_container_class'  => 'nav-prev',
				'prev_container_attr'   => '',
				'aria_prev'				=> 'Previous Post',
				'aria_next'				=> 'Next Post'
				
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
			$sr_text               = ( !empty( $this->args['sr_text'] ) ? __( $this->args['sr_text'], FCWP_TAXDOMAIN) : "" );
			$links_container_id    = ( !empty( $this->args['links_container_id'] ) ? 'id="' . $this->args['links_container_id'] . '"' : "" );
			$links_container_class = ( !empty( $this->args['links_container_class'] ) ? 'class="' . $this->args['links_container_class'] . '"' : "" );
			$links_container_attr  = ( !empty( $this->args['links_container_attr'] ) ? $this->args['links_container_attr'] : "" );
			$next_container_id     = ( !empty( $this->args['next_container_id'] ) ? 'id="' . $this->args['next_container_id'] . '"' : "" );
			$next_container_class  = ( !empty( $this->args['next_container_class'] ) ? 'class="' . $this->args['next_container_class'] . '"' : "" );
			$next_container_attr   = ( !empty( $this->args['next_container_attr'] ) ? $this->args['next_container_attr'] : "" );
			$prev_container_id     = ( !empty( $this->args['prev_container_id'] ) ? 'id="' . $this->args['prev_container_id'] . '"' : "" );
			$prev_container_class  = ( !empty( $this->args['prev_container_class'] ) ? 'class="' . $this->args['prev_container_class'] . '"' : "" );
			$prev_container_attr   = ( !empty( $this->args['prev_container_attr'] ) ? $this->args['prev_container_attr'] : "" );

	        echo '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>';
			echo '<' . $this->args['sr_conatiner'] . ' ' . $sr_id . ' ' . $sr_class  . ' ' . $sr_attr . '>' . esc_html__( $sr_text ) . '</' . $this->args['sr_conatiner'] . '>';
				echo '<' . $this->args['links_container'] . ' ' . $links_container_id . ' ' . $links_container_class  . ' ' . $links_container_attr . '>';
					previous_post_link( '<' . $this->args['prev_container'] . ' ' . $prev_container_id . ' ' . $prev_container_class  . ' ' . $prev_container_attr . '>%link</' . $this->args['prev_container'] . '>', '%title' );
					next_post_link( '<' . $this->args['next_container'] . ' ' . $next_container_id . ' ' . $next_container_class  . ' ' . $next_container_attr . '>%link</' . $this->args['next_container'] . '>', '%title' );
				echo '</' . $this->args['links_container'] . '>';  	
	        echo '</' . $this->args['container'] . '>';
		}

		/**
		 * Filter for previous_posts_link
		 *
		 * @since 0.0.1
         * @access public
         * @return string the filterd content
		 */
		public function previous_posts_link_filter( $link ) {
			$aria_prev = ( !empty( $this->args['aria_prev'] ) ? 'aria-label="' . $this->args['aria_prev'] . '"' : "" );
			$link = str_replace('rel="prev">', 'rel="prev" ' . $aria_prev . '>', $link);
			return $link;
		}

		/**
		 * Filter for next_posts_link
		 *
		 * @since 0.0.1
         * @access public
         * @return string the filterd content
		 */
		public function next_posts_link_filter( $link ) {
			$aria_next = ( !empty( $this->args['aria_next'] ) ? 'aria-label="' . $this->args['aria_next'] . '"' : "" );
			$link = str_replace('rel="next">', 'rel="next" ' . $aria_next . '>', $link);
			return $link;
		}
	}
}