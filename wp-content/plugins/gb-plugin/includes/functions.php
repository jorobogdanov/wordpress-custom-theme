<?php

/**
 * Register shortcode that retrieves and displays featured courses.
 */
function get_featured_courses($atts) {

    $atts = shortcode_atts(array(
        'posts_per_page' => 3, // Default to 3 if no parameter is passed
    ), $atts, 'display_featured_courses');

    $posts_per_page = intval($atts['posts_per_page']);

    $courses_query_args = array(
        'post_type'      => 'course',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_per_page,
        'meta_query'     => array(
            array(
                'key'     => 'is_featured',
                'value'   => 1,
                'compare' => '=',
            ),
        ),
    );

    $courses_query = new WP_Query($courses_query_args);

    ob_start();

    if ($courses_query->have_posts()) : while ($courses_query->have_posts()) : $courses_query->the_post();
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail');
        ?>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
                <div class="text-center p-4 pt-0">
                    <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">$<?php echo get_field("course_price"); ?></div>
                    <h5 class="mb-3"><?php the_title(); ?></h5>
                    <p><?php the_excerpt(); ?></p>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i><?php echo get_field("course_type"); ?></li>
                        <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo get_field("course_duration"); ?></li>
                    </ol>
                </div>
                <div class="position-relative mt-auto">
                    <?php if (!empty($featured_img_url)) : ?>
                        <img class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="">
                    <?php else : ?>
                        <img class="img-fluid" src="/wp-content/themes/gb-theme/img/courses-1.jpg" alt="">
                    <?php endif; ?>
                    <div class="courses-overlay">
                        <a class="btn btn-outline-primary border-2" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endwhile; endif;

    wp_reset_postdata();

    $output = ob_get_clean();

    return $output;
}

add_shortcode('display_featured_courses', 'get_featured_courses');

/**
 * Function for the Ajax call handling the trainer votes
 */
function submit_star_rating() {
    $post_id = $_POST['post_id'];
    $rating = $_POST['rating'];
    
    // Assuming each post stores ratings in an array of individual ratings
    $ratings = get_post_meta($post_id, 'ratings', true);

    if (empty($ratings)) {
        $ratings = array();
    }
    
    $ratings[] = $rating;
    
    update_post_meta($post_id, 'ratings', $ratings);

    // Optionally calculate and save the average rating for easier retrieval
    $average_rating = array_sum($ratings) / count($ratings);
    update_post_meta($post_id, 'average_rating', $average_rating);

    echo json_encode( array( 'average_rating' => round( $average_rating, 1 ) ) );
    wp_die(); // this is required to terminate immediately and return a proper response
}

add_action('wp_ajax_submit_star_rating', 'submit_star_rating'); // For logged in users
add_action('wp_ajax_nopriv_submit_star_rating', 'submit_star_rating'); // For anonymous users

/**
 * Capitalize post titles
 */
function capitalise_post_titles( $title ) {
    return ucwords( $title );
}

add_filter( 'the_title', 'capitalise_post_titles' );