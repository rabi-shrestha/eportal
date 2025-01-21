<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Entertainment_Service {

    private $table_name;
    
    public function __construct() {
        global $wpdb;

        // Set the table name dynamically with the WordPress table prefix
        $this->table_name = $wpdb->prefix . 'tvmaze_show_detail';
    }

    public function get_show_by_id( $show_id ) {
        global $wpdb;
    
        // Validate the input
        if ( empty( $show_id ) ) {
            return new WP_Error( 'invalid_data', 'Show ID is required.' );
        }
    
        // Query the database for the show
        $query = $wpdb->prepare(
            "SELECT * FROM {$this->table_name} WHERE show_id = %d LIMIT 1",
            $show_id
        );
    
        // Execute the query and fetch the result
        $result = $wpdb->get_row( $query, ARRAY_A );
    
        // Check if a result was found
        // if ( empty( $result ) ) {
        //     return new WP_Error( 'not_found', 'Show not found.' );
        // }
    
        return $result;
    }

    public function insert_show_detail( $show_details ) {

        global $wpdb;

        // Ensure the show_id and show_name are valid
        if ( empty( $show_details['id'] ) || empty( $show_details['name'] ) ) {
            return new WP_Error( 'invalid_data', 'Show ID and Show Name are required.' );
        }

        $id = wp_generate_uuid4();

        // Prepare the data
        $data = array(
            'id'        => $id, // Generate a unique ID for the `id` column
            'show_id'   => $show_details['id'],
            'show_name' => $show_details['name'],
            'created_at' => current_time( 'mysql' ), // Use WordPress's current time
        );

        // Format for the data (CHAR, BIGINT, VARCHAR, DATETIME)
        $format = array( '%s', '%d', '%s', '%s' );

        // Insert the data into the table
        $result = $wpdb->insert( $this->table_name, $data, $format );

        // Check for errors
        if ( false === $result ) {
            return new WP_Error( 'db_insert_error', 'Could not insert data into the database.' );
        }

        return $id;
    }

    public function get_show_by_genre($genre) {
        $genre_detail = $genre['query'];

        $entertainmentObj = new Entertainment_Settings();
        $shows = $entertainmentObj->tvmage_shows();

        $shows_by_genre = array_filter($shows, function ($show) use ($genre) {
            // return in_array($genre, $show['genres'], true);
        });
        
        echo '<pre>';
        print_r($shows_by_genre);
        echo '</pre>';

        wp_die();
    }
}