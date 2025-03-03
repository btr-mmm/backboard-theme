<?php
function registerStaffPostType()
{
  register_post_type('staff', array(
    'labels' => array(
      'name' => 'Staff',
      'singular_name' => 'Staff',
      'menu_name' => 'Staff',
      'all_items' => 'All Staff',
      'edit_item' => 'Edit Staff',
      'view_item' => 'View Staff',
      'view_items' => 'View Staff',
      'add_new_item' => 'Add New Staff',
      'add_new' => 'Add New Staff',
      'new_item' => 'New Staff',
      'parent_item_colon' => 'Parent Staff:',
      'search_items' => 'Search Staff',
      'not_found' => 'No staff found',
      'not_found_in_trash' => 'No staff found in Trash',
      'archives' => 'Staff Archives',
      'attributes' => 'Staff Attributes',
      'insert_into_item' => 'Insert into staff',
      'uploaded_to_this_item' => 'Uploaded to this staff',
      'filter_items_list' => 'Filter staff list',
      'filter_by_date' => 'Filter staff by date',
      'items_list_navigation' => 'Staff list navigation',
      'items_list' => 'Staff list',
      'item_published' => 'Staff published.',
      'item_published_privately' => 'Staff published privately.',
      'item_reverted_to_draft' => 'Staff reverted to draft.',
      'item_scheduled' => 'Staff scheduled.',
      'item_updated' => 'Staff updated.',
      'item_link' => 'Staff Link',
      'item_link_description' => 'A link to a staff.',
    ),
    'public' => true,
    'show_in_nav_menus' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-admin-users',
    'supports' => array(
      0 => 'title',
      1 => 'thumbnail',
      2 => 'custom-fields',
    ),
    'delete_with_user' => false,
  ));
}

add_action('init', 'registerStaffPostType');
