<section class="moc-section bpa-blog">
    <h3>Blog</h3>
    <p>Read the latest articles on Business Process Automation and<br> how it can help your business grow faster</p>
    <div class="moc-inner">

        <div class="bpa-blog-items">
            <?php 
            $original_query = $wp_query;
            $wp_query = null;
            $args=array('posts_per_page'=>2, 'tag' => "BPA");
            $wp_query = new WP_Query( $args );
            if ( have_posts() ) :
                while (have_posts()) : the_post();
                    echo '<div class="bpa-post '. get_the_ID() .'">';
                    echo '<div class="post-img__wraper"><a href="' . get_the_permalink() . '">' . get_the_post_thumbnail($id, 'bpa_blog') . '</a></div>';
                    echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>'; // выводим ссылку
                    echo '</div>';
                endwhile;
            endif;
            $wp_query = null;
            $wp_query = $original_query;
            wp_reset_postdata();
            ?>
        </div>        
    </div>
    <div class="read-more-block">
        <a href="https://masterofcode.com/blog" class="bpa-read-more" rel="nofollow noreferrer" id="read-more">Read More <i class="arrow right"></i></a>
    </div>
</section>