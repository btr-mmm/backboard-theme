<?php add_action('init', 'registerLeaguePostType');

function registerLeaguePostType()
{
  register_post_type('league', array(
    'labels' => array(
      'name' => 'Leagues',
      'singular_name' => 'League',
      'menu_name' => 'Leagues',
      'all_items' => 'All Leagues',
      'edit_item' => 'Edit League',
      'view_item' => 'View League',
      'view_items' => 'View Leagues',
      'add_new_item' => 'Add New League',
      'add_new' => 'Add New League',
      'new_item' => 'New League',
      'parent_item_colon' => 'Parent League:',
      'search_items' => 'Search Leagues',
      'not_found' => 'No leagues found',
      'not_found_in_trash' => 'No leagues found in Trash',
      'archives' => 'League Archives',
      'attributes' => 'League Attributes',
      'insert_into_item' => 'Insert into league',
      'uploaded_to_this_item' => 'Uploaded to this league',
      'filter_items_list' => 'Filter leagues list',
      'filter_by_date' => 'Filter leagues by date',
      'items_list_navigation' => 'Leagues list navigation',
      'items_list' => 'Leagues list',
      'item_published' => 'League published.',
      'item_published_privately' => 'League published privately.',
      'item_reverted_to_draft' => 'League reverted to draft.',
      'item_scheduled' => 'League scheduled.',
      'item_updated' => 'League updated.',
      'item_link' => 'League Link',
      'item_link_description' => 'A link to a league.',
    ),
    'public' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-image-filter',
    'has_archive' => false,
    'supports' => array(
      0 => 'title',
      1 => 'thumbnail',
      2 => 'custom-fields',
    ),
    'delete_with_user' => false,
  ));
}
