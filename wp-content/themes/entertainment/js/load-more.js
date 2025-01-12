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
                if (response === 'no more shows') {
                    button.text('No more shows').prop('disabled', true);
                } else {
                    $('#shows-container').append(response);
                    button.text('Load More').data('page', nextPage);
                }
            },
        });
    });
});
