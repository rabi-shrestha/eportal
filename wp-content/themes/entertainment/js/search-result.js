jQuery(document).ready(function ($) {
    $('#filter__genre').on('change', function () {
        const genreId = $(this).val();

        $.ajax({
            url: ajaxObject.ajaxurl, // WordPress automatically provides the AJAX URL
            method: 'POST',
            data: {
                action: 'filter_genre', // Hook for processing the request
                genre: genreId,        // Pass the selected genre ID
            },
            beforeSend: function () {
                // Optional: Add a loading spinner or disable the dropdown
                $('#filter__genre').prop('disabled', true);
                $('.preloader').html('<div id="preloader"><div class="spinner"></div></div>');
            },
            success: function (response) {
                $('#shows-container').html(response); // Replace results with response
            },
            complete: function () {
                // Re-enable the dropdown
                $('#filter__genre').prop('disabled', false);
                $('.preloader').html('');
            },
        });
    });
});