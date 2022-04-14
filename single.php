<?php 
    get_header();

    while(have_posts()){
        the_post(); 
        pageBanner();
        
        ?>

        <div class="small-container">
            <div class="generic-content">
                <div class="meta-box">
                    <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('j.n.y');?> in <?php echo get_the_category_list(', '); ?>.</p>
                </div>
                <?php the_content(); ?>
            </div>
        </div>  
    
    <?php }

    get_footer();

?>
