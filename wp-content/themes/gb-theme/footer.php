<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4"><?php _e( 'Get In Touch', 'gb-theme' ); ?></h4>
                    <h2 class="text-primary mb-4"><i class="fa fa-car text-white me-2"></i><?php _e( 'Drivin', 'gb-theme' ); ?></h2>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php _e( '123 Street, New York, USA', 'gb-theme' ); ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        if ( is_active_sidebar( 'footer-col-1' ) ) {
                            get_sidebar( 'footer-col-1' );
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        if ( is_active_sidebar( 'footer-col-2' ) ) {
                            get_sidebar( 'footer-col-2' );
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4"><?php _e( 'Newsletter', 'gb-theme' ); ?></h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary"><?php _e( 'Sign Up', 'gb-theme' ); ?></button>
                        </div>
                    </form>
                    <h6 class="text-white mt-4 mb-3"><?php _e( 'Follow Us', 'gb-theme' ); ?></h6>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php wp_footer(); ?>
</body>

</html>