jQuery(document).ready(function($) {
    // Bind click event on navigation links (example: menu links)
    $('a.page-link').on('click', function(e) {
        e.preventDefault();
        
        var link = $(this).attr('href');  // Get the link's URL
        
        // Send AJAX request
        $.ajax({
            url: theme_ajax_obj.ajaxurl,   // WordPress AJAX URL
            type: 'GET',
            data: {
                action: 'load_page',     // The action hook in PHP
                url: link                // URL to load the content from
            },
            success: function(response) {
                $('#content-area').html(response);  // Replace the content
                history.pushState(null, null, link);  // Update the browser's address bar
            }
        });
    });

    $.ajax({
        url: theme_ajax_obj.ajaxurl,
        type: 'GET',
        data: {
            action: 'load_page',
            url: link
        },
        beforeSend: function() {
            $('#content-area').addClass('loading');  // Show loading state
        },
        success: function(response) {
            $('#content-area').removeClass('loading').html(response);
            history.pushState(null, null, link);
        }
    });
    
});
