<?php
/**
 * Import GF Form
 *
 * @package    DFW
 * @subpackage DFW/Admin/Classes
 * @since      0.0.15
 */

if( !class_exists( 'Import_GF_Form' ) ) {
  class Import_GF_Form {

    /**
     * $form_name
     *
     * @since  0.0.15
     * @var    string $form_name the name of the form
     */
    protected $form_name;

    /**
     * File
     *
     * @since  0.0.15
     * @var    string $filepath the path to the .json filepath
     */
    protected $filepath;

    /**
     * Initialize the class
     *
     * @since 0.0.15
     */
    public function __construct( $form_name, $filepath ) {
      $this->form_name = $form_name;
      $this->filepath  = $filepath;
      $this->importSupportFiles();
    } // end __construct

    /**
     * Import Supposrt Files
     *
     * @since  1.0.0
     * @return void
     */
    public function importSupportFiles() {
      if ( class_exists( 'GFForms' ) ) {
        require_once( GFCommon::get_base_path() . '/export.php' );
      }
    } // end importSupportFiles

    /**
     * Import
     *
     * @since      0.0.15
     * @return     void
     */
    public function import() {
      global $wpdb;
      if ( class_exists( 'GFForms' ) ) {
        $table_name = $wpdb->prefix . 'rg_form_meta';
        if( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
          GFForms::setup_database();
        }
        if( !$this->if_form_exists( $this->form_name ) ) {
          GFExport::import_file( $this->filepath );
        }
      }
    } // end Import

    /**
     * If Form Exists
     *
     * @since      0.0.15
     * @return     boolean
     */
    public function if_form_exists( $form_name  ) {
      if ( class_exists( 'GFForms' ) ) {
        $forms = GFFormsModel::get_forms();
        foreach( $forms as $form ) {
          if( $form->title == $form_name ) {
            return true;
          }
        }
      }
      return false;
    } // end if_form_exists

  }
} // end Import_GF_Form