<?php get_header(); ?>

<!-- Features Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <?php if ( have_posts() ) : ?>
                
                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <h1 class="display-6 mb-4"><?php the_title(); ?></h1>
                        <div class="mb-5"><?php the_content(); ?></div>
                        <div class="row mb-5">
                            <div>Trainer rating: </div>
                            <div class="star-rating">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <input type="hidden" id="trainer_id" value="<?php echo get_the_ID(); ?>">
                            <?php 
                                $average_rating = get_post_meta(get_the_ID(), 'average_rating', true);
                                if( $average_rating ) {
                                    echo '<div class="average-rating">Average Rating: <span></span>/5</div>';
                                }
                            ?>
                        </div>
                
                    <?php endwhile; ?>
                
                <?php else : ?>
                    
                    <p>Sorry there is no content!</p>
                
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->

<?php get_footer(); ?>