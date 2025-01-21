<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the plugin class
class Entertainment_Facebook {

    public function create_facebook_post( $show_details, $token ) {

        $payload = array(
            'message' => strip_tags($show_details['summary']),
            'link' => $show_details['url'],
            'access_token' => $token
        );

        $facebook_page_id = facebook_page_id();

        $api_url = "https://graph.facebook.com/v16.0/545948711933835/feed"; 

         // Send the POST request using wp_remote_post
        $response = wp_remote_post(
            $api_url,
            array(
                'method'    => 'POST',
                'body'      => wp_json_encode($payload), // Encode payload as JSON
                'headers'   => array(
                    'Content-Type' => 'application/json', // Set content type to JSON
                ),
                'timeout'   => 45, // Set a timeout for the request
            )
        );

        // Check for errors
        if (is_wp_error($response)) {
            // Handle error
            $error_message = $response->get_error_message();
            return "Error: $error_message";
        }

        // Get and return the response body
        $response_body = wp_remote_retrieve_body($response);

        return $response_body;
    }

    function renew_facebook_token($app_id, $app_secret) {
        $short_lived_token = facebook_api_key();

        $url = "https://graph.facebook.com/v17.0/oauth/access_token?"
            . "grant_type=fb_exchange_token&"
            . "client_id=$app_id&"
            . "client_secret=$app_secret&"
            . "fb_exchange_token=$short_lived_token";
    
        $response = wp_remote_get($url);
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
    
        if (isset($data['access_token'])) {
            return $data['access_token'];
        }
    
        return false;
    }
}