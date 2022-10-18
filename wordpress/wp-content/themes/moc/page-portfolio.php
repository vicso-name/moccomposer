<?php
/*
 * Template Name: Portfolio
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/project/project-parts/project', 'svgs'); ?>

<main id="main" class="inner-page page-portfolio">

    <section class="page-portfolio-block align-c">
        <h1><?php the_title(); ?></h1>

        <?php while (have_posts()):
            the_post(); ?>
            <div class="description hide-for-mobile"><?php the_content(); ?></div>
        <?php endwhile; ?>
        <p class="description hide-for-desktop"><?php the_field('mobile_text', $post->ID); ?></p>
    </section>


    <section class="align-c portfolio-tiles-wrapper" data-tabs-block="">

        <?php $args = array(
            'number' => 6,
            'orderby' => 'id',
            'order' => 'ASC',
            'hide_empty' => false //remove
        );
        $services = [];
        $per_line = 3;
        $per_page = 6;

        ?>


        <?php $service_all = (object)array(
            'name' => __('All', 'moc'),
            'slug' => 'all'
        );
        array_unshift($services, $service_all);

        foreach ($services as $service) {
            if ($service->slug == 'all') {
                $tax_query = array();
                $slug = $service->slug;
            } else {
                $tax_query = array(
                    array(
                        'taxonomy' => 'service',
                        'field' => 'id',
                        'terms' => $service->term_id,
                        'include_children' => false
                    )
                );
                $slug = get_field('services_page_li_class', $service);
            } ?>

            <div class="tab-content active">

                <?php $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => $per_page + 1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'post_status' => 'publish'
                );
                $portfolios = get_posts($args);

                if (empty($portfolios) || count($portfolios) <= $per_page) {
                } else {
                    array_pop($portfolios);
                }

                if (!empty($portfolios)) { ?>
                    <ul class="projects-list">
                        <?php $portfolios_count = count($portfolios);
                        $n = 1;
                        foreach ($portfolios as $portfolio) { ?>

                            <?php
                            $portfolio_icon_id = get_field('icon', $portfolio->ID);
                            $images_array = wp_get_attachment_image_src($portfolio_icon_id, 'project_640');
                            $image_640 = reset($images_array);

                            $portfolio_wbp_id = get_field('image_portfolio_webp', $portfolio->ID);
                            $images_webp_array = wp_get_attachment_image_src($portfolio_wbp_id, 'project_640');
                            $image_640_webp = reset($images_webp_array);
                            $portfolio_name = $portfolio->post_name;
                            ?>


                            <li class="project-list-item <?php echo $portfolio_name; ?>">
                                <a href="<?php the_permalink($portfolio->ID); ?>"
                                   aria-label="<?php echo wp_strip_all_tags(get_field('name', $portfolio->ID), true); ?>">
                                    <img src="<?php echo $image_640; ?>" alt="">
                                    <?php if (get_field('text_color_in_portfolio', $portfolio->ID)) { ?>

                                        <?php if (get_field('color_in_portfolio', $portfolio->ID)) { ?><span
                                            class="project-description-background"
                                            style="background-color: <?php the_field('color_in_portfolio', $portfolio->ID) ?>"></span><?php }
                                    ; ?>
                                        <div class="project-item-description"
                                             style="color: <?php the_field('text_color_in_portfolio', $portfolio->ID); ?>;">
                                            <h2 class="project-item-headline"><?php the_field('name', $portfolio->ID); ?></h2>


                                            <div class="project-item-desc">
                                                <?php if (get_field('description_in_portfolio', $portfolio->ID)) {
                                                    the_field('description_in_portfolio', $portfolio->ID);
                                                } else {
                                                    the_field('link', $portfolio->ID);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <?php if (get_field('color_in_portfolio', $portfolio->ID)) { ?><span
                                            class="project-description-background to-inversion"
                                            style="background-color: <?php the_field('color_in_portfolio', $portfolio->ID) ?>"></span><?php }
                                    ; ?>
                                        <div class="project-item-description">
                                            <h2 class="project-item-headline"><?php the_field('name', $portfolio->ID); ?></h2>


                                            <div class="project-item-desc">
                                                <?php if (get_field('description_in_portfolio', $portfolio->ID)) {
                                                    the_field('description_in_portfolio', $portfolio->ID);
                                                } else {
                                                    the_field('link', $portfolio->ID);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </a>
                            </li>

                            <?php $n++; ?>

                        <?php }
                        if ($portfolios_count % $per_line != 0) {
                            $empty_li_count = $per_line - ($portfolios_count % $per_line);

                            for ($i = 0; $i < $empty_li_count; $i++) { ?>
                                <li class="empty-project">
                                    <img src="<?php echo get_template_directory_uri() ?>/images/empty.svg"
                                         alt="Empty project">
                                </li>
                            <?php }
                        } ?>
                    </ul>

                <?php } ?>

            </div>

        <?php } ?>


        <div class="portfolio-more-wrapper">
            <a id="load-more" href="#" class="read-more">More</a>
        </div>

    </section>
</main>

<?php get_footer(); ?>
