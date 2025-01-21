<?php
/*
Template Name: Shows Template
*/

get_header();
?>

<!-- page title -->
<section class="section section--first">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <?php
                        $current_url = home_url(add_query_arg(array(), $wp->request)); 
                        $menu_label = get_menu_label_by_url($current_url);
                    ?>
                    <!-- section title -->
                    <h1 class="section__title section__title--head"><?php echo $menu_label; ?></h1>
                    <!-- end section title -->

                    <!-- breadcrumbs -->
                   <?php echo get_breadcrumbs(); ?>
                    <!-- end breadcrumbs -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- fixed filter wrap -->
<div>
    <!-- filter (fixed position) -->
    <?php include locate_template('partials/filter-option.php'); ?>
    <!-- end filter (fixed position) -->
    
    <div class="section section--catalog">
        <div class="container">
            <div class="row" id="shows-container">
            <?php $shows = get_shows(0); ?>
                <?php foreach ($shows as $show) : ?>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="item">
                            <div class="item__cover">
                                <img src="<?php echo $show['image']; ?>" alt="" />
                                <?php if (!empty($show['image'])) : ?>
                                    <img src="<?php echo esc_url($show['image']); ?>" alt="" />
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/default/default.svg" alt="<?php echo esc_attr($show['name']); ?>" alt="" />
                                <?php endif; ?>
                                <a href="<?php echo site_url($show['url']); ?>" class="item__play">
                                    <i class="ti ti-player-play-filled"></i>
                                </a>
                                <?php if (!empty($show['rating'])) : ?>
                                    <span class="item__rate item__rate--green"><?php echo $show['rating']; ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="item__content">
                                <h3 class="item__title"><a href="<?php echo site_url($show['url']); ?>"><?php echo esc_html($show['name']); ?></a></h3>
                                <span class="item__category">
                                    <?php echo esc_html(implode(', ', $show['genres'])); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="section__more" id="load-more-shows" data-page="1" type="button">Load more</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- section -->
<section class="section section--border">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12">
                <div class="section__title-wrap">
                    <h2 class="section__title">Expected premiere</h2>
                    <a href="catalog.html" class="section__view section__view--carousel">View All</a>
                </div>
            </div>
            <!-- end section title -->

            <!-- carousel -->
            <div class="col-12">
                <div class="section__carousel splide splide--content">
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev" type="button">
                            <i class="ti ti-chevron-left"></i>
                        </button>
                        <button class="splide__arrow splide__arrow--next" type="button">
                            <i class="ti ti-chevron-right"></i>
                        </button>
                    </div>

                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">8.4</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">I Dream in Another Language</a></h3>
                                        <span class="item__category">
                                            <a href="#">Action</a>
                                            <a href="#">Triler</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover2.jpg" alt="">
                                        <a href="<?php echo site_url(); ?>" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">7.1</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Benched</a></h3>
                                        <span class="item__category">
                                            <a href="#">Comedy</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover3.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--red">6.3</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Whitney</a></h3>
                                        <span class="item__category">
                                            <a href="#">Romance</a>
                                            <a href="#">Drama</a>
                                            <a href="#">Music</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover4.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--yellow">6.9</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Blindspotting</a></h3>
                                        <span class="item__category">
                                            <a href="#">Comedy</a>
                                            <a href="#">Drama</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover5.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">8.4</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">I Dream in Another Language</a></h3>
                                        <span class="item__category">
                                            <a href="#">Action</a>
                                            <a href="#">Triler</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover6.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">7.1</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Benched</a></h3>
                                        <span class="item__category">
                                            <a href="#">Comedy</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover7.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">7.1</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Benched</a></h3>
                                        <span class="item__category">
                                            <a href="#">Comedy</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover8.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--red">5.5</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">I Dream in Another Language</a></h3>
                                        <span class="item__category">
                                            <a href="#">Action</a>
                                            <a href="#">Triler</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover9.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--yellow">6.7</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Blindspotting</a></h3>
                                        <span class="item__category">
                                            <a href="#">Comedy</a>
                                            <a href="#">Drama</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover10.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--red">5.6</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Whitney</a></h3>
                                        <span class="item__category">
                                            <a href="#">Romance</a>
                                            <a href="#">Drama</a>
                                            <a href="#">Music</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover11.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">9.2</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">Benched</a></h3>
                                        <span class="item__category">
                                            <a href="#">Comedy</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="item item--carousel">
                                    <div class="item__cover">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover12.jpg" alt="">
                                        <a href="details.html" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        <span class="item__rate item__rate--green">8.4</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="details.html">I Dream in Another Language</a></h3>
                                        <span class="item__category">
                                            <a href="#">Action</a>
                                            <a href="#">Triler</a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end carousel -->
        </div>
    </div>
</section>
<!-- end section -->

<?php
get_footer();
?>
