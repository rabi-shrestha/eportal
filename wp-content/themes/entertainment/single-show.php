<?php
/*
Template Name: Show Detail Template
*/

get_header();

// Get the `show_id` and `show_slug` from query variables
$show_id = get_query_var('show_id');
$show_slug = get_query_var('show_slug');

$plugin_instance = new Entertainment_Settings();

$details = $plugin_instance->fetch_full_show_details($show_id);
$show = $details['show'] ?? null;

// Validate slug (optional)
if ($show && sanitize_title($show['name']) !== $show_slug) {
    wp_redirect(home_url("/shows/$show_id/" . sanitize_title($show['name'])));
    exit;
}
?>

<section class="section section--details">
    <div class="section__details-bg"
        style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg/details__bg.jpg) center center / cover no-repeat;">
    </div>
    <div class="container">
        <?php if ($show): ?>
            <div class="row">
                <!-- Show Title -->
                <div class="col-12">
                    <h1 class="section__title section__title--head"><?php echo esc_html($show['name']); ?></h1>
                </div>

                <!-- Show Info -->
                <div class="col-12 col-xl-6">
                    <div class="item item--details">
                        <div class="row">
                            <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-6">
                                <div class="item__cover">
                                    <img src="<?php echo esc_url($show['image']['medium'] ?? ''); ?>" alt="">
                                    <span
                                        class="item__rate item__rate--green"><?php echo esc_html($show['rating']['average'] ?? 'N/A'); ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 col-lg-8 col-xl-6">
                                <div class="item__content">
                                    <ul class="item__meta">
                                        <li><span>Genre:</span>
                                            <?php echo esc_html(implode(', ', $show['genres'] ?? [])); ?></li>
                                        <li><span>Language:</span> <?php echo esc_html($show['language'] ?? 'N/A'); ?></li>
                                        <li><span>Premiere:</span> <?php echo esc_html($show['premiered'] ?? 'N/A'); ?></li>
                                        <li><span>Runtime:</span> <?php echo esc_html($show['runtime'] ?? 'N/A'); ?> min
                                        </li>
                                        <li><span>Country:</span>
                                            <?php echo esc_html($show['network']['country']['name'] ?? 'N/A'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- player -->

                <style>
                    .section__player {
                        position: relative;
                        width: 100%;
                        max-width: 800px;
                        /* optional */
                        aspect-ratio: 16 / 9;
                        /* keeps video ratio */
                        background: #000;
                        border-radius: 12px;
                        /* optional for style */
                        overflow: hidden;
                    }

                    .section__player video {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        /* ensures poster and video scale evenly */
                        display: block;
                    }

                    /* General section background */
                    .section--details {
                        background-color: #1c1b1f;
                        /* Dark background */
                        color: #fff;
                        /* Default text color */
                    }

                    /* Cast section */
                    .item__description,
                    h3,
                    ul.list-inline,
                    ul.list-inline li,
                    .card .card-title,
                    .card .card-text,
                    p,
                    small {
                        color: #fff !important;
                    }

                    /* Cast images */
                    .item__content img,
                    .card img {
                        border-radius: 8px;
                    }

                    /* Episode cards */
                    .card {
                        background-color: #222028;
                        border: none;
                        border-radius: 8px;
                    }

                    .card-body {
                        color: #fff;
                    }

                    /* Season list */
                    ul.list-inline li {
                        margin-right: 10px;
                    }

                    /* YouTube select */
                    .section__item-select {
                        background-color: #222028;
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 0.5rem 1rem;
                    }
                </style>

                <div class="col-12 col-xl-6">
                    <div class="section__player">
                        <?php $plugin_instance->tvmage_youtube_video_details(esc_html($show['name'])); ?>
                    </div>

                    <div class="section__item-filter">
                        <?php $video_items = $plugin_instance->tvmage_youtube_video_items(esc_html($show['name'])); ?>

                        <select class="section__item-select" name="video" id="filter__video">
                            <?php if (!empty($video_items) && empty($video_items['error'])): ?>
                                <?php foreach ($video_items as $video): ?>
                                    <option value="<?php echo esc_attr($video['videoId']); ?>">
                                        <?php echo esc_html(trim($video['title'], "\"' ")); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No videos found</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <!-- Description -->
                <div class="item__description">
                    <?php echo $show['summary'] ?? ''; ?>
                </div>
            </div>

            <div class="row">
                <!-- Cast -->
                <div class="col-12 col-xl-12">
                    <h3>Cast</h3>
                    <div class="row">
                        <?php foreach ($details['cast'] ?? [] as $member): ?>
                            <div class="col-4 col-md-3 col-lg-2 text-center mb-3">
                                <img src="<?php echo esc_url($member['person']['image']['medium'] ?? ''); ?>"
                                    alt="<?php echo esc_attr($member['person']['name']); ?>" class="img-fluid rounded">
                                <p><?php echo esc_html($member['person']['name']); ?></p>
                                <small>as <?php echo esc_html($member['character']['name']); ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Seasons -->
                <div class="col-12 col-xl-12">
                    <h3>Seasons</h3>
                    <ul class="list-inline">
                        <?php foreach ($details['seasons'] ?? [] as $season): ?>
                            <li class="list-inline-item">
                                Season <?php echo esc_html($season['number']); ?>
                                (<?php echo esc_html($season['premiereDate'] ?? '-'); ?>)
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Episodes -->
                <div class="col-12 col-xl-12">
                    <h3>Episodes</h3>
                    <div class="row">
                        <?php foreach ($details['episodes'] ?? [] as $ep): ?>
                            <div class="col-6 col-md-4 col-lg-3 mb-3">
                                <div class="card">
                                    <?php if (!empty($ep['image']['medium'])): ?>
                                        <img src="<?php echo esc_url($ep['image']['medium']); ?>" class="card-img-top"
                                            alt="<?php echo esc_attr($ep['name']); ?>">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo esc_html($ep['name']); ?></h5>
                                        <p class="card-text">
                                            S<?php echo esc_html($ep['season']); ?>E<?php echo esc_html($ep['number']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        <?php else: ?>
            <p>Show details not found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>