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

    public function tvmage_shows($page) {
        $api_url = "https://api.tvmaze.com/shows?page=$page"; 

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
        $tvmaze_shows = json_decode( $data, true );

        $shows_array = array();

        // Process and return shows (you can customize this as needed)
        if ( ! empty( $tvmaze_shows ) ) {
            foreach ( $tvmaze_shows as $tvmaze_show ) {
                $shows_array[] = array(
                    'name'      => $tvmaze_show['name'],
                    'url'       => $tvmaze_show['url'],
                    'genres'    => $tvmaze_show['genres'],
                    'rating'    => $tvmaze_show['rating']['average'],
                    'image'     => $tvmaze_show['image']['medium']
                );
            }

            return $shows_array;
        } else {
            return 'No shows found for this show.';
        }
    }

    public function tvmage_search_result($search_term) {
        $api_url = "https://api.tvmaze.com/search/shows?q=$search_term"; 

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

        if ( is_wp_error( $response ) ) {
            return 'There was an error: ' . $response->get_error_message();
        }

        $data = wp_remote_retrieve_body( $response );
        $episodes = json_decode( $data, true );

        $shows_array = array();

        if ( ! empty( $episodes ) ) {
            foreach ( $episodes as $episode ) {
                $show = $episode['show'];

                $shows_array[] = array(
                    'name'       => $show['name'],
                    'url'       => $show['url'],
                    'type'       => $show['type'],
                    'language'   => $show['language'],
                    'genres'     => $show['genres'],
                    'status'     => $show['status'],
                    'premiered'  => $show['premiered'],
                    'ended'      => $show['ended'],
                    'summary'    => $show['summary'],
                    'rating'    => $show['rating']['average'],
                    'image'      => !empty($show['image']['medium']) ? $this->get_cloaked_image_url($show['image']['medium'], 'episode') : null,
                    'schedule'   => $show['schedule'],
                    'previous_episodes' => isset($show['_links']['previousepisode']['href']) 
                                           ? $show['_links']['previousepisode']['href'] 
                                           : null,
                );
            }
            return $shows_array;
        } else {
            return 'No episodes found for this show.';
        }
    }

    public function get_cloaked_image_url($external_image_url, $image_type) {
        $image_url = $this->get_base64_image_from_url($external_image_url);
        // $encoded_url = base64_encode($image_url);
        // $custom_url = home_url('/' . $image_type . '/?url=' . $encoded_url);
        // echo $image_url;
        // die;
        return $image_url;
    }

    function get_base64_image_from_url($image_url) {
        // Get the image content from the external URL
        $image_data = file_get_contents($image_url);
    
        // Check if the image was successfully fetched
        if ($image_data === false) {
            return false;
        }
    
        // Get the image's MIME type
        $image_info = getimagesizefromstring($image_data);
        $mime_type = $image_info['mime'];
    
        // Convert the image data to Base64
        $base64_image = base64_encode($image_data);
    
        // Return the Base64 image string with the appropriate MIME type
        return 'data:' . $mime_type . ';base64,' . $base64_image;
    }
}
