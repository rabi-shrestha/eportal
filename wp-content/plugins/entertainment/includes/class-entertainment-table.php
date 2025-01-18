<?php

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Entertainment_Table {

    private $table_name;

    /**
     * Constructor: Hooks into WordPress lifecycle events
     */
    public function __construct() {
        global $wpdb;

        // Set the table name with the WP prefix
        $this->table_name = $wpdb->prefix . 'tvmaze_show_detail';
    }

    /**
     * Called on plugin activation: creates the necessary table
     */
    public function on_activation() {
        $this->create_tvmaze_show_table();
    }

    /**
     * Create the database table for the plugin
     */
    private function create_tvmaze_show_table() {
        global $wpdb;

        // Character set and collation
        $charset_collate = $wpdb->get_charset_collate();

        // SQL to create the table
        $sql = "CREATE TABLE {$this->table_name} (
            id CHAR(36) NOT NULL,
            show_id BIGINT(20) UNSIGNED NOT NULL,
            show_name VARCHAR(255) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY show_id (show_id)
        ) $charset_collate;";

        // Include the upgrade.php file to use dbDelta
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        // Execute the SQL query
        dbDelta( $sql );
    }

    /**
     * Utility function to check if the table exists
     *
     * @return bool True if the table exists, false otherwise
     */
    public function table_exists() {
        global $wpdb;

        $query = $wpdb->prepare(
            "SHOW TABLES LIKE %s",
            $this->table_name
        );

        return (bool) $wpdb->get_var( $query );
    }

    /**
     * Drops the table: optional for development or uninstall purposes
     */
    public function drop_table() {
        global $wpdb;

        $sql = "DROP TABLE IF EXISTS {$this->table_name}";
        $wpdb->query( $sql );
    }
}
