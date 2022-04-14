
        <?php get_header();?>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>The Signature of Quality!</h1>
                <p>Extreme Chemicals (Pty) Ltd is engaged in the manufacture, marketing of specialist cleaning and hygiene chemicals, systems for use in a wide range of focus sectors and also offers an innovative line of biodegradable environmentally safe chemical products to janitorial services, retail outlets and customers.</p>
                <a href="<?php echo site_url('/about-us'); ?>" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src="<?php echo get_theme_file_uri('/images/pexels-photo-8540002.jpeg') ?>" alt="">
            </div>
        </div>
    </div>
</div>    

<!--------------Featured categories-------------------->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo get_theme_file_uri('/images/pexels-photo-2760244.jpeg') ?>" alt="">
                
            </div>
            <div class="col-3">
                <img src="<?php echo get_theme_file_uri('/images/pexels-photo-4098576.jpeg') ?>" alt="">
                
            </div>
            <div class="col-3">
                <img src="<?php echo get_theme_file_uri('/images/pexels-photo-5827287.jpeg') ?>" alt="">
                
            </div>    
        </div>
    </div>
</div>

<!--------------Featured Products-------------------->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
    
    <div class="row"> 
        <?php 
            
            $homepageProducts = new WP_Query(array(
                'posts_per_page' => 4,
                'post_type' => 'product',
                'orderby' => 'title',
                'order' => 'ASC'
            ));
            while($homepageProducts->have_posts()){
                $homepageProducts->the_post(); ?>
                <div class="col-4">
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                    <p><?php if(has_excerpt()){
                        echo get_the_excerpt();
                    }else{
                        echo wp_trim_words(get_the_content(), 14);
                    } ?> <a href="<?php the_permalink(); ?>" class="btn-blue">View Product</a></p>
                </div>

            <?php }    
        ?>    
    </div>

</div>

<!------------------Offer--------------------->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo get_theme_file_uri('/images/HAND SANITIZER 5LT LABLE.jpg') ?>" class="offer-img">
            </div>
            <div class="col-2">
                <p>Exclusively available on ExtremeStore</p>
                <h1>Hand Sanitizer Gel</h1>
                <small>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small>
                <a href="" class="btn">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>

<!---------------Testimonials----------------->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fas fa-quote-left"></i>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <img src="<?php echo get_theme_file_uri('/images/istockphoto-1189198083-612x612.jpg') ?>" alt="">
                <h3>Caroline Schmidt</h3>
            </div>
            <div class="col-3">
                <i class="fas fa-quote-left"></i>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <img src="<?php echo get_theme_file_uri('/images/customer-pic5.jpg') ?>" alt="">
                <h3>Thandiwe Nkosi</h3>
            </div>
            <div class="col-3">
                <i class="fas fa-quote-left"></i>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <img src="<?php echo get_theme_file_uri('/images/istockphoto-1277873802-612x612.jpg') ?>" alt="">
                <h3>Friedrich Apolles</h3>
            </div>
        </div>
    </div>
</div>

<!------------------Call to Action------------------>
<section class="cta">
    <a href="<?php echo site_url('/contact-us'); ?>" class="hero-btn">Get in touch</a>
</section>

<!----------------Brands----------------->
<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="<?php echo get_theme_file_uri('/images/Bosch-logo-51D487B09E-seeklogo.com.png') ?>" alt="">
            </div>
            <div class="col-5">
                <img src="<?php echo get_theme_file_uri('/images/samsung-logo-8A87EDFB33-seeklogo.com.png') ?>" alt="">
            </div>
            <div class="col-5">
                <img src="<?php echo get_theme_file_uri('/images/paypal-logo-E0480A58E5-seeklogo.com.png') ?>" alt="">
            </div>
            <div class="col-5">
                <img src="<?php echo get_theme_file_uri('/images/Coca-Cola-logo-612C3B2732-seeklogo.com.png') ?>" alt="">
            </div>
            <div class="col-5">
                <img src="<?php echo get_theme_file_uri('/images/VISA-logo-A32D589D31-seeklogo.com.png') ?>" alt="">
            </div>
        </div>
    </div>
</div>

<?php    get_footer();?>


