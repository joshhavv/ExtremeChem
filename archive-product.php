<?php 

get_header();
pageBanner(array(
    'title' => 'All Products',
    'subtitle' => 'The Signature Of Quality.'

));

?>

<section class="blog-content">
    <?php 
        while(have_posts()){
            the_post();?>

        <div class="site-posts">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php the_excerpt();?>
            
            <p><a class="btn-blue" href="<?php the_permalink(); ?>">View Product</a></p>
            <hr>
        </div>
             

       <?php }
       echo paginate_links();
    ?>

</section>
<?php 
    get_footer();
?>