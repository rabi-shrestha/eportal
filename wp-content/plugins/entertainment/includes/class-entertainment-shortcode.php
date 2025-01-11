<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the shortcode class
class Entertainment_Shortcode {

    public function __construct() {
        // Register shortcode
        add_shortcode( 'entertainment_message', array( $this, 'shortcode_message' ) );
    }

    public function shortcode_message() {
        return '<p style="text-align:center; color: red;">This is a shortcode message from My OOP Plugin!</p>';
    }
}
