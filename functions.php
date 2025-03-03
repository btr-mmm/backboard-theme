<?php

/**
 * Perform all theme setup for the Backboard theme
 */
class BackboardTheme
{
  /**
   * The current version of Backboard, set in style.css
   * @var string The theme version
   */
  private $themeVersion;

  public function __construct()
  {
    $theme = wp_get_theme();
    $this->themeVersion = $theme->get('Version');

    $this->hooks();
  }

  /**
   * Setup actions and filters.
   */
  private function hooks()
  {
    // Enqueue styles & scripts
    add_action('wp_enqueue_scripts', [$this, 'enqueue']);

    // Add theme supports
    add_action('after_setup_theme', [$this, 'themeSupports']);
  }

  /**
   * Enqueue theme CSS stylesheets and JS scripts.
   * For use in the wp_enqueue_scripts action hook.
   */
  private function enqueue()
  {
    wp_enqueue_style('backboard', get_template_directory_uri() . '/dist/main.min.css', [], $this->themeVersion);
    wp_enqueue_script('backboard', get_template_directory_uri() . '/dist/bundle.min.js', ['jquery'], $this->themeVersion, true);
  }

  /**
   * Add theme supports.
   * For use in the after_setup_theme hook.
   */
  private function themeSupports()
  {
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
  }
}

$backboard = new BackboardTheme();
