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

<section class="section section--details">
		<!-- details background -->
    <div class="section__details-bg" data-bg="<?php echo get_template_directory_uri(); ?>/img/bg/details__bg.jpg" style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg/details__bg.jpg) center center / cover no-repeat;"></div>
		<!-- end details background -->

		<!-- details content -->
    <div class="container">
        <?php if ($show_details): ?>
            <div class="row">
                <!-- title -->
                <div class="col-12">
                    <h1 class="section__title section__title--head"><?php echo esc_html($show_details['name']); ?></h1>
                </div>
                <!-- end title -->

                <!-- content -->
                <div class="col-12 col-xl-6">
                    <div class="item item--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-6 col-xxl-5">
                                <div class="item__cover">
                                    <img src="<?php echo esc_url($show_details['image']['medium']); ?>" alt="">
                                    <span class="item__rate item__rate--green"><?php echo esc_html($show_details['rating']['average'] ?? 'N/A'); ?></span>
                                </div>
                            </div>
                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-md-7 col-lg-8 col-xl-6 col-xxl-7">
                                <div class="item__content">
                                    <ul class="item__meta">
                                        <li><span>Director:</span> <a href="actor.html">Vince Gilligan</a></li>
                                        <li><span>Cast:</span> <a href="actor.html">Brian Cranston</a> <a href="actor.html">Jesse Plemons</a> <a href="actor.html">Matt Jones</a> <a href="actor.html">Jonathan Banks</a> <a href="actor.html">Charles Baker</a> <a href="actor.html">Tess Harper</a></li>
                                        <li><span>Genre:</span> <?php echo esc_html(implode(', ', $show_details['genres'] ?? [])); ?></li>
                                        <li><span>Language:</span> <?php echo esc_html($show_details['language']); ?></li>
                                        <li><span>Premiere:</span> <?php echo esc_html($show_details['premiered']); ?></li>
                                        <li><span>Running time:</span> <?php echo esc_html($show_details['runtime']); ?></li>
                                        <li><span>Country:</span> <a href="catalog.html"><?php echo esc_html($show_details['network']['country']['name']); ?></a></li>
                                    </ul>

                                    <div class="item__description">
                                    <?php echo $show_details['summary']; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->

                <!-- player -->
                <div class="col-12 col-xl-6">
                    <div class="section__player">
                        <video controls crossorigin playsinline poster="../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
                            <!-- Video files -->
                            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
                            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
                            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">

                            <!-- Caption files -->
                            <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                                default>
                            <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

                            <!-- Fallback for browsers that don't support the <video> element -->
                            <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                        </video>
                    </div>

                    <div class="section__item-filter">
                        <select class="section__item-select" name="season" id="filter__season">
                            <option value="0">Season 1</option>
                            <option value="1">Season 2</option>
                            <option value="2">Season 3</option>
                            <option value="3">Season 4</option>
                            <option value="4">Season 5</option>
                        </select>

                        <select class="section__item-select" name="series" id="filter__series">
                            <option value="0">Series 1</option>
                            <option value="1">Series 2</option>
                            <option value="2">Series 3</option>
                            <option value="3">Series 4</option>
                            <option value="4">Series 5</option>
                            <option value="5">Series 6</option>
                            <option value="6">Series 7</option>
                            <option value="7">Series 8</option>
                            <option value="8">Series 9</option>
                            <option value="9">Series 10</option>
                            <option value="10">Series 11</option>
                            <option value="11">Series 12</option>
                        </select>

                        <select class="section__item-select" name="sync" id="filter__sync">
                            <option value="0">Eng.Original</option>
                            <option value="1">NewStudio</option>
                            <option value="2">LostFilm</option>
                            <option value="3">HotFlix</option>
                        </select>
                    </div>
                </div>
                <!-- end player -->
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>
