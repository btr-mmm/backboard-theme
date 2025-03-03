<?php
function registerPrimaryOptionsPage()
{
  acf_add_options_page(array(
    'page_title' => 'Backboard Theme',
    'menu_slug' => 'backboard-theme',
    'position' => '',
    'redirect' => false,
    'menu_icon' => array(
      'type' => 'dashicons',
      'value' => 'dashicons-align-full-width',
    ),
    'icon_url' => 'dashicons-align-full-width',
  ));
}

add_action('acf/init', 'registerPrimaryOptionsPage');
