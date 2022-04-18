<?php 

get_header();
pageBanner(array(
    'title' => 'Search Results',
    'subtitle' => 'You searched for &ldquo;' . esc_html(get_search_query(false)) . '&rdquo;'
));

?>

<section class="blog-content">
    <?php 

        if(have_posts()) {

            while(have_posts()){
                the_post();
                get_template_part('template-parts/content', get_post_type());
            }
           echo paginate_links();

        }else {
            echo '<h3>No results match that search.</h3>';
        }

        get_search_form();

    ?>

<?php get_footer();

?>