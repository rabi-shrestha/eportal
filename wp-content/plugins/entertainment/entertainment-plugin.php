<?php
/**
 * Plugin Name: Entertainment Plugin
 * Plugin URI:  https://example.com/my-oop-plugin
 * Description: Entertainment Plugin.
 * Version:     1.0
 * Author:      Rabi Shrestha
 * Author URI:  https://example.com
 * License:     GPL2
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include the plugin class
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-plugin.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-cpt.php';

// Initialize the plugin
function entertainment_plugin_init() {
    $plugin = new Entertainment_Plugin();
    $plugin->run();
}
add_action( 'plugins_loaded', 'entertainment_plugin_init' );
