<?php
/*
Template Name: Show Detail Template
*/

get_header();

// Get the `show_id` and `show_slug` from query variables
$show_id = get_query_var('show_id');
$show_slug = get_query_var('show_slug');

// Fetch the show details
function fetch_show_details($id) {
    $api_url = "https://api.tvmaze.com/shows/$id";
    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return null; // Handle API errors
    }

    $data = wp_remote_retrieve_body($response);
    return json_decode($data, true);
}

$show_details = fetch_show_details($show_id);

// Validate slug (optional)
if ($show_details && sanitize_title($show_details['name']) !== $show_slug) {
    // Redirect to the correct slug URL if it doesn't match
    wp_redirect(home_url("/shows/$show_id/" . sanitize_title($show_details['name'])));
    exit;
}
?>

<div class="container">
    <?php if ($show_details): ?>
        <h1><?php echo esc_html($show_details['name']); ?></h1>
        <div class="show-info">
            <img src="<?php echo esc_url($show_details['image']['medium'] ?? get_template_directory_uri() . '/default-image.jpg'); ?>" alt="<?php echo esc_attr($show_details['name']); ?>">
            <p><strong>Language:</strong> <?php echo esc_html($show_details['language']); ?></p>
            <p><strong>Genres:</strong> <?php echo esc_html(implode(', ', $show_details['genres'] ?? [])); ?></p>
            <p><strong>Premiered:</strong> <?php echo esc_html($show_details['premiered']); ?></p>
            <p><strong>Rating:</strong> <?php echo esc_html($show_details['rating']['average'] ?? 'N/A'); ?></p>
            <div class="summary">
                <strong>Summary:</strong>
                <?php echo wp_kses_post($show_details['summary']); ?>
            </div>
        </div>
    <?php else: ?>
        <p>Show not found or invalid ID/slug.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
?>
