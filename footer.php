        
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download App for Android and IOS mobile.</p>
                        <div class="app-logo">
                            <img src="<?php echo get_theme_file_uri('/images/get-it-on-google-play-badge-logo-8CDE582776-seeklogo.com.png') ?>" alt="">
                            <img src="<?php echo get_theme_file_uri('/images/appstore-logo-D8779EF6D1-seeklogo.com.png') ?>" alt="">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_file_uri('/images/istockphoto-133372893-612x612...jpg') ?>" class="menu-icon"></a>
                        <p>Our purpose is to provide the best quality chemical products and services to our customers.</p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <a href="<?php echo site_url(); ?>"><li>Home</li></a>
                            <li><a href="<?php echo get_post_type_archive_link('product'); ?>">Products</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('service'); ?>">Services</a></li>
                            <li><a href="<?php echo site_url('/contact-us'); ?>">Contact</a></li>
                            <li><a href="<?php echo site_url('/about-us'); ?>">About</a></li>
                            <li><a href="<?php echo site_url('/blog'); ?>">Blog Post</a></li>
                            <a href="<?php echo site_url('/privacy-policy'); ?>"><li>Privacy Policy</li></a>
                            
                            <?php if(is_user_logged_in()) { ?>
                                <span><?php echo get_avatar(get_current_user_id(), 50); ?></span> 
                                <li><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>

                            <?php } else { ?>
                                <li><a href="<?php echo wp_login_url(); ?>">Login</a></li>
                                <li><a href="<?php echo wp_registration_url(); ?>">Sign Up</a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>You Tube</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="copyright">
                    <p>Created with <i class="far fa-heart"></i> by Joshua Havv</p>
                    <h5>Copyright <i class="far fa-copyright"></i> 2022 Extreme Web Design and Development.</h5>
                </div>
                
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>