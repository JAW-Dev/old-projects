<?php

class acf_field_code extends acf_field {

  /**
   * Initialize the class
   *
   * @since    0.0.1
   */
  public function __construct() {
    $this->name = 'code';
    $this->label = __( 'Code Editor', 'dfw' );
    $this->category = 'content';
    $this->defaults = [
        'language'    => 'css',
        'theme'       => 'monokai',
    ];
    $this->l10n = [
        'error'    => __( 'Error! Please enter a higher value', 'dfw' ),
    ];
    parent::__construct();
  }

  /**
   * render_field_settings()
   *
   * Create extra settings for your field. These are visible when editing a field
   *
   * @since     0.0.1
   * @param     $field (array) the $field being edited
   * @return    void
   */
  public function render_field_settings($field) {
    acf_render_field_setting($field, [
      'label'             => __( 'Language', 'dfw' ),
      'instructions'      => __( 'Language to use for highlighting.', 'dfw' ),
      'type'              => 'select',
      'name'              => 'language',
      'choices'           => [
        'css'          => __( 'css', 'dfw' ),
        'html'         => __( 'html', 'dfw' ),
        'javascript'   => __( 'javascript', 'dfw' ),
      ],
    ]);

    acf_render_field_setting($field, [
      'label'             => __( 'Theme', 'dfw' ),
      'instructions'      => __( 'Theme to use for highlighting.', 'dfw' ),
      'type'              => 'select',
      'name'              => 'theme',
      'choices'           => [
        __( 'Bright', 'dfw' ) => [
          'chrome'          => __( 'Chrome', 'dfw' ),
          'clouds'          => __( 'Clouds', 'dfw' ),
          'crimson_editor'  => __( 'Crimson Editor', 'dfw' ),
          'dawn'            => __( 'Dawn', 'dfw' ),
          'dreamweaver'     => __( 'Dreamweaver', 'dfw' ),
          'eclipse'         => __( 'Eclipse', 'dfw' ),
          'github'          => __( 'GitHub', 'dfw' ),
          'solarized_light' => __( 'Solarized Light', 'dfw' ),
          'textmate'        => __( 'TextMate', 'dfw' ),
          'tomorrow'        => __( 'Tomorrow', 'dfw' ),
          'xcode'           => __( 'XCode', 'dfw' ),
          'kuroir'          => __( 'Kuroir', 'dfw' ),
          'katzenmilch'     => __( 'KatzenMilch', 'dfw' ),
        ],
        __( 'Dark', 'dfw' ) => [
          'ambiance'                => __( 'Ambiance', 'dfw' ),
          'chaos'                   => __( 'Chaos', 'dfw' ),
          'clouds_midnight'         => __( 'Clouds Midnight', 'dfw' ),
          'cobalt'                  => __( 'Cobalt', 'dfw' ),
          'idle_fingers'            => __( 'idle Fingers', 'dfw' ),
          'kr_theme'                => __( 'krTheme', 'dfw' ),
          'merbivore'               => __( 'Merbivore', 'dfw' ),
          'merbivore_soft'          => __( 'Merbivore Soft', 'dfw' ),
          'mono_industrial'         => __( 'Mono Industrial', 'dfw' ),
          'monokai'                 => __( 'Monokai', 'dfw' ),
          'pastel_on_dark'          => __( 'Pastel on dark', 'dfw' ),
          'solarized_dark'          => __( 'Solarized Dark', 'dfw' ),
          'terminal'                => __( 'Terminal', 'dfw' ),
          'tomorrow_night'          => __( 'Tomorrow Night', 'dfw' ),
          'tomorrow_night_blue'     => __( 'Tomorrow Night Blue', 'dfw' ),
          'tomorrow_night_bright'   => __( 'Tomorrow Night Bright', 'dfw' ),
          'tomorrow_night_eighties' => __( 'Tomorrow Night 80s', 'dfw' ),
          'twilight'                => __( 'Twilight', 'dfw' ),
          'vibrant_ink'             => __( 'Vibrant Ink', 'dfw' ),
        ],
      ],
    ]);
  }

  /**
   * render_field()
   *
   * Create the HTML interface for your field
   *
   * @since     0.0.1
   * @param     $field (array) the $field being edited
   * @return    void
   */
  public function render_field($field) {
    $html = '<textarea class="hidden" name="' . esc_attr($field['name']) . '" data-language="' . $field['language'] . '" data-theme="' . $field['theme'] . '"></textarea>';
    $html .= '<div class="editor" style="width: 100%;">' . esc_html($field['value']) . '</div>';
    echo $html;
  }

  /**
   * input_admin_enqueue_scripts()
   *
   * This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
   * Use this action to add CSS + JavaScript to assist your render_field() action.
   *
   * @since     0.0.1
   * @return    void
   */
  public function input_admin_enqueue_scripts() {
    wp_register_script( 'ace', DFW_PL_PLUGIN_URL . 'vendor/acf-fields/acf-field-code-editor/third-party/ace-builds/src-min-noconflict/ace.js', DFW_PL_VERSION, true );
    wp_register_script( 'acf-input-code', DFW_PL_PLUGIN_URL . 'vendor/acf-fields/acf-field-code-editor/js/input.js', array( 'ace' ), DFW_PL_VERSION, true );
    wp_enqueue_script( 'acf-input-code' );
  }

  /**
   * format_value()
   *
   * This filter is appied to the $value after it is loaded from the db and before it is returned to the template
   *
   * @since     1.0.1
   * @param     $value (mixed) the value which was loaded from the database
   * @param     $post_id (mixed) the $post_id from which the value was loaded
   * @param     $field (array) the field array holding all the field options
   * @return    void
   */   
  public function format_value( $value, $post_id, $field ) {
    switch( $field["language"]){
      case 'css':
        return $value;
        break;
      case 'javascript':
        return $value;
        break;
      case 'htmlmixed':
        return nl2br($value);
        break;
      default:
      return $value;
    }
    return $value;
  }
}
new acf_field_code();