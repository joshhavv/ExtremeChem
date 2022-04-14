<?php 

get_header();
pageBanner(array(
    'title' => 'Our Services',
    'subtitle' => 'The Signature Of Quality'
));

?>

<section class="blog-content">

    <ul>
    <?php 
        while(have_posts()){
            the_post();?>

        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>     

       <?php }
       echo paginate_links();
    ?>
    </ul>

</section>
<?php 
    get_footer();
?>