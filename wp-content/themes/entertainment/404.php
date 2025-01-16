<?php
get_header();
?>
<div class="page-404 section--bg" data-bg="<?php echo get_template_directory_uri(); ?>/img/bg/section__bg.jpg" style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg/section__bg.jpg) center center / cover no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-404__wrap">
                    <div class="page-404__content">
                        <h1 class="page-404__title">404</h1>
                        <p class="page-404__text">The page you are looking for is <br>not available!</p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="page-404__btn">go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
