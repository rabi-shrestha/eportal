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

// Include the API key configuration file
require_once plugin_dir_path(__FILE__) . 'api-key-config.php';

// Example function to demonstrate the API key usage
function entertainment_plugin_get_api_key() {
    // Access the API key defined in the config file
    if (defined('MY_API_KEY')) {
        return MY_API_KEY;
    }
    return null;
}

// Example shortcode to display the API key (remove this in production for security)
add_shortcode('show_api_key', function () {
    $api_key = entertainment_plugin_get_api_key();
    return $api_key ? "Your API Key: " . esc_html($api_key) : "API Key not set.";
});

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
