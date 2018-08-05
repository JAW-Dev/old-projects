<?php
if( function_exists('acf_add_local_field_group') ):
  acf_add_local_field_group(array (
    'key' => 'group_56450006c06d4',
    'title' => 'Tutorial Videos',
    'fields' => array (
      array (
        'key' => 'field_5645000e832e9',
        'label' => 'Tutorial Videos',
        'name' => 'dfw_training_videos',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => '',
        'max' => '',
        'layout' => 'table',
        'button_label' => 'Add Row',
        'sub_fields' => array (
          array (
            'key' => 'field_5645009c02ff3',
            'label' => 'Title',
            'name' => 'dfw_tut_video_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
          ),
          array (
            'key' => 'field_564500af02ff4',
            'label' => 'Video',
            'name' => 'dfw_tut_video',
            'type' => 'oembed',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'width' => 148,
            'height' => 85,
          ),
        ),
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-tutorial-videos',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
endif;