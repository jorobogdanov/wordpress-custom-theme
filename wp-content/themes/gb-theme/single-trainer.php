<?php get_header(); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4"><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Features</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Features Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <h3>This is single trainer template</h3>
                <?php if ( have_posts() ) : ?>
                
                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <h1 class="display-6 mb-4"><?php the_title(); ?></h1>
                        <div class="mb-5"><?php the_content(); ?></div>
                
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