<?php 

    get_header();

    while(have_posts()){
        the_post(); 
        pageBanner();
        ?>

        <div class="small-container">
            <div class="generic-content">
                <?php the_content(); ?>
            </div>
        </div>  
       
    <?php }

    get_footer();

?>
