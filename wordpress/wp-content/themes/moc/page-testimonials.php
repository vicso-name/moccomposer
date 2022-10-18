<?php
/*
 * Template Name: Testimonials
 * */

get_template_part('template-parts/head');
get_template_part('template-parts/header', 'fixed' ); ?>

<main id="main" class="inner-page page-testimonials">
    <section class="testimonials-section wrapped-section">
        <h1><?php the_title(); ?></h1>

        <ul class="grid-list inline-grid testimonials-list">

            <?php $args = array(
                'post_type' => 'testimonials',
                'posts_per_page'   => -1,
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'post_status'      => 'publish',
            );
            $testimonials = get_posts( $args );

            foreach ( $testimonials as $testimonial ) {
                setup_postdata( $testimonial ); ?>

                <li class="grid-list__item inline-grid__item testimonials-list__item">
                    <?php
                    $testimonial_image_id = get_field('author_image', $testimonial->ID);
                    $testimonial_image_id_webp = get_field('author_image_webp', $testimonial->ID);
                    $image_full = wp_get_attachment_image_src($testimonial_image_id, '');
                    $image_full = reset($image_full);
                    $image_full_webp = wp_get_attachment_image_src($testimonial_image_id_webp, '');
                    $image_full_webp = reset( $image_full_webp);
                    $image_170 = wp_get_attachment_image_src($testimonial_image_id, 'testimonial_170');
                    $image_170 = reset($image_170);
                    ?>

                    <div class="testimonial-heading__wrapper">
                        <div class="avatar-holder with-shadow">
                            <picture>
                                <source srcset="<?php echo $image_full_webp; ?>" type="image/webp">
                                <img class="image-to-animate avatar" src="<?php echo $image_170; ?>" alt="" width="162" height="162">
                            </picture>
                        </div>
                        <h2><?php echo $testimonial->post_title; ?>
                            <?php if ($testimonial->site_link_exists) {?>
                                <!--noindex-->
                                    <a class="testimonial-site_link" href="<?php the_field('site_link', $testimonial->ID); ?>" target="_blank" rel="nofollow">
                                        <?php the_field('site_title', $testimonial->ID); ?>
                                    </a>
                                <!--/noindex-->
                            <?php } else { ?>
                                <span class="testimonial-no_link"><?php the_field('site_title', $testimonial->ID); ?></span>
                            <?php } ?>
                        </h2>
                    </div>



                    <?php
                    $testimonial_logo_id = get_field('logo_image', $testimonial->ID);
                    $logo_size = 'testimonial_170';
                    $logo_image = wp_get_attachment_image_src($testimonial_logo_id, $logo_size);
                    $logo_103 = reset($logo_image);

                    ?>
                    <img class="image-to-animate logo" src="<?php  echo $logo_103; ?>" data-src="<?php  echo $logo_103; ?>" alt="<?php _e('Logo', 'moc'); ?>"
                         width="80" height="33">
                    <div class="testimonial-content">
                        <?php echo get_the_content(); ?>
                    </div>
                </li>

            <?php }
            wp_reset_postdata(); ?>

        </ul>
    </section>
    <section class="awards-block align-c wrapped-section">
        <ul class="awards-list">
            <li>
                <!--noindex-->
                    <a href="https://clutch.co/profile/master-code-global" id="clutch" target="_blank" rel="nofollow">
                        <img class="lozad image-to-animate" src="<?php echo get_template_directory_uri() . '/images/testimonials/Artificial_Intelligence_Companies_2020.png' ?>" data-src="<?php echo get_template_directory_uri() . '/images/testimonials/Artificial_Intelligence_Companies_2020.png' ?>" alt="Clutch" width="116" height="170">
                    </a>
                <!--/noindex-->
            </li>
            <li>
                <!--noindex-->
                    <a href="https://skilled.co/companies/app-developers/" id="skilled" target="_blank" rel="nofollow">
                        <img class="lozad image-to-animate" src="<?php echo get_template_directory_uri() . '/images/testimonials/badge_skilled.png' ?>" data-src="<?php echo get_template_directory_uri() . '/images/testimonials/badge_skilled.png' ?>" alt="Skilled" width="131" height="107">
                    </a>
                <!--/noindex-->
            </li>

            <li>
                <!--noindex-->
                <a href="https://www.goodfirms.co/company/master-of-code-global" id="goodfirms" target="_blank" rel="nofollow">
                    <img class="lozad image-to-animate" src="<?php echo get_template_directory_uri() . '/images/testimonials/goodfirms-bagde.svg'?>" data-src="<?php echo get_template_directory_uri() . '/images/testimonials/goodfirms-bagde.svg' ?>" alt="Goodfirms" width="131" height="107">
                </a>
                <!--/noindex-->
            </li>
        </ul>
    </section>
</main>

<?php get_footer(); ?>
