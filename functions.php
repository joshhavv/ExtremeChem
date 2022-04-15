<?php

require get_theme_file_path('/inc/search-route.php');

function extreme_custom_rest() {
    register_rest_field('post', 'authorName', array(
        'get_callback' => function() {return get_the_author();}
    ));
}

add_action('rest_api_init', 'extreme_custom_rest');

    function pageBanner($args = NULL){
        if(!$args['title']){
            $args['title'] = get_the_title();
        }

        if(!$args['subtitle']){
            $args['subtitle'] = get_field('page_banner_subtitle');
        }
        if(!$args['photo']){
            if(get_field('page_banner_background_image')){
                $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
            }else{
                $args['photo'] = get_theme_file_uri('/images/pexels-photo-346529.jpeg');
            }
        }
        ?>
        <div class="page-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(<?php echo $args['photo'] ?>);">
            <div class="container page-banner-content">
                <h1><?php echo $args ['title']?></h1>
                <div class="page-banner-intro">
                    <p><?php echo $args['subtitle']; ?></p>
                </div>
            </div>
        </div>
    <?php }


    function extreme_files(){
        
        wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.13.0/css/all.css');
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

        if(strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')){
            wp_enqueue_script('extreme-chemicals-js', get_theme_file_uri('/js/scripts.js') , NULL, '1.0.1', true);
            wp_enqueue_style('site_styles', get_stylesheet_uri());
        }else{
            wp_enqueue_script('extreme-chemicals-js', get_theme_file_uri('/bundled-assets/scripts.c447099754a1f981343c.js'), NULL, '1.0.1', true);
            wp_enqueue_style('site_styles', get_stylesheet_uri('/bundled-assets/undefined'));
        }

        wp_localize_script('extreme-chemicals-js', 'extremeData', array(
            'root_url' => get_site_url()
        ));
        
         
    }
    add_action('wp_enqueue_scripts', 'extreme_files');

    function extreme_features(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('productPotrait', 400, 350, true);
        add_image_size('productLandscape', 300, 300, true);
        add_image_size('pageBanner', 1500, 350, true);
    }
    
    add_action('after_setup_theme', 'extreme_features');

    function extreme_adjust_queries($query){
        if(!is_admin() AND is_post_type_archive('service') AND is_main_query()){
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', -1);
        }
    }

    add_action('pre_get_posts', 'extreme_adjust_queries');
