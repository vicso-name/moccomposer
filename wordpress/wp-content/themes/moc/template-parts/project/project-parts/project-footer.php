<?php


if ((!$next_post) || (!$prev_post)) {
    $currentID = get_the_ID();
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish'
    );


    $posts = get_posts($args);
    $length = count($posts);

    $i = 0;

    for ($i = 0; $i < $length; $i++) {
        if ($posts[$i]->ID == $currentID) {
            if ($i < $length - 1) {
                $next_post = $posts[$i + 1];
            } else {
                $next_post = $posts[0];
            };
            if ($i > 0) {
                $prev_post = $posts[$i - 1];
            } else {
                $prev_post = $posts[$length - 1];
            }
        }
    };
}

   ?>
    <ul class="post-pagination">
        <?php if ($next_post) { ?>
            <li>
                <div class="pagination-image__wrapper">

                    <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                        <?php
                        $portfolio_icon_id = get_field('icon', $next_post->ID);
                        $image_640 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_640') );
                        $image_235 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'testimonial_235') );
                        ?>
                        <picture>
                            <source media="(min-width: 540px)"
                                    srcset="<?php echo $image_640 ?>">
                            <source media="(max-width: 539px)"
                                    srcset="<?php echo $image_235; ?>">
                            <img src="<?php echo $image_640;?>" alt="<?php echo get_the_title( $next_post->ID ); ?>">
                        </picture>
                    </a>
                </div>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?>
                </a>
            </li>
        <?php } ?>
        <?php if ($prev_post) { ?>
            <li>
                <div class="pagination-image__wrapper">

                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                        <?php
                        $portfolio_icon_id = get_field('icon', $prev_post->ID);
                        $image_640 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_640') );
                        $image_235 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'testimonial_235') );
                        ?>
                        <picture>
                            <source media="(min-width: 540px)"
                                    srcset="<?php echo $image_640 ?>">
                            <source media="(max-width: 539px)"
                                    srcset="<?php echo $image_235; ?>">
                            <img src="<?php echo $image_640;?>" alt="<?php echo get_the_title( $prev_post->ID ); ?>">
                        </picture>
                    </a>
                </div>
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo get_the_title( $prev_post->ID ); ?></a>
            </li>
        <?php } ?>
    </ul>