jQuery(document).ready(function ($) {

    $('#load-more-shows').click(function () {

        const button = $(this);
        const page = button.data('page');
        const nextPage = parseInt(page) + 1;

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_shows',
                page: page,
                nonce: ajax_params.nonce,
            },
            beforeSend: function () {
                button.text('Loading...');
            },
            success: function (response) {
                if (response.success && response.data.html) {
                    // Append new shows to the container
                    $('#shows-container').append(response.data.html);
                    // Update button text and data-page
                    button.text('Load More').data('page', nextPage).prop('disabled', false);
                } else {
                    // Handle "no more shows" or error cases
                    button.text('No more shows').prop('disabled', true);
                }
            },
        });
    });
});
