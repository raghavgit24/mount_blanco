<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 about-column">
                <?php dynamic_sidebar('footer-about-column'); ?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 explore-column">
                <?php dynamic_sidebar('footer-explore-column'); ?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 links-column">
                <?php dynamic_sidebar('footer-links-column'); ?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 px-0 col-12 connect-section">
                <div class="row">                            
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-5 col-12 follow-us social-media-icons media-icons-column">
                        <?php dynamic_sidebar('footer-connect-follow-us'); ?>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-7 col-12 get-us-on">
                        <div class="image-icons">
                            <?php dynamic_sidebar('footer-connect-get-us'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<section class="post-footer">
    <p>Copyright @ <?php echo get_the_date('Y'); ?> Mount Blanco </p>
    <button onclick="topFunction()" id="myBtn"><i class="fas fa-arrow-circle-up fa-3x"></i></button>
</section>

<?php wp_footer(); ?>
</body>
</html>