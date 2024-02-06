jQuery(document).ready(function($) {
    $('.star').click(function() {
        var star = $(this).data('value');
        var post_id = $('#trainer_id').val();
        console.log(star);
        
        $.ajax({
            type: "POST",
            url: my_ajax_object.ajax_url,
            data: {
                action: 'submit_star_rating',
                post_id: post_id,
                rating: star,
            },
            success: function(response) {
                var data = JSON.parse(response);
                alert('Thanks for your rating! New average rating: ' + data.average_rating);
                
                // Update the UI with the new average rating
                $('.average-rating').text('Average Rating: ' + data.average_rating + '/5');
            },
            error: function() {
                alert('An error occurred.');
            }
        });
    });
});