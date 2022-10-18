<?php global $flex_block; ?>
<?php if (!empty($flex_block['projects']))
{ ?>
    <section class="selected-block align-c" id="selected-projects">
        <?php if (!empty($flex_block['title']))
        { ?>
            <h3 class="caption"><?php echo $flex_block['title']; ?></h3>
        <?php } ?>
        <?php
            if (is_page('web-development') Xor is_page('mobile-app-development') ){
                $list_class = "web_page_list";
            }
        ?>
        <ul class="selected-list projects-list <?php echo $list_class; ?>" id="projects-list">
            <?php
            $i = 1;
            foreach ($flex_block['projects'] as $project)
            {
                if (get_post_status( $project['project']->ID ) != 'private') {
                    $portfolio_icon_id = get_field('icon', $project['project']->ID);
                    $image_640 = reset(wp_get_attachment_image_src($portfolio_icon_id, 'project_640'));
                    $image_280 = reset(wp_get_attachment_image_src($portfolio_icon_id, 'project_280'));

                    $portfolio_wbp_id = get_field('image_portfolio_webp', $portfolio->ID);
                    $images_webp_array = wp_get_attachment_image_src($portfolio_wbp_id, 'project_640');
                    $image_640_webp = reset($images_webp_array);
                    if (is_page('web-development') Xor is_page('mobile-app-development') ){
                        $image_class = 'ic_img_size';
                    }
                    ?>
                    <li class="project-list-item">

                        <a class="link" aria-label="<?php the_field('name', $project['project']->ID); ?>" href="<?php the_permalink($project['project']->ID); ?>">
                        <img class="blurred-content <?php echo $image_class; ?>" src="<?php echo $image_640; ?>" data-src="<?php echo $image_640; ?>">
                        <?php if (get_field('text_color_in_portfolio', $project['project']->ID)) { ?>
                            <?php  if ( get_field('color_in_portfolio', $project['project']->ID)) { ?><span class="project-description-background" style="background-color: <?php the_field('color_in_portfolio', $project['project']->ID) ?>"></span><?php }; ?>
                            <?php if ( !is_page('web-development') && !is_page('mobile-app-development') ): ?>
                                <div class="project-item-description" style="color: <?php the_field('text_color_in_portfolio', $project['project']->ID); ?>;">
                                <h2 class="project-item-headline"><?php the_field('name', $project['project']->ID); ?></h2>
                                <div class="project-item-desc">
                                    <?php if (get_field('description_in_portfolio', $project['project']->ID)) {
                                        the_field('description_in_portfolio', $project['project']->ID);
                                    }
                                    else {
                                        the_field('link', $project['project']->ID);
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php } else {?>
                            <?php  if ( get_field('color_in_portfolio', $project['project']->ID)) { ?><span class="project-description-background to-inversion" style="background-color: <?php the_field('color_in_portfolio', $project['project']->ID) ?>"></span><?php }; ?>
                            <?php if ( !is_page('web-development') && !is_page('mobile-app-development') ): ?>
                                <div class="project-item-description">
                                <h2 class="project-item-headline"><?php the_field('name', $project['project']->ID); ?></h2>


                                <div class="project-item-desc">
                                    <?php if (get_field('description_in_portfolio', $project['project']->ID)) {
                                        the_field('description_in_portfolio', $project['project']->ID);
                                    }
                                    else {
                                        the_field('link', $project['project']->ID);
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php } ?>
                        </a>
                    </li>


                    <?php
                    $i++;
                }
            }
            ?>
        </ul>


        <div class="buttons-block">
            <a href="<?php echo get_site_url(null, 'software-development-portfolio'); ?><?php if (!empty($flex_block['portfolio_anchor'])) echo '#' . $flex_block['portfolio_anchor']; ?>" class="read-more"><?php _e('More', 'moc'); ?></a>
        </div>

    </section>
<?php } ?>
