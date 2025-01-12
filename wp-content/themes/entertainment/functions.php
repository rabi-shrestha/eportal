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

        if ( class_exists( 'Entertainment_Settings' ) ) {
            $plugin_instance = new Entertainment_Settings();
            $search_result = $plugin_instance->tvmage_search_result($search_term);
            
            if (!empty($search_result)) {
                include locate_template('partials/tvmage-results-template.php');
            } else {
                echo '<p>No results found for "' . esc_html($search_term) . '".</p>';
            }
        }
    }
}
add_filter('pre_get_posts', 'entertainment_custom_search');

function register_my_menu() {
    register_nav_menus( array(
        'main_menu' => __( 'Main Menu', 'entertainment' ),
    ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

class Entertainment_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start level (sub-menu)
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth); // Indent based on depth
        $output .= "\n$indent<ul class=\"dropdown-menu header__dropdown-menu\">\n";
    }

    // Start element (menu item)
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'header__nav-item';

        // Check if the item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown'; // Add dropdown class for Bootstrap
        }

        // Create class attribute
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Start <li>
        $output .= '<li' . $class_names . '>';

        // Create link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

        // Add Bootstrap classes for dropdown toggles
        if (in_array('menu-item-has-children', $item->classes)) {
            $attributes .= ' class="header__nav-link"';
            $attributes .= ' data-bs-toggle="dropdown" aria-expanded="false"';
        } else {
            $attributes .= ' class="header__nav-link"';
        }

        // Build the link
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        // Add dropdown icon if the item has children
        if (in_array('menu-item-has-children', $item->classes)) {
            $item_output .= ' <i class="ti ti-chevron-down"></i>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        // Append the output
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End element
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }

    // End level (sub-menu)
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

function menu_hover_dropdown_script() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Check if the device is a touchscreen
            const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

            if (!isTouchDevice) {
                // For non-touch devices, enable hover functionality
                const dropdownItems = document.querySelectorAll('.header__nav-item.dropdown');

                dropdownItems.forEach(function (item) {
                    item.addEventListener('mouseenter', function () {
                        const menu = this.querySelector('.dropdown-menu');
                        if (menu) {
                            menu.style.display = 'block';
                            menu.style.visibility = 'visible';
                            menu.style.opacity = '1';
                        }
                    });

                    item.addEventListener('mouseleave', function () {
                        const menu = this.querySelector('.dropdown-menu');
                        if (menu) {
                            menu.style.display = 'none';
                            menu.style.visibility = 'hidden';
                            menu.style.opacity = '0';
                        }
                    });
                });
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'menu_hover_dropdown_script');

function enqueue_custom_scripts() {
    wp_enqueue_script('search-toggle', get_template_directory_uri() . '/js/search.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');