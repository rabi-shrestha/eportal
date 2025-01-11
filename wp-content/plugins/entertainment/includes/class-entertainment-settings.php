<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the settings page class
class Entertainment_Settings {

    public function __construct() {
        // Add settings menu
        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
    }

    public function add_settings_page() {
        add_menu_page(
            'Entertainment Plugin Settings',  // Page Title
            'Entertainment Plugin',              // Menu Title
            'manage_options',          // Capability
            'entertainment-settings',         // Menu slug
            array( $this, 'render_settings_page' )  // Callback function
        );
    }

    public function render_settings_page() {
        include plugin_dir_path( __FILE__ ) . '../templates/admin-page.php';
    }

    public function tvmage_search_result($search_term) {
        $show_id = 1;
        $api_url = "https://api.tvmaze.com/shows/$show_id/episodes"; 

        $api_key = '9AqM4_NBynH1eGqOxGZjH6Gt0WP0Yyu2';

        $args = array(
            'method'    => 'GET',
            'timeout'   => 15,
            'headers'   => array(
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type'  => 'application/json',
            ),
        );

        $response = wp_remote_get( $api_url, $args );

        // Handle errors or response
        if ( is_wp_error( $response ) ) {
            return 'There was an error: ' . $response->get_error_message();
        }

        // Parse the response
        $data = wp_remote_retrieve_body( $response );
        $episodes = json_decode( $data, true );

        // Process and return episodes (you can customize this as needed)
        if ( ! empty( $episodes ) ) {
            foreach ( $episodes as $episode ) {

                // echo '<pre>';
                // print_r($episode);
                // echo '</pre>';

                echo '<h3>' . esc_html( $episode['name'] ) . '</h3>';
                echo '<p>Season: ' . esc_html( $episode['season'] ) . '</p>';
                echo '<p>Number: ' . esc_html( $episode['number'] ) . '</p>';
                // echo '<p>' . esc_html( $episode['id'] ) . '</p>';
                echo '<p>Type: ' . esc_html( $episode['type'] ) . '</p>';
                echo '<p>Rating: ' . esc_html( $episode['rating']['average'] ) . '</p>';
                echo '<img src="' . esc_html( $episode['image']['medium'] ) . '" />';
                echo $episode['summary'];
            }
        } else {
            return 'No episodes found for this show.';
        }
    }
}
