<?php

// Register custom menu
function register_custom_menu() {
    register_nav_menus(
        array(
            'main_menu' => __( 'Main Menu' ),
            'footer_menu' => __( 'Footer Menu' ),
        )
    );
}
add_action( 'after_setup_theme', 'register_custom_menu' );

function add_favicon() {
    echo '<link rel="icon" type="image/png" href="' . get_template_directory_uri() . '/icon/favicon-32x32.png" sizes="32x32">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/icon/favicon-32x32.png">';
}
add_action('wp_head', 'add_favicon');

// Enqueue Styles and Scripts
function entertainment_enqueue_scripts() {
    wp_enqueue_style('entertainment-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('splide', get_template_directory_uri() . '/css/splide.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('slimselect', get_template_directory_uri() . '/css/slimselect.css');
    wp_enqueue_style('plyr', get_template_directory_uri() . '/css/plyr.css');
    wp_enqueue_style('photoswipe', get_template_directory_uri() . '/css/photoswipe.css');
    wp_enqueue_style('default-skin', get_template_directory_uri() . '/css/default-skin.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('icons', get_template_directory_uri() . '/webfont/tabler-icons.min.css');

    // Deregister the default jQuery from WordPress
    wp_deregister_script('jquery');

    // Enqueue custom jQuery version from a CDN
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.4.min.js', array(), '3.6.4');
    wp_enqueue_script(
        'bootstrap', // Handle
        get_template_directory_uri() . '/js/bootstrap.bundle.min.js', // Path to your JS file
        array(), // Dependencies (e.g., jQuery)
        '1.0.0', // Version
        true // Load in footer
    );
    wp_enqueue_script('splide', get_template_directory_uri() . '/js/splide.min.js', array(), '1.0.0', true);
    wp_enqueue_script('slimselect', get_template_directory_uri() . '/js/slimselect.min.js', array(), '1.0.0', true);
    wp_enqueue_script('smooth-scrollbar', get_template_directory_uri() . '/js/smooth-scrollbar.js', array(), '1.0.0', true);
    wp_enqueue_script('plyr', get_template_directory_uri() . '/js/plyr.min.js', array(), '1.0.0', true);
    wp_enqueue_script('photoswipe', get_template_directory_uri() . '/js/photoswipe.min.js', array(), '1.0.0', true);
    wp_enqueue_script('photoswipe-ui', get_template_directory_uri() . '/js/photoswipe-ui-default.min.js', array(), '1.0.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
   
}

add_action('wp_enqueue_scripts', 'entertainment_enqueue_scripts');

// Add theme support for title tag, post thumbnails, etc.
function entertainment_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'entertainment_theme_setup');

function entertainment_register_sidebar() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}

add_action('widgets_init', 'entertainment_register_sidebar');

function entertainment_custom_search($query) {
    // Check if it's a search query and if it's the main query (not admin page)
    if ($query->is_search && !is_admin() && $query->is_main_query()) {
        
        // Get the search query term
        $search_term = get_search_query();

        $search_result = get_search_results($search_term);

        // echo '<pre>';
        // print_r($search_term);
        // echo '</pre>';
        // return;

        // Example: Modify the query to search multiple post types
        if ( ! empty( $search_term ) ) {
            $query->set( 'post_type', array( 'post', 'page', 'custom_post_type' ) );
        }

        // Example: Filter by custom field (meta query)
        if ( isset( $_GET['custom_field'] ) && ! empty( $_GET['custom_field'] ) ) {
            $query->set( 'meta_query', array(
                array(
                    'key'     => 'custom_field_name', // Replace with your custom field name
                    'value'   => sanitize_text_field( $_GET['custom_field'] ),
                    'compare' => 'LIKE'
                )
            ));
        }
    }
}
add_filter('pre_get_posts', 'entertainment_custom_search');

function get_search_results($search_term) {
    if ( class_exists( 'Entertainment_Settings' ) ) {
        $plugin_instance = new Entertainment_Settings();
        $message = $plugin_instance->tvmage_search_result($search_term);
        echo $message;  // Outputs: "Hello from the Plugin class method!"
    } else {
        echo "Plugin class not found.";
    }
}

// function handle_ajax_navigation() {
//     // Get the URL from the AJAX request
//     $url = isset($_GET['url']) ? esc_url_raw($_GET['url']) : '';

//     // If a valid URL is passed, load the content
//     if ($url) {
//         // Use WordPress functions to load the page content
//         $post_id = url_to_postid($url);
//         $post = get_post($post_id);

//         if ($post) {
//             // Output the content of the post (you can customize this)
//             echo '<div class="post-content">';
//             echo apply_filters('the_content', $post->post_content);
//             echo '</div>';
//         }
//     }
//     wp_die();  // Terminate the AJAX request properly
// }

// add_action('wp_ajax_load_page', 'handle_ajax_navigation');   // For logged-in users
// add_action('wp_ajax_nopriv_load_page', 'handle_ajax_navigation');  // For non-logged-in users

function register_my_menu() {
    register_nav_menus( array(
        'main_menu' => __( 'Main Menu', 'entertainment' ),
    ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

class Entertainment_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Starts the list before the elements are added.
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu header__dropdown-menu\">\n";
    }

    // Starts the element output.
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'header__nav-item';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
        $attributes .= ' class="header__nav-link"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
