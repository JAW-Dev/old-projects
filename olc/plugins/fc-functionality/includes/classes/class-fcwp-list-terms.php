<?php
/**
 * List Terms
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_List_Terms' ) ) {
	class FCWP_List_Terms {

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
				'container'       => 'span',
				'container_id'    => '',
				'container_class' => 'meta__terms',
				'container_attr'  => '',
				'text'            => 'Category: ',
				'text_plural'     => 'Categories: ',
				'sep'             => ', ',
				'is_linked'       => true,
				'link_id'         => '',
				'link_class'      => '',
				'link_attr'       => 'rel="bookmark"',
				'taxonomies'      => array( 'category' ),
				'orderby'         => 'name',
				'order'           => 'ASC',
				'fields'          => 'all'

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
			$container_id    = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
			$container_class = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
			$container_attr  = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
			$text            = ( !empty( $this->args['text'] ) ? $this->args['text'] : "" );
			$text_plural     = ( !empty( $this->args['text_plural'] ) ? $this->args['text_plural'] : "" );
			$link_id         = ( !empty( $this->args['link_id'] ) ? 'id="' . $this->args['link_id'] . '"' : "" );
			$link_class      = ( !empty( $this->args['link_class'] ) ? 'class="' . $this->args['link_class'] . '"' : "" );
			$link_attr       = ( !empty( $this->args['link_attr'] ) ? $this->args['link_attr'] : "" );
			$string          = '';
			$terms           = wp_get_post_terms( get_the_ID(), $this->args['taxonomies'], $this->args );

			if ( ! empty( $terms ) ) {
			    $count = count( $terms );
			    $i = 0;
			    foreach ( $terms as $term ) {
			        $i++;
			        if ( $i == 1 ) {
			            $label = esc_html__( $text, FCWP_TAXDOMAIN );
			        } else {
			        	$label = esc_html__( $text_plural, FCWP_TAXDOMAIN );
			        }
			        if( $this->args['is_linked'] != true ) {
			        	$string .= $term->name;
			        } else {
			        	$string .= '<a href="' . get_term_link( $term ) . '" ' . $link_id . ' ' . $link_class  . ' ' . $link_attr . '>' . $term->name . '</a>';
			        }
			    	if ( $count != $i ) {
			            $string .= $this->args['sep'];
			        }
			    }
			    echo '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>' . 
				    	$label . $string . '
				     </' . $this->args['container'] . '>';
			}
		}
	}
}