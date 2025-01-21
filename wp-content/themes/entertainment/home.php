<?php
get_header(); ?>

<section class="home home--hero">
    <div class="container">
        <div class="row">
            <!-- hero carousel -->
            <div class="col-12">
                <div class="hero splide splide--hero">
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
                                <div class="hero__slide" data-bg="<?php echo get_template_directory_uri(); ?>/img/bg/slide__bg-1.jpg">
                                    <div class="hero__content">
                                        <h2 class="hero__title">Savage Beauty <sub class="green">9.8</sub></h2>
                                        <p class="hero__text">A brilliant scientist discovers a way to harness the power of the ocean's currents to create a new, renewable energy source. But when her groundbreaking technology falls into the wrong hands, she must race against time to stop it from being used for evil.</p>
                                        <p class="hero__category">
                                            <a href="#">Action</a>
                                            <a href="#">Drama</a>
                                            <a href="#">Comedy</a>
                                        </p>
                                        <div class="hero__actions">
                                            <a href="details.html" class="hero__btn">
                                                <span>Watch now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="hero__slide" data-bg="<?php echo get_template_directory_uri(); ?>/img/bg/slide__bg-2.jpg">
                                    <div class="hero__content">
                                        <h2 class="hero__title">From the Other Side <sub class="yellow">6.9</sub></h2>
                                        <p class="hero__text">In a world where magic is outlawed and hunted, a young witch must use her powers to fight back against the corrupt authorities who seek to destroy her kind.</p>
                                        <p class="hero__category">
                                            <a href="#">Adventure</a>
                                            <a href="#">Triler</a>
                                        </p>
                                        <div class="hero__actions">
                                            <a href="details.html" class="hero__btn">
                                                <span>Watch now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                                <div class="hero__slide" data-bg="<?php echo get_template_directory_uri(); ?>/img/bg/slide__bg-3.jpg">
                                    <div class="hero__content">
                                        <h2 class="hero__title">Endless Horizon <sub class="red">6.2</sub></h2>
                                        <p class="hero__text">When a renowned archaeologist goes missing, his daughter sets out on a perilous journey to the heart of the Amazon rainforest to find him. Along the way, she discovers a hidden city and a dangerous conspiracy that threatens the very balance of power in the world.</p>
                                        <p class="hero__category">
                                            <a href="#">Action</a>
                                            <a href="#">Drama</a>
                                            <a href="#">Triler</a>
                                        </p>
                                        <div class="hero__actions">
                                            <a href="details.html" class="hero__btn">
                                                <span>Watch now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- hero carousel -->
        </div>
    </div>
</section>

<div>
    <!-- filter (fixed position) -->
    <?php include locate_template('partials/filter-option.php'); ?>
    <!-- end filter (fixed position) -->
    
    <!-- catalog -->
    <div class="section section--catalog">
        <div class="container">
            <div class="row">
                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover2.jpg" alt="">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover13.jpg" alt="">
                            <a href="details.html" class="item__play">
                                <i class="ti ti-player-play-filled"></i>
                            </a>
                            <span class="item__rate item__rate--green">8.0</span>
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover14.jpg" alt="">
                            <a href="details.html" class="item__play">
                                <i class="ti ti-player-play-filled"></i>
                            </a>
                            <span class="item__rate item__rate--green">7.2</span>
                            <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                        </div>
                        <div class="item__content">
                            <h3 class="item__title"><a href="details.html">Benched</a></h3>
                            <span class="item__category">
                                <a href="#">Comedy</a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover15.jpg" alt="">
                            <a href="details.html" class="item__play">
                                <i class="ti ti-player-play-filled"></i>
                            </a>
                            <span class="item__rate item__rate--yellow">5.9</span>
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover16.jpg" alt="">
                            <a href="details.html" class="item__play">
                                <i class="ti ti-player-play-filled"></i>
                            </a>
                            <span class="item__rate item__rate--green">8.3</span>
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover17.jpg" alt="">
                            <a href="details.html" class="item__play">
                                <i class="ti ti-player-play-filled"></i>
                            </a>
                            <span class="item__rate item__rate--green">8.0</span>
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
                </div>
                <!-- end item -->

                <!-- item -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="item">
                        <div class="item__cover">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/covers/cover18.jpg" alt="">
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
                </div>
                <!-- end item -->
            </div>

            <div class="row">
                <!-- more -->
                <div class="col-12">
                    <button class="section__more" type="button">Load more</button>
                </div>
                <!-- end more -->
            </div>
        </div>
    </div>
    <!-- end catalog -->
</div>
	
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
	
<?php
get_footer();