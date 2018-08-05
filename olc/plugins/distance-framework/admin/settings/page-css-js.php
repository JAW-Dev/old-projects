<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_56536d8e57a76',
  'title' => 'Page CSS and JavaScript',
  'fields' => array (
    array (
      'key' => 'field_56536da1b0c12',
      'label' => 'Enable Page CSS',
      'name' => 'dfw_enable_page_css',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    array (
      'key' => 'field_56536dcfb0c13',
      'label' => 'CSS',
      'name' => 'dfw_custom_page_css',
      'type' => 'code',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_56536da1b0c12',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'language' => 'css',
      'theme' => 'monokai',
    ),
    array (
      'key' => 'field_56536df1b0c14',
      'label' => 'Enable Page JavaScript',
      'name' => 'dfw_enable_page_javascript',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    array (
      'key' => 'field_56536e37b0c15',
      'label' => 'JavaScript',
      'name' => 'dfw_custom_page_javascript',
      'type' => 'code',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_56536df1b0c14',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'language' => 'javascript',
      'theme' => 'monokai',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
      ),
      array (
        'param' => 'current_user_role',
        'operator' => '==',
        'value' => 'administrator',
      ),
    ),
  ),
  'menu_order' => 100,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

endif;