<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer__content">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="">
                    </a>

                    <span class="footer__copyright">&copy; <?php echo date('Y'); ?> Entertainment</span>

                    <nav class="footer__nav">
                        <a href="about.html">About Us</a>
                        <a href="contacts.html">Contacts</a>
                        <a href="privacy.html">Privacy policy</a>
                    </nav>

                    <button class="footer__back" type="button">
                        <i class="ti ti-arrow-narrow-up"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="mfilter">
    <div class="mfilter__head">
        <h6 class="mfilter__title">Filter</h6>

        <button class="mfilter__close" type="button"><i class="ti ti-x"></i></button>
    </div>

    <div class="mfilter__select-wrap">
        <div class="sign__group">
            <select class="filter__select" name="mgenre" id="mfilter__genre">
                <option value="0">All genres</option>
                <option value="1">Action/Adventure</option>
                <option value="2">Animals</option>
                <option value="3">Animation</option>
                <option value="4">Biography</option>
                <option value="5">Comedy</option>
                <option value="6">Cooking</option>
                <option value="7">Dance</option>
                <option value="8">Documentary</option>
                <option value="9">Drama</option>
                <option value="10">Education</option>
                <option value="11">Entertainment</option>
                <option value="12">Family</option>
                <option value="13">Fantasy</option>
                <option value="14">History</option>
                <option value="15">Horror</option>
                <option value="16">Independent</option>
                <option value="17">International</option>
                <option value="18">Kids</option>
                <option value="19">Medical</option>
                <option value="20">Military/War</option>
                <option value="21">Music</option>
                <option value="22">Mystery/Crime</option>
                <option value="23">Nature</option>
                <option value="24">Paranormal</option>
                <option value="25">Politics</option>
                <option value="26">Racing</option>
                <option value="27">Romance</option>
                <option value="28">Sci-Fi/Horror</option>
                <option value="29">Science</option>
                <option value="30">Science Fiction</option>
                <option value="31">Science/Nature</option>
                <option value="32">Spanish</option>
                <option value="33">Travel</option>
                <option value="34">Western</option>
            </select>
        </div>

        <div class="sign__group">
            <select class="filter__select" name="mquality" id="mfilter__quality">
                <option value="0">Any quality</option>
                <option value="1">HD 1080</option>
                <option value="2">HD 720</option>
                <option value="3">DVD</option>
                <option value="4">TS</option>
            </select>
        </div>

        <div class="sign__group">
            <select class="filter__select" name="mrate" id="mfilter__rate">
                <option value="0">Any rating</option>
                <option value="1">from 3.0</option>
                <option value="2">from 5.0</option>
                <option value="3">from 7.0</option>
                <option value="4">Golder Star</option>
            </select>
        </div>

        <div class="sign__group">
            <select class="filter__select" name="msort" id="mfilter__sort">
                <option value="0">Relevance</option>
                <option value="1">Newest</option>
                <option value="2">Oldest</option>
            </select>
        </div>
    </div>

    <button class="mfilter__apply" type="button">Apply</button>
</div>

<div class="modal fade" id="plan-modal" tabindex="-1" aria-labelledby="plan-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <button class="modal__close" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-x"></i></button>

                <form action="#" class="modal__form">
                    <h4 class="modal__title">Select plan</h4>

                    <div class="sign__group">
                        <label for="fullname" class="sign__label">Name</label>
                        <input id="fullname" type="text" name="name" class="sign__input" placeholder="Full name">
                    </div>

                    <div class="sign__group">
                        <label for="email" class="sign__label">Email</label>
                        <input id="email" type="text" name="email" class="sign__input" placeholder="example@domain.com">
                    </div>

                    <div class="sign__group">
                        <label class="sign__label" for="value">Choose plan:</label>
                        <select class="sign__select" name="value" id="value">
                            <option value="35">Premium - $34.99</option>
                            <option value="50">Cinematic - $49.99</option>
                        </select>

                        <span class="sign__text">You can spend money from your account on the renewal of the connected packages, or to order cars on our website.</span>
                    </div>

                    <div class="sign__group">
                        <label class="sign__label">Payment method:</label>

                        <ul class="sign__radio">
                            <li>
                                <input id="type1" type="radio" name="type" checked="">
                                <label for="type1">Visa</label>
                            </li>
                            <li>
                                <input id="type2" type="radio" name="type">
                                <label for="type2">Mastercard</label>
                            </li>
                            <li>
                                <input id="type3" type="radio" name="type">
                                <label for="type3">Paypal</label>
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="sign__btn sign__btn--modal">
                        <span>Proceed</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
