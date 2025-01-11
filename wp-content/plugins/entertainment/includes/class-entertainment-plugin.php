<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the plugin class
class Entertainment_Plugin {
    
    // Constructor: Set up initial actions and filters
    public function __construct() {

		 // Initialize other features
         new Entertainment_Shortcode();
         new Entertainment_Settings();
         new Entertainment_CPT();
    }
    
    public function run() {
        // Additional initialization code can go here
    }

    // Enqueue CSS and JS files
    public function enqueue_assets() {
        wp_enqueue_style( 'entertainment-plugin-style', plugin_dir_url( __FILE__ ) . '../assets/css/style.css' );
        wp_enqueue_script( 'entertainment-plugin-script', plugin_dir_url( __FILE__ ) . '../assets/js/script.js', array(), null, true );
    }

    // Activation hook
    public static function activate() {
        // Code to run on activation
        flush_rewrite_rules(); // Ensure the custom post type rules are flushed
    }

    // Deactivation hook
    public static function deactivate() {
        // Code to run on deactivation
        flush_rewrite_rules(); // Ensure the custom post type rules are flushed
    }
}

// Register the activation and deactivation hooks
register_activation_hook( __FILE__, array( 'Entertainment_Plugin', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Entertainment_Plugin', 'deactivate' ) );