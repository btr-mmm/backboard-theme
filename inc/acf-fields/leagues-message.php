<?php
function registerLeagueMessage()
{
  if (! function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_67c73cea59b80',
    'title' => 'League Page Content',
    'fields' => array(
      array(
        'key' => 'field_67c73cea9a942',
        'label' => 'Adding Leagues',
        'name' => '',
        'aria-label' => '',
        'type' => 'message',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => 'To add leagues, go to Leagues in the sidebar menu, or <a href="http://hlb.local/wp-admin/edit.php?post_type=league">click here</a>.',
        'new_lines' => 'wpautop',
        'esc_html' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page',
          'operator' => '==',
          'value' => '18',
        ),
      ),
    ),
    'menu_order' => -1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
    ),
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));
}

add_action('acf/include_fields', 'registerLeagueMessage');
