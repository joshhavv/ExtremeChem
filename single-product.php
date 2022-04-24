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

                    <?php 
                        $likeCount = new WP_Query(array(
                            'post_type' => 'like',
                            'meta_query' => array(
                              array(
                                'key' => 'liked_product_id',
                                'compare' => '=',
                                'value' => get_the_ID()
                              )
                            )
                        ));

                        $existStatus = 'no';

                        $existQuery = new WP_Query(array(
                            'author' => get_current_user_id(),
                            'post_type' => 'like',
                            'meta_query' => array(
                              array(
                                'key' => 'liked_product_id',
                                'compare' => '=',
                                'value' => get_the_ID()
                              )
                            )
                        ));

                        if($existQuery->found_posts) {
                            $existStatus = 'yes';
                        }
                    ?>

                    <span class="like-box" data-exists="<?php echo $existStatus; ?>">
                        <i class="far fa-heart fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart solid" aria-hidden="true"></i>
                        <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
                    </span>    
                </div>
                <div class="col-2">
                    <?php the_post_thumbnail('productLandscape'); ?> 
                </div>
            </div>
        </div>
        
    <?php }

    get_footer();

?>