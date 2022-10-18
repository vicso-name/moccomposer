
<?php
$categories = get_the_category();
$active_categories = array();
$post_id = get_the_ID();
$by_categories = false;
$post_pagination_count = 0;
$pagination_posts = array();

foreach ($categories as $category) {
    if (( $category->name != 'Blog' ) && ( $category->name != 'Uncategorized')) {
        array_push($active_categories, $category);
//        echo '<p>to add ' . $category->term_id . ' - ' . $category->name . '</p>';
    }
};

if ( class_exists('WPSEO_Primary_Term') ) {
    $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
    $term = get_term( $wpseo_primary_term );
    if (!is_wp_error($term) ) {
        // Yoast Primary category

        if ($term->name != 'Blog') {
            $primary_category_display = $term->name;
            $primary_category_id = $term->term_id ;
//            echo 'primary '.$primary_category_display;
        }
    }
};
?>

<?php

    if (($primary_category_id != null )){
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'category_name' => $primary_category_display
        );
//        echo 'by prim cat '.$primary_category_display;
        $posts_query = get_posts( $args );
        $by_categories = true;
    }
    else if ( ! empty( $active_categories ) )  {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'category_name' => $active_categories[0]->name
//            'category__in' => $active_categories
        );
        $posts_query = get_posts( $args );
        $by_categories = true;
    };


    if ($by_categories) {
        if (count($posts_query) <= 3) {
            foreach ($posts_query as $post_query) {
                if (($post_query->ID != $post_id) && (count($pagination_posts)<2)){
                    array_push($pagination_posts, $post_query);
                };
            }
        }
        else {
            $i=0;
            foreach ($posts_query as $post_query) {
                if ($post_query->ID == $post_id) {
                    if ($i < count($posts_query)-1) {
                        array_push($pagination_posts, $posts_query[$i + 1]);
                    }
                    else {
                        array_push($pagination_posts, $posts_query[$i - 2]);
                    }
                    if (($i > 0 )) {
                        array_push($pagination_posts, $posts_query[$i-1]);
                    }
                    else {
                        array_push($pagination_posts, $posts_query[$i+2]);
                    }
                }

            $i=$i+1;
            }
        };
    };

    if (count($pagination_posts) <1 ) {
        $prevPost = get_adjacent_post( true, '', true, 'category' );
        $nextPost = get_adjacent_post( true, '', false, 'category' );
        if ($prevPost ) array_push($pagination_posts, $prevPost);
        if ($nextPost ) array_push($pagination_posts, $nextPost);
    };

    if (count($pagination_posts) > 0) {    ?>
    <h3 class="post-read-also-title"><?php _e('Also read', 'moc')?></h3>
    <ul class="post-pagination">
    <?php foreach ($pagination_posts as $post) {
        setup_postdata($post);  ?>
        <li>
            <div class="pagination-image__wrapper">

                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <img class="lozad" data-src="<?php the_post_thumbnail_url( 'blog_min' ); ?>" alt="Real also <?php the_title(); ?>">
                </a>
            </div>
            <a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_title( $post->ID ); ?>
            </a>
        </li>
    <?php } ?>

    </ul>
<?php } ?>
<a href="<?php echo get_site_url(null, '/blog') ; ?>" class="read-more">
    <?php _e('All articles', 'moc'); ?>
</a>


