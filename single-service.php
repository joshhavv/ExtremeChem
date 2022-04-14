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
                <?php the_field('main_body_content'); ?>
            </div>
        </div>  
    
    <?php }

    get_footer();

?>