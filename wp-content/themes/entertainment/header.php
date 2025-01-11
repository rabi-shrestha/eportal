<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>
<body>    

    <header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="">
						</a>
						<!-- end header logo -->

                        <nav class="main-menu">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'main_menu', 
            'container' => false, // No container, just the menu itself
            'menu_class' => 'menu-items', // Class for the <ul> element
        ) );
        ?>
    </nav>
    
						<!-- header nav -->
						<ul class="header__nav">
							<!-- dropdown -->
							<li class="header__nav-item">
								<a href="<?php echo esc_url(home_url('/')); ?>" class="header__nav-link">Home</a>
							</li>
							<!-- end dropdown -->

							<li class="header__nav-item">
								<a href="<?php echo esc_url(home_url('/shows')); ?>" class="header__nav-link">Shows</a>
							</li>

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog <i class="ti ti-chevron-down"></i></a>

								<ul class="dropdown-menu header__dropdown-menu">
									<li><a href="catalog.html">Catalog style 1</a></li>
									<li><a href="catalog2.html">Catalog style 2</a></li>
									<li><a href="details.html">Details Movie</a></li>
									<li><a href="details2.html">Details TV Series</a></li>
								</ul>
							</li>
							<!-- end dropdown -->

							<li class="header__nav-item">
								<a href="pricing.html" class="header__nav-link">Pricing plan</a>
							</li>

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages <i class="ti ti-chevron-down"></i></a>

								<ul class="dropdown-menu header__dropdown-menu">
									<li><a href="about.html">About Us</a></li>
									<li><a href="profile.html">Profile</a></li>
									<li><a href="actor.html">Actor</a></li>
									<li><a href="contacts.html">Contacts</a></li>
									<li><a href="faq.html">Help center</a></li>
									<li><a href="privacy.html">Privacy policy</a></li>
									<li><a href="https://hotflix.volkovdesign.com/admin/index.html" target="_blank">Admin pages</a></li>
								</ul>
							</li>
							<!-- end dropdown -->

							<!-- dropdown -->
							<li class="header__nav-item">
								<a class="header__nav-link header__nav-link--more" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots"></i></a>

								<ul class="dropdown-menu header__dropdown-menu">
									<li><a href="signin.html">Sign in</a></li>
									<li><a href="signup.html">Sign up</a></li>
									<li><a href="forgot.html">Forgot password</a></li>
									<li><a href="404.html">404 Page</a></li>
								</ul>
							</li>
							<!-- end dropdown -->
						</ul>
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">
							<form action="#" class="header__search">
								<input class="header__search-input" type="text" placeholder="Search...">
								<button class="header__search-button" type="button">
									<i class="ti ti-search"></i>
								</button>
								<button class="header__search-close" type="button">
									<i class="ti ti-x"></i>
								</button>
							</form>

							<button class="header__search-btn" type="button">
								<i class="ti ti-search"></i>
							</button>

							<!-- dropdown -->
							<div class="header__profile">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">EN <i class="ti ti-chevron-down"></i></a>

                                <ul class="dropdown-menu header__dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">French</a></li>
                                </ul>
							</div>
							<!-- end dropdown -->
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
