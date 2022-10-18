<?php

//if (( !$next_post ) || ( !$prev_post )) {
    $currentID =  get_the_ID();
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page'   => -1,
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'post_status'      => 'publish'
    );


    $posts = get_posts( $args );
    $length = count($posts);

    $i = 0;

    for ( $i= 0; $i < $length; $i++ ) {
        if ($posts[$i]->ID == $currentID ) {
            if ($i < $length - 1) {
                $next_post = $posts[$i+1];
            }
            else {
                $next_post = $posts[0];
            };
            if ($i > 0) {
                $prev_post = $posts[$i-1];
            }
            else {
                $prev_post = $posts[$length - 1];
            }
        }
    };
//}
?>
<section class="resources-block">
    <div class="pagination-wrap">
        <ul class="project-pagination">
            <li class="pagination-wrapper">
                <?php if( $next_post ) { ?>
                    <a href="<?php the_permalink( $next_post->ID ); ?>" class="link link-left">
                        <?php echo $next_post->post_title; ?>
                        <span class="arrow"></span>
                    </a>
                <?php } ?>
            </li>
            <li class="pagination-wrapper">
                <?php if ( $prev_post ) { ?>
                    <a href="<?php the_permalink( $prev_post->ID ); ?>" class="link link-right">
                        <?php echo $prev_post->post_title; ?>
                        <span class="arrow"></span>
                    </a>
                <?php } ?>
            </li>
        </ul>
    </div>
</section>
