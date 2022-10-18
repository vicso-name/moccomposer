
<?php

    $post_id = get_the_ID();
    $t = wp_get_post_tags($post->ID);
    $tagnames = array();
    $post_pagination_count = 0;
    $pagination_posts = array();
    $qposts = array();

    foreach ($t as $tag) {
        array_push($tagnames, $tag->term_id);
//        print_r($tag);
//        print_r($tagnames);
    };
    if (count($tagnames)>0) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'category_name' => 'Blog',
            'tag__in' => $tagnames
        );
        $qposts = get_posts( $args );

        $i = 0;
//        echo '<p>pagination posts '.count($pagination_posts).'</p>';
//        echo '<p>qposts '.count($qposts).'</p>';
        foreach ($qposts as $qpost)  {
//            echo '<p>post '.$qpost->ID.', post id '.$post_id.'</p>';
            if (($qpost->ID == $post_id) && (count($pagination_posts) <2) && ($i<count($qposts))){
                if ($i < count($qposts)-1) {
                    array_push($pagination_posts, $qposts[$i + 1]);
                };
                if (($i > 0 )) {
                    array_push($pagination_posts, $qposts[$i-1]);
                };

            }
            $i = $i+1;
        };
    }

?>


<?php
//    echo '<p>pagination posts '.count($pagination_posts).'</p>';

    if (count($pagination_posts) <1 ) {
        $prevPost = get_adjacent_post( true, '', true, 'category' );
        $nextPost = get_adjacent_post( true, '', false, 'category' );
        if ($prevPost ) array_push($pagination_posts, $prevPost);
        if ($nextPost ) array_push($pagination_posts, $nextPost);
    };

    if (count($pagination_posts) > 0) {    ?>
    <h3 class="post-read-also-title"><?php _e('Also Read', 'moc')?></h3>
    <ul class="post-pagination">
    <?php foreach ($pagination_posts as $post) {
        setup_postdata($post);  ?>
        <li>
<!--            <p>--><?php //echo $post->ID; ?><!--</p>-->
            <div class="pagination-image__wrapper">

                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <picture>
                        <source media="(min-width: 540px)"
                                srcset="<?php the_post_thumbnail_url( 'project_640' ); ?>">
                        <source media="(max-width: 539px)"
                                srcset="<?php the_post_thumbnail_url( 'testimonial_235' ); ?>">
                        <img src="<?php the_post_thumbnail_url( 'project_640' ); ?>" alt="<?php the_title(); ?>">
                    </picture>
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


