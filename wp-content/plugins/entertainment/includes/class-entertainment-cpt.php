<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the custom post type class
class Entertainment_CPT {

    public function __construct() {
        add_action( 'init', array( $this, 'register_cpt' ) );
    }

    public function register_cpt() {
        $args = array(
            'public' => true,
            'label'  => 'Entertainment Posts',
            'supports' => array( 'title', 'editor', 'custom-fields' ),
        );
        register_post_type( 'entertainment_post', $args );
    }
}
