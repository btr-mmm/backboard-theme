<?php

if (!class_exists('BackboardTheme')) {
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

      $this->loadPostTypes();
      $this->loadACFFields();
      $this->loadOptionsPages();

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

      // Change title separator
      add_filter('document_title_separator', function ($sep) {
        return ('|');
      });
    }

    /**
     * Enqueue theme CSS stylesheets and JS scripts.
     * For use in the wp_enqueue_scripts action hook.
     */
    public function enqueue()
    {
      wp_enqueue_style('backboard', get_template_directory_uri() . '/dist/main.min.css', [], $this->themeVersion);
      wp_enqueue_script('backboard', get_template_directory_uri() . '/dist/bundle.min.js', ['jquery'], $this->themeVersion, true);
    }

    /**
     * Add theme supports.
     * For use in the after_setup_theme hook.
     */
    public function themeSupports()
    {
      add_theme_support('title-tag');
      add_theme_support('automatic-feed-links');
      add_theme_support('post-thumbnails');
    }

    /**
     * Load all custom post types from ./inc/post-types
     */
    private function loadPostTypes()
    {
      $postTypesDirectory = get_template_directory() . '/inc/post-types/';

      if (!file_exists($postTypesDirectory)) {
        return;
      }

      $postTypes = glob($postTypesDirectory . '*.php');
      if (!empty($postTypes)) {
        foreach ($postTypes as $file) {
          require_once $file;
        }
      }
    }

    /**
     * Load all ACF field groups from ./inc/acf-fields
     */
    private function loadACFFields()
    {
      if (!function_exists('acf_add_local_field_group')) {
        return;
      }

      $acfFieldsDirectory = get_template_directory() . '/inc/acf-fields/';

      if (!file_exists($acfFieldsDirectory)) {
        return;
      }

      $acfFieldFiles = glob($acfFieldsDirectory . '*.php');
      if (!empty($acfFieldFiles)) {
        foreach ($acfFieldFiles as $file) {
          require_once $file;
        }
      }
    }

    /**
     * Load all ACF field groups from ./inc/acf-fields
     */
    private function loadOptionsPages()
    {
      if (!function_exists('acf_add_options_page')) {
        return;
      }

      $optionsDirectory = get_template_directory() . '/inc/options/';

      if (!file_exists($optionsDirectory)) {
        return;
      }

      $optionsFiles = glob($optionsDirectory . '*.php');
      if (!empty($optionsFiles)) {
        foreach ($optionsFiles as $file) {
          require_once $file;
        }
      }
    }
  }

  // Instantiate a new BackboardTheme instance
  function initTheme()
  {
    return new BackboardTheme();
  }
  add_action('after_setup_theme', 'initTheme');
}
