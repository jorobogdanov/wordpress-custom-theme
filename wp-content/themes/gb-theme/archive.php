<?php get_header(); ?>

<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'paged' => $paged
    );
    $query = new WP_Query($args);
?>

<div class="container-xxl courses my-6 py-6 pb-0">
    <div class="container">
        <?php if ($query->have_posts()) : ?>
            <div class="row g-4 justify-content-center">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <h5 class="mb-3"><?php the_title(); ?></h5>
                            <p><?php the_excerpt(); ?></p>
                            <?php
                                $content = get_the_content();
                                $word_count = str_word_count(strip_tags($content));
                                $reading_time = ceil($word_count / 150); // Assuming an average reading speed of 150 words per minute
                            ?>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i><?php echo 'Reading time: ' . $reading_time . ' minutes'; ?></li>
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <?php echo get_the_post_thumbnail(); ?>
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endwhile; ?>

            </div>

            <div class="pagination">
                <?php
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'current' => max(1, $paged),
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;'
                    ));
                ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            No posts found.

        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>