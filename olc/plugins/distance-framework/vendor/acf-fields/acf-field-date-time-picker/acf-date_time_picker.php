<?php
class acf_custom_field_date_time_picker_plugin
{
	/*
	*  Construct
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function __construct()
	{
		load_plugin_textdomain( 'acf-field-date-time-picker', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// version 5+
		add_action('acf/include_field_types', array($this, 'include_field_types'));

		// version 4+
		add_action('acf/register_fields', array($this, 'register_fields'));


		// version 3-
		add_action( 'init', array( $this, 'init' ));
	}


	/*
	*  Init
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function init()
	{
		if(function_exists('register_field'))
		{
			register_field('acf_custom_field_date_time_picker', dirname(__File__) . '/date_time_picker-v3.php');
		}
	}

	/*
	*  register_fields
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function register_fields()
	{
		include_once('date_time_picker-v4.php');
	}


	function include_field_types()
	{
		include_once('date_time_picker-v5.php');
	}

}

new acf_custom_field_date_time_picker_plugin();

?>