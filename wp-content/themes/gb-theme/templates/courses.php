<?php
/**
 * Template name: Courses
 */
?>
<?php get_header(); ?>

<!-- Courses Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">Tranding Courses</h6>
            <h1 class="display-6 mb-4">Our Courses Upskill You With Driving Training</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php 
                $courses_query_args = array(
                    'post_type'      => 'course',
                    'post_status'    => 'publish'
                );
            
                $course_query = new WP_Query( $courses_query_args );
            ?>
            <?php if ( $course_query->have_posts() ) : ?>
                <?php while( $course_query->have_posts() ) : $course_query->the_post(); ?>
                    <?php
                        $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' );
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
                            <div class="text-center p-4 pt-0">
                                <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">$<?php echo get_field( "course_price" ); ?></div>
                                <h5 class="mb-3"><?php echo the_title(); ?></h5>
                                <p><?php echo the_excerpt(); ?></p>
                                <ol class="breadcrumb justify-content-center mb-0">
                                    <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i><?php echo get_field( "course_type" ); ?></li>
                                    <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo get_field( "course_duration" ); ?></li>
                                </ol>
                            </div>
                            <div class="position-relative mt-auto">
                                <?php if ( ! empty( $featured_img_url ) ) : ?>
                                    <img class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="">
                                <?php else : ?>
                                    <img class="img-fluid" src="/wp-content/themes/gb-theme/img/courses-1.jpg" alt="">
                                <?php endif; ?>
                                <div class="courses-overlay">
                                    <a class="btn btn-outline-primary border-2" href="<?php echo the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Courses End -->

<?php get_footer(); ?>