document.addEventListener('DOMContentLoaded', function () {
    const searchBtn = document.querySelector('.header__search-btn');
    const searchForm = document.querySelector('.header__search');
    const searchClose = document.querySelector('.header__search-close');

    if (searchBtn && searchForm) {
        // Show search form
        searchBtn.addEventListener('click', function () {
            searchForm.classList.add('active');
        });

        // Close search form
        searchClose.addEventListener('click', function () {
            searchForm.classList.remove('active');
        });
    }
});