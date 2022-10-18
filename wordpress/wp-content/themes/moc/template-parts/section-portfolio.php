<section class="projects">

    <h1><?php the_field('portfolio_title', $post->ID); ?></h1>

    <ul class="projects-list">

        <?php $portfolio_items = get_field('portfolio_items', $post->ID);

        usort($portfolio_items, function($a, $b) {
            return $a->menu_order - $b->menu_order;
        }); ?>

        <?php foreach ( $portfolio_items as $portfolio ) { ?>
            <li>
                <?php $portfolio_icon_id = get_field('icon', $portfolio->ID);
                $image_640 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_640') );
                $image_280 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_280') );
                ?>
                <a href="<?php the_permalink( $portfolio->ID ); ?>">
                    <picture>
                        <source media="(max-width: 840px)" srcset="<?php echo $image_280; ?>">
                        <img class="lozad" data-src="<?php echo $image_640; ?>" alt="<?php the_title($portfolio->ID); ?>"
                              width="640" height="400">
                    </picture>
                </a>
            </li>

        <?php } ?>

    </ul>

    <a href="<?php the_field('portfolio_page', $post->ID); ?>" class="read-more white" id="portfolio-main">
        <?php _e('Portfolio', 'moc'); ?>
    </a>

</section>