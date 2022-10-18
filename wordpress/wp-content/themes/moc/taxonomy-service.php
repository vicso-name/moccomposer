<?php
get_template_part('template-parts/head');
get_template_part('template-parts/header', 'fixed' );

$service = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
$portfolio_ids = unserialize( get_option( "service_{$service->term_id}_portfolios" ) ); ?>
<?php get_template_part('template-parts/services/industries-chatbot-svg'); ?>
<?php get_template_part('template-parts/services/services-svg'); ?>
    <main id="main" class="page-services <?php echo empty( $portfolio_ids ) ? 'no-selected' : ''; ?>">
        <section class="heading-block align-c <?php the_field('services_page_li_class', $service); ?>">
            <div class="heading-holder">
                <span class="icon-holder-service">
                    <svg>
                        <use xlink:href="#icon-services__<?php the_field('services_page_li_class', $service); ?>"></use>
                    </svg>
                </span>
                <h1 class="heading-1"><?php echo $service->name; ?></h1>
            </div>
        </section>
        <section class="flexible-section details-block align-c <?php the_field('services_page_li_class', $service); ?>">
            <div class="description-holder">
                <div class="description-block align-l">
                    <div><?php the_field('page_top_text', $service); ?></div>
                    <h3 class="tech-caption"><?php the_field('page_images_title', $service); ?></h3>

                    <?php $technologies = get_field('technologies', $service);
                    if ( !empty( $technologies ) ) { ?>
                        <ul class="tech-list">
                            <?php foreach ( $technologies as $technology ) { ?>

                                <li>
                                    <span class="icon-holder"><img src="<?php the_field('image', $technology); ?>" alt="<?php echo $technology->name; ?>"></span>
                                    <span class="tech-name"><?php echo $technology->name; ?></span>
                                </li>

                            <?php } ?>
                        </ul>
                    <?php } ?>

                    <?php if ( get_field('page_bottom_text', $service) ) { ?>
                        <div><?php the_field('page_bottom_text', $service); ?></div>
                    <?php } ?>
                </div>
            </div>
            <?php $serviceclass = get_field('services_page_li_class', $service);
            if ($serviceclass == 'chatbots') {
                get_template_part('template-parts/section-chatbots');
            }; ?>
        </section>

        <section class="selected-block align-c">
            <?php if ( !empty( $portfolio_ids ) ) { ?>
                <h3 class="caption"><?php the_field('portfolio_title', $service); ?></h3>
                <ul class="selected-list">
                    <?php foreach ( $portfolio_ids as $portfolio_id ) { ?>
                        <li>
                            <?php $portfolio_icon_id = get_field('icon', $portfolio_id);
                            $image_640 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_640') );
                            ?>
                            <a href="<?php the_permalink($portfolio_id); ?>" class="link">
                                <img src="<?php echo $image_640; ?>" alt="Our Portfolio">
                            </a>
                        </li>

                    <?php } ?>
                </ul>

            <?php } ?>

            <div class="buttons-block">
                <?php $portfolio_link = get_field('portfolio_page', $service) . '#' . get_field('services_page_li_class', $service); ?>
                <a href="<?php echo $portfolio_link; ?>" class="read-more"><?php _e('More', 'moc'); ?></a>
            </div>
        </section>
    </main>

<?php get_footer(); ?>