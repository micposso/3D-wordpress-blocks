<?php
/**
 * Plugin Name: Custom Block
 * Description: Custom block for WordPress Gutenberg editor.
 * Version: 1.0.0
 * Author: Your Name
 *
 * @package custom-block
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue block assets for the editor.
 */

// Enqueue necessary scripts and styles
function enqueue_custom_3d_block_scripts() {
  // Enqueue the Three.js library from a CDN
  wp_enqueue_script(
      'three-js',
      'https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js', // Adjust the URL to the appropriate version
      array(), // Dependencies (none in this case)
      '110', // Version number
      true // Load the script in the footer
  );

  // Enqueue your custom block script
  wp_enqueue_script(
      'custom-3d-block-script',
      plugin_dir_url( __FILE__ ) . 'js/custom-3d-block.js',
      array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ), // Dependencies
      filemtime( plugin_dir_path( __FILE__ ) . 'js/custom-3d-block.js' ), // Version number (based on file modification time)
      true // Load the script in the footer
  );

  // Enqueue your custom block styles
  wp_enqueue_style(
      'custom-3d-block-style',
      plugin_dir_url( __FILE__ ) . 'css/style.css',
      array(), // Dependencies (none in this case)
      filemtime( plugin_dir_path( __FILE__ ) . 'css/style.css' ) // Version number (based on file modification time)
  );
}
add_action( 'enqueue_block_editor_assets', 'enqueue_custom_3d_block_scripts' );



// Register the custom block
function register_custom_3d_block() {
    wp_register_script(
        'custom-3d-block-script',
        plugins_url( 'custom-3d-block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'js/3d-block.js' )
    );

    register_block_type( 'custom-3d-block/block', array(
        'editor_script' => 'custom-3d-block-script',
    ) );
}
add_action( 'init', 'register_custom_3d_block' );
