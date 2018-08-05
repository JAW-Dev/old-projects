<?php
/**
 * Published Date
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCPW_Published_Date' ) ) {
	class FCPW_Published_Date {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct( $args = array() ) {
			$this->args = $args;
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
			$defaults = array(
				'format'                    => 'F j, Y',
				'show_modified'             => false,
				'is_linked_published'       => true,
				'is_linked_modified'        => true,
				'container'                 => 'span',
				'container_id'              => '',
				'container_class'           => 'meta__date',
				'container_attr'            => '',
				'published_container'       => 'span',
				'published_container_id'    => '',
				'published_container_class' => 'date__published',
				'published_container_attr'  => 'aria-label="Date Published"',
				'published_link_id'         => '',
				'published_link_class'      => '',
				'published_link_attr'       => 'rel="bookmark',
				'modified_container'        => 'span',
				'modified_container_id'     => '',
				'modified_container_class'  => 'date__modified',
				'modified_container_attr'   => 'aria-label="Date Modified"',
				'modified_link_id'          => '',
				'modified_link_class'       => '',
				'modified_link_attr'        => 'rel="bookmark',
				'published_id'              => '',
				'published_class'           => 'time__published published',
				'published_attr'            => 'datetime="%1$s"',
				'published_text'            => 'Published On: ',
				'modified_id'               => '',
				'modified_class'            => 'time__modified updated',
				'modified_attr'             => 'datetime="%3$s"',
				'modified_text'             => 'Modifided On: '
			);
	        $this->args = array_merge( $defaults, $this->args );
		}

		/**
		 * Display the published time
		 *
		 * @since 0.0.1
         * @access public
         * @return string the html output for the published time
		 */
		public function display() {
			$container_id              = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
			$container_class           = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
			$container_attr            = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
			$published_container_id    = ( !empty( $this->args['published_container_id'] ) ? 'id="' . $this->args['published_container_id'] . '"' : "" );
			$published_container_class = ( !empty( $this->args['published_container_class'] ) ? 'class="' . $this->args['published_container_class'] . '"' : "" );
			$published_container_attr  = ( !empty( $this->args['published_container_attr'] ) ? $this->args['published_container_attr'] : "" );
			$modified_container_id     = ( !empty( $this->args['modified_container_id'] ) ? 'id="' . $this->args['modified_container_id'] . '"' : "" );
			$modified_container_class  = ( !empty( $this->args['modified_container_class'] ) ? 'class="' . $this->args['modified_container_class'] . '"' : "" );
			$modified_container_attr   = ( !empty( $this->args['modified_container_attr'] ) ? $this->args['modified_container_attr'] : "" );
			$published_text            = ( !empty( $this->args['published_text'] ) ? $this->args['published_text'] : "" );
			$modified_text             = ( !empty( $this->args['modified_text'] ) ? $this->args['modified_text'] : "" );
			$string                    = '';
			
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) && $this->args[ 'show_modified' ] == true ) {
				$string = '<' . $this->args['published_container'] . ' ' . $published_container_id . ' ' . $published_container_class  . ' ' . $published_container_attr . '>' .
									esc_html__( $published_text, FCWP_TAXDOMAIN ) . $this->is_linked_published() . '
								</' . $this->args['published_container'] . '>
								<' . $this->args['modified_container'] . ' ' . $modified_container_id . ' ' . $modified_container_class  . ' ' . $modified_container_attr . '>' .
									esc_html__( $modified_text, FCWP_TAXDOMAIN ) . $this->is_linked_modified() . '
								</' . $this->args['modified_container'] . '>';
			} else {
				$string = '<' . $this->args['published_container'] . ' ' . $published_container_id . ' ' . $published_container_class  . ' ' . $published_container_attr . '>' .
									esc_html__( $published_text, FCWP_TAXDOMAIN ) . $this->is_linked_published() . '
								</' . $this->args['published_container'] . '>';
			}
			$string = sprintf( $string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date( $this->args['format'] ) ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date( $this->args['format'] ) )
			);
			echo '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>' . $string . '</' . $this->args['container'] . '>';
		}

		/**
		 * Determine if date published is linked
		 *
		 * @since 0.0.1
	     * @access private
	     * @return string the date published
		 */
		private function is_linked_published() {
			$published_id         = ( !empty( $this->args['published_id'] ) ? 'id="' . $this->args['published_id'] . '"' : "" );
			$published_class      = ( !empty( $this->args['published_class'] ) ? 'class="' . $this->args['published_class'] . '"' : "" );
			$published_attr       = ( !empty( $this->args['published_attr'] ) ? $this->args['published_attr'] : "" );
			$published_link_id    = ( !empty( $this->args['published_link_id'] ) ? 'id="' . $this->args['published_link_id'] . '"' : "" );
			$published_link_class = ( !empty( $this->args['published_link_class'] ) ? 'class="' . $this->args['published_link_class'] . '"' : "" );
			$published_link_attr  = ( !empty( $this->args['published_link_attr'] ) ? $this->args['published_link_attr'] : "" );
			$string               = '';

			if( $this->args['is_linked_published'] != true ) {
				$string = '<time ' . $published_id . ' ' . $published_class . ' ' . $published_attr . '>%2$s</time>';
			} else {
				$string = '<a href="' . esc_url( get_permalink() ) . '" ' . $published_link_id . ' ' . $published_link_class  . ' ' . $published_link_attr . '><time ' . $published_id . ' ' . $published_class . ' ' . $published_attr . '>%2$s</time></a>';
			}

			return $string;
		}

		/**
		 * Determine if date midified is linked
		 *
		 * @since 0.0.1
	     * @access private
	     * @return string the date modified
		 */
		private function is_linked_modified() {
			$modified_id         = ( !empty( $this->args['modified_id'] ) ? 'id="' . $this->args['modified_id'] . '"' : "" );
			$modified_class      = ( !empty( $this->args['modified_class'] ) ? 'class="' . $this->args['modified_class'] . '"' : "" );
			$modified_attr       = ( !empty( $this->args['modified_attr'] ) ? $this->args['modified_attr'] : "" );
			$modified_link_id    = ( !empty( $this->args['modified_link_id'] ) ? 'id="' . $this->args['modified_link_id'] . '"' : "" );
			$modified_link_class = ( !empty( $this->args['modified_link_class'] ) ? 'class="' . $this->args['modified_link_class'] . '"' : "" );
			$modified_link_attr  = ( !empty( $this->args['modified_link_attr'] ) ? $this->args['modified_link_attr'] : "" );
			$string              = '';

			if( $this->args['is_linked_modified'] != true ) {
				$string = '<time ' . $modified_id . ' ' . $modified_class . ' ' . $modified_attr . '>%2$s</time>';
			} else {
				$string = '<a href="' . esc_url( get_permalink() ) . '" ' . $modified_link_id . ' ' . $modified_link_class  . ' ' . $modified_link_attr . '><time ' . $modified_id . ' ' . $modified_class . ' ' . $modified_attr . '>%2$s</time></a>';
			}

			return $string;
		}
	}
}