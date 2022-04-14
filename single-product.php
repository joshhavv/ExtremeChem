<?php 
    get_header();

    while(have_posts()){
        the_post(); 
        pageBanner();
        ?>

       

        <div class="container">
            <div class="row">
                <div class="col-2">
                    <?php the_content(); ?>    
                </div>
                <div class="col-2">
                    <?php the_post_thumbnail('productLandscape'); ?> 
                </div>
            </div>
        </div>
        
    <?php }

    get_footer();

?>