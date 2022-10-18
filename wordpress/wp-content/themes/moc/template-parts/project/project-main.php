<!--<main class="page-project">-->
<?php get_template_part('template-parts/project/project-parts/project-svgs'); ?>
<main id="main" class="page-project <?php if ( get_field('new_case_study') ) { ?>case-study<?php } ?> <?php echo get_field('page_class'); ?>">

    <?php

        if ( get_field('new_case_study') )  {
            if ( get_field('use_custom_header') == '1') {
                get_template_part('template-parts/project/' . get_field('template_parts_directory') . '/custom-header');
            }
            else {
                get_template_part('template-parts/project/project-parts/case-study-general-info');
            }
        }
        else {
            get_template_part('template-parts/project/project-parts/general-info');
        };
    ?>

    <?php if (get_field('new_case_study')) { ?>
        <section class="case-study-content">

            <?php if ( ( !get_field('template_parts_directory') ) && (get_field('new_case_study') ) ) { ?>
            <div class="description-wrap-wrapper">
                <div class="description-wrap">
                    <?php
                    while ( have_posts() ):the_post();
                        the_content();
                    endwhile; ?>
                </div>
            </div>
            <?php }; ?>
            <?php get_template_part('template-parts/project/partial/case-study-partial', 'p1');
            if ( get_field('use_custom_header') != '1') {
                ?>

                <section class="resources-block resources-block-case-study align-c">
                    <div class="case-study-wrapper">
                        <?php get_template_part('template-parts/project/project-parts/project-resources-list'); ?>
                        <?php $args = array("fields" => "all"); ?>
                        <?php if ((get_field('new_case_study')) && (get_field('custom_technologies'))) {
                            get_template_part('template-parts/project/' . get_field('template_parts_directory') . '/custom_technologies');
                        } else { ?>
                            <?php if (get_field('name') !== 'Presentain') { ?><h3
                                    class="caption"><?php _e('Technology', 'moc'); ?></h3><?php } ?>
                            <?php if (get_field('name') == 'Presentain') { ?><h3
                                    class="caption"><?php _e('Full Technology Bundle', 'moc'); ?></h3><?php } ?>
                            <?php $technologies = wp_get_post_terms($post->ID, 'technology', $args);
                            if (!empty($technologies)) { ?>
                                <ul class="tech-list">
                                    <?php foreach ($technologies as $technology) {
                                        if (isset($technologies_string))
                                            $technologies_string .= ' <span class="delimiter"></span> ' . $technology->name;
                                        else
                                            $technologies_string .= $technology->name; ?>
                                        <li class="icon-holder">pagination-wrap
                                            <img class="lozad"
                                                 src="<?php the_field('image', $technology); ?>"
                                                 data-src="<?php the_field('image', $technology); ?>"
                                                 alt="<?php echo $technology->name; ?>">
                                            <noscript aria-hidden="true"><img
                                                        src="<?php the_field('image', $technology); ?>"
                                                        alt="<?php echo $technology->name; ?>"></noscript>
                                            <span class="tooltip-holder">
                                        <span class="tooltip"><?php echo $technology->name; ?></span>
                                    </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <p class="tech-names"><?php echo $technologies_string; ?></p>
                            <span class="tech-divider"></span>
                        <?php }; ?>
                    </div>
                </section>
                <?php
            };
            get_template_part('template-parts/project/partial/case-study-partial', 'p2'); ?>
            <?php get_template_part('template-parts/project/project-parts/project-app-buttons'); ?>
        </section>
    <?php }
    else {?>
        <div class="description-wrap">
            <?php while ( have_posts() ):the_post();
                the_content();
            endwhile; ?>
        </div>
        <?php get_template_part('template-parts/project/project-parts/project-resources'); ?>
        <?php get_template_part('template-parts/project/project-parts/project-app-buttons'); ?>
    <?php }; ?>

    <!-- Remove This Block If The Kittch Portfolio -->

    <?php if(!is_single('kittch-livestreaming-platform')): ?>

        <section class="case-study-action-block">
            <div class="case-study-wrapper">
                <h2 class="case-study-action-title">Does this experience sound like a fit for your company?</h2>
                <a class="case-study-action-button cta-btn" href="/contacts">Contact us</a>
            </div>
        </section>

    <?php endif; ?>

    <?php get_template_part('template-parts/project/project-parts/project-pagination'); ?>
<!--    --><?php //get_template_part('template-parts/project/project-parts/project-footer'); ?>
</main>