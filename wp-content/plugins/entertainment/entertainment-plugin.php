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
function tvmage_api_key() {
    // Access the API key defined in the config file
    if (defined('TVMAGE_API_KEY')) {
        return TVMAGE_API_KEY;
    }   
    return null;
}

function facebook_api_key() {
    // Access the API key defined in the config file
    if (defined('FACEBOOK_API_KEY')) {
        return FACEBOOK_API_KEY;
    }   
    return null;
}

function facebook_page_id() {
    // Access the API key defined in the config file
    if (defined('FACEBOOK_PAGE_ID')) {
        return FACEBOOK_PAGE_ID;
    }   
    return null;
}

function facebook_app_id() {
    // Access the API key defined in the config file
    if (defined('FACEBOOK_APP_ID')) {
        return FACEBOOK_APP_ID;
    }   
    return null;
}

function facebook_app_secret() {
    // Access the API key defined in the config file
    if (defined('FACEBOOK_APP_SECRET')) {
        return FACEBOOK_APP_SECRET;
    }   
    return null;
}

// Example shortcode to display the API key (remove this in production for security)
add_shortcode('show_api_key', function () {
    $api_key = tvmage_api_key();
    return $api_key ? "Your API Key: " . esc_html($api_key) : "API Key not set.";
});

// Include the plugin class
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-plugin.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-cpt.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-table.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-service.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-entertainment-facebook.php';

register_activation_hook( __FILE__, function() {
    $table_creator = new Entertainment_Table();
    $table_creator->on_activation();
});

// Initialize the plugin
function entertainment_plugin_init() {
    $plugin = new Entertainment_Plugin();
    $plugin->run();
}
add_action( 'plugins_loaded', 'entertainment_plugin_init' );
