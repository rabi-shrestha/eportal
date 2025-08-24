<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define the settings page class
class Entertainment_Settings
{

    public function __construct()
    {
        // Add settings menu
        add_action('admin_menu', array($this, 'add_settings_page'));
    }

    public function add_settings_page()
    {
        add_menu_page(
            'Entertainment Plugin Settings',  // Page Title
            'Entertainment Plugin',              // Menu Title
            'manage_options',          // Capability
            'entertainment-settings',         // Menu slug
            array($this, 'render_settings_page')  // Callback function
        );
    }

    public function render_settings_page()
    {
        include plugin_dir_path(__FILE__) . '../templates/admin-page.php';
    }

    public function tvmage_shows($page = null)
    {
        $api_url = $page !== null ? "https://api.tvmaze.com/shows?page=$page" : "https://api.tvmaze.com/shows";

        $api_key = tvmage_api_key();

        $args = array(
            'method' => 'GET',
            'timeout' => 15,
            'headers' => array(
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json',
            ),
        );

        $response = wp_remote_get($api_url, $args);

        // Handle errors or response
        if (is_wp_error($response)) {
            return 'There was an error: ' . $response->get_error_message();
        }

        // Parse the response
        $data = wp_remote_retrieve_body($response);
        $tvmaze_shows = json_decode($data, true);

        $shows_array = array();

        // Process and return shows (you can customize this as needed)
        if (!empty($tvmaze_shows)) {
            foreach ($tvmaze_shows as $tvmaze_show) {
                $tvmaze_url = "https://www.tvmaze.com";
                $relative_path = str_replace($tvmaze_url, '', $tvmaze_show['url']);
                $shows_array[] = array(
                    'id' => $tvmaze_show['id'],
                    'name' => $tvmaze_show['name'],
                    'url' => $relative_path,
                    'genres' => $tvmaze_show['genres'],
                    'rating' => $tvmaze_show['rating']['average'],
                    'image' => $tvmaze_show['image']['medium']
                );
            }

            return $shows_array;
        }
    }

    public function tvmage_search_result($search_term)
    {
        $api_url = "https://api.tvmaze.com/search/shows?q=$search_term";

        $api_key = tvmage_api_key();

        $args = array(
            'method' => 'GET',
            'timeout' => 15,
            'headers' => array(
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json',
            ),
        );

        $response = wp_remote_get($api_url, $args);

        if (is_wp_error($response)) {
            return 'There was an error: ' . $response->get_error_message();
        }

        $data = wp_remote_retrieve_body($response);
        $episodes = json_decode($data, true);

        $shows_array = array();

        if (!empty($episodes)) {
            foreach ($episodes as $episode) {
                $show = $episode['show'];

                $shows_array[] = array(
                    'name' => $show['name'],
                    'url' => $show['url'],
                    'type' => $show['type'],
                    'language' => $show['language'],
                    'genres' => $show['genres'],
                    'status' => $show['status'],
                    'premiered' => $show['premiered'],
                    'ended' => $show['ended'],
                    'summary' => $show['summary'],
                    'rating' => $show['rating']['average'],
                    'image' => !empty($show['image']['medium']) ? $this->get_cloaked_image_url($show['image']['medium'], 'episode') : null,
                    'schedule' => $show['schedule'],
                    'previous_episodes' => isset($show['_links']['previousepisode']['href'])
                        ? $show['_links']['previousepisode']['href']
                        : null,
                );
            }

            return $shows_array;
        }
    }

    public function tvmage_show_details($id)
    {
        $api_url = "https://api.tvmaze.com/shows/$id";

        $api_key = tvmage_api_key();

        $args = array(
            'method' => 'GET',
            'timeout' => 15,
            'headers' => array(
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json',
            ),
        );

        $response = wp_remote_get($api_url, $args);

        if (is_wp_error($response)) {
            return null; // Handle API errors
        }

        $data = wp_remote_retrieve_body($response);
        return json_decode($data, true);
    }

    public function tvmage_youtube_video_details($query)
    {
        $apiKey = youtube_data_api_v3_key();
        $maxResults = 1;

        // Build the API URL
        $apiUrl = sprintf(
            'https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&q=%s&maxResults=%d&key=%s',
            urlencode($query),
            $maxResults,
            $apiKey
        );

        // Make the request
        $response = file_get_contents($apiUrl);

        if ($response === false) {
            die('Error fetching data from YouTube API');
        }

        // Decode JSON response
        $data = json_decode($response, true);

        if (!empty($data['items'])) {
            $video = $data['items'][0];
            $videoId = $video['id']['videoId'];
            $title = $video['snippet']['title'];
            $thumbnail = $video['snippet']['thumbnails']['high']['url'];

            // YouTube embed URL
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";
            ?>

            <iframe id="player" width="100%" height="480" src="<?php echo $embedUrl; ?>?rel=0&showinfo=0&autoplay=0" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>

            <?php
        } else {
            echo "No video found";
        }
    }

    public function tvmage_youtube_video_items($query, $maxResults = 5)
    {
        $apiKey = youtube_data_api_v3_key();

        // Build the API URL
        $apiUrl = sprintf(
            'https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&q=%s&maxResults=%d&key=%s',
            urlencode($query),
            $maxResults,
            $apiKey
        );

        // Make the request safely
        $response = @file_get_contents($apiUrl);

        if ($response === false) {
            return ['error' => 'Error fetching data from YouTube API'];
        }

        // Decode JSON response
        $data = json_decode($response, true);

        if (isset($data['items']) && is_array($data['items']) && count($data['items']) > 0) {
            $result = array_map(function ($item) {
                return [
                    'videoId' => $item['id']['videoId'] ?? null,
                    'title' => $item['snippet']['title'] ?? null,
                    'thumbnail' => $item['snippet']['thumbnails']['medium']['url'] ?? null,
                    'publishedAt' => $item['snippet']['publishedAt'] ?? null,
                ];
            }, $data['items']);

            // Filter out invalid results
            $result = array_filter($result, fn($v) => $v['videoId'] && $v['title']);

            return array_values($result);
        }

        return ['error' => 'No video found'];
    }

    public function get_cloaked_image_url($external_image_url, $image_type)
    {
        $image_url = $this->get_base64_image_from_url($external_image_url);
        // $encoded_url = base64_encode($image_url);
        // $custom_url = home_url('/' . $image_type . '/?url=' . $encoded_url);
        // echo $image_url;
        // die;
        return $image_url;
    }

    function get_base64_image_from_url($image_url)
    {
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

    function fetch_full_show_details($show_id)
    {
        $details = [];

        // Basic show info
        $details['show'] = json_decode(wp_remote_retrieve_body(wp_remote_get("https://api.tvmaze.com/shows/$show_id")), true);

        // Episodes
        $details['episodes'] = json_decode(wp_remote_retrieve_body(wp_remote_get("https://api.tvmaze.com/shows/$show_id/episodes")), true);

        // Cast
        $details['cast'] = json_decode(wp_remote_retrieve_body(wp_remote_get("https://api.tvmaze.com/shows/$show_id/cast")), true);

        // Seasons
        $details['seasons'] = json_decode(wp_remote_retrieve_body(wp_remote_get("https://api.tvmaze.com/shows/$show_id/seasons")), true);

        // Images
        $details['images'] = json_decode(wp_remote_retrieve_body(wp_remote_get("https://api.tvmaze.com/shows/$show_id/images")), true);

        return $details;
    }
}
