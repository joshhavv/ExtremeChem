<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="site-header" >
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_file_uri('/images/istockphoto-133372893-612x612...jpg') ?>" alt="logo"></a> 
                    </div>
                    <nav>
                       <ul class="menuItems" id="MenuItems">
                            <li><a href="<?php echo site_url(); ?>">Home</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('product'); ?>">Products</a></li>
                            <li><a href="<?php echo get_post_type_archive_link('service'); ?>">Services</a></li>
                            <li><a href="<?php echo site_url('/about-us'); ?>">About</a></li>
                            <li><a href="<?php echo site_url('/contact-us'); ?>">Contact</a></li>
                            <li><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
                        </ul>
                    </nav>
                    <a href="<?php echo esc_url(site_url('/search')); ?>"><i class="fa fa-search" aria-hidden="true"></i></a> 
                    <i class="fas fa-bars"></i>
                    
                </div>
            </div>
        </header>
    
    



