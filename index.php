<?php 

get_header();
pageBanner(array(
    'title' => 'Welcome to our blog!',
    'subtitle' => 'Keep up with our latest news.'
));

?>

<section class="blog-content">
    <?php 
        while(have_posts()){
            the_post();?>

        <div class="site-posts">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <div class="meta-box">
                <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('j.n.y');?> in <?php echo get_the_category_list(', '); ?>.</p>
            </div>
            <?php the_excerpt();?>
            
            <p><a class="btn-blue" href="<?php the_permalink(); ?>">Continue reading  &#8811</a></p>
            <hr>
        </div>
             

       <?php }
       echo paginate_links();
    ?>

    <div class="row">
        <div class="blog-left">
        <h3>Post Categories</h3>
            <div>
                <span>Business Analytics</span>
                <span>21</span>
            </div>
            <div>
                <span>Quality Control</span>
                <span>37</span>
            </div>
            <div>
                <span>Data Science</span>
                <span>09</span>
            </div>
            <div>
                <span>Total Hygiene</span>
                <span>42</span>
            </div>
            <div>
                <span>Machine Learning</span>
                <span>17</span>
            </div>
            <div>
                <span>Clean and Safe Environment</span>
                <span>39</span>
            </div>

        </div>

        <div class="blog-right">
            <div class="comment-box">
                <h3>Leave a comment</h3>
                <form class="comment-form" action="">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <textarea rows="5" placeholder="Your Comment"></textarea>
                    <button class="btn" type="submit">Post Comment</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</section>
<?php get_footer();

?>