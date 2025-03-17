<?php add_action('init', 'registerProgramPostType');

function registerProgramPostType()
{
  register_post_type('program', array(
    'labels' => array(
      'name' => 'Programs',
      'singular_name' => 'Program',
      'menu_name' => 'Programs',
      'all_items' => 'All Programs',
      'edit_item' => 'Edit Program',
      'view_item' => 'View Program',
      'view_items' => 'View Programs',
      'add_new_item' => 'Add New Program',
      'add_new' => 'Add New Program',
      'new_item' => 'New Program',
      'parent_item_colon' => 'Parent Program:',
      'search_items' => 'Search Programs',
      'not_found' => 'No programs found',
      'not_found_in_trash' => 'No programs found in Trash',
      'archives' => 'Program Archives',
      'attributes' => 'Program Attributes',
      'insert_into_item' => 'Insert into program',
      'uploaded_to_this_item' => 'Uploaded to this program',
      'filter_items_list' => 'Filter program list',
      'filter_by_date' => 'Filter programs by date',
      'items_list_navigation' => 'Program list navigation',
      'items_list' => 'Program list',
      'item_published' => 'Program published.',
      'item_published_privately' => 'Program published privately.',
      'item_reverted_to_draft' => 'Program reverted to draft.',
      'item_scheduled' => 'Program scheduled.',
      'item_updated' => 'Program updated.',
      'item_link' => 'Program Link',
      'item_link_description' => 'A link to a program.',
    ),
    'public' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'has_archive' => false,
    'supports' => array(
      0 => 'title',
      1 => 'thumbnail',
      2 => 'custom-fields',
    ),
    'delete_with_user' => false,
  ));
}
