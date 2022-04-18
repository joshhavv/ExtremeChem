<div class="site-posts">
    
    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
    <div class="meta-box">
        <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('j.n.y');?> in <?php echo get_the_category_list(', '); ?>.</p>
    </div>
    <?php the_excerpt();?>
                
    <p><a class="btn-blue" href="<?php the_permalink(); ?>">Continue reading  &#8811</a></p>
    
</div>
<hr>