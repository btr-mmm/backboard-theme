<?php
function registerOptionsSocialsField()
{
  if (! function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_67c5f8375592c',
    'title' => 'Social Media',
    'fields' => array(
      array(
        'key' => 'field_67c5f8377b271',
        'label' => 'Social Networks',
        'name' => 'socials',
        'aria-label' => '',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'table',
        'pagination' => 0,
        'min' => 0,
        'max' => 0,
        'collapsed' => '',
        'button_label' => 'Add Row',
        'rows_per_page' => 20,
        'sub_fields' => array(
          array(
            'key' => 'field_67c5f8467b272',
            'label' => 'Icon',
            'name' => 'icon',
            'aria-label' => '',
            'type' => 'font-awesome',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'icon_sets' => array(
              0 => 'brands',
            ),
            'custom_icon_set' => '',
            'default_label' => '&lt;i class="fa-classic fa-brands fa-facebook-f fa-fw"&gt;&lt;/i&gt; Facebook F',
            'default_value' => '{"family" : "classic", "style" : "brands", "id" : "facebook-f", "label" : "Facebook F", "unicode" : "f39e"}',
            'save_format' => 'class',
            'allow_null' => 0,
            'show_preview' => 1,
            'enqueue_fa' => 1,
            'allow_in_bindings' => 0,
            'fa_live_preview' => '',
            'choices' => array(),
            'parent_repeater' => 'field_67c5f8377b271',
          ),
          array(
            'key' => 'field_67c5f8817b273',
            'label' => 'Network Name',
            'name' => 'network_name',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 'Facebook',
            'maxlength' => '',
            'allow_in_bindings' => 0,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'parent_repeater' => 'field_67c5f8377b271',
          ),
          array(
            'key' => 'field_67c5f88d7b274',
            'label' => 'Profile Link',
            'name' => 'link',
            'aria-label' => '',
            'type' => 'url',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'allow_in_bindings' => 0,
            'placeholder' => '',
            'parent_repeater' => 'field_67c5f8377b271',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'backboard-theme',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));
}

add_action('acf/include_fields', 'registerOptionsSocialsField');
