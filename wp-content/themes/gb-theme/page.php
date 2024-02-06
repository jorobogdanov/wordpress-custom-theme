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
                
                    <?php endwhile; ?>
                
                <?php else : ?>
                    
                    <p><?php _e( 'Sorry there is no content!', 'gb-theme' ); ?></p>
                
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->

<?php get_footer(); ?>