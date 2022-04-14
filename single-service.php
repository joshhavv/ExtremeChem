<?php 
    get_header();

    while(have_posts()){
        the_post(); 
        pageBanner();
        ?>

        <div class="small-container">
            <div class="generic-content">
                <div class="meta-box">
                    <p><?php the_title();?></p>
                </div>
                <?php the_content(); ?>
            </div>
        </div>  
    
    <?php }

    get_footer();

?>