<section class="moc-section testimonials-section grey-section">
    <h2>Testimonials</h2>
    <div class="moc-inner notouch-only">
        <ul class="moc-grid chatbots-testimonials-grid designv2">

            <?php $testimonials = get_field('testimonials');

            foreach ( $testimonials as $testimonial ) {
                setup_postdata( $testimonial ); ?>

                <li class="column chatbots-testimonials-column">
                    <?php
                    $testimonial_image_id = get_field('author_image', $testimonial->ID);
                    $set_82 = wp_get_attachment_image_src($testimonial_image_id, 'avatar');
                    $image_82 = reset( $set_82 );

                    $testimonial_image_id_webp = get_field('author_image_webp', $testimonial->ID);
                    $image_webp = wp_get_attachment_image_src($testimonial_image_id_webp, '');
                    $image_full_webp = reset( $image_webp);

                    $testimonial_small_image_id_webp = get_field('author_small_image_webp', $testimonial->ID);
                    $image_small_webp = wp_get_attachment_image_src($testimonial_small_image_id_webp, '');
                    $image_small_webp = reset( $image_small_webp);
                    ?>
                    <div class="chatbots-testimonial-heading__wrapper">
                        <div class="avatar-holder with-shadow">
                            <picture>
                                <?php if ($testimonial_small_image_id_webp) { ?>
                                    <source srcset="<?php echo $image_small_webp; ?>" type="image/webp">
                                <?php } else { ?>
                                <source srcset="<?php echo $image_full_webp; ?>" type="image/webp">
                                <?php } ?>
                                <img class="lozad avatar" src="<?php echo $image_82; ?>" alt="Author" data-src="<?php echo $image_82; ?>" width="80" height="80">
                            </picture>
                        </div>
                        <h3 class="chatbots-testimonial-heading"><?php echo $testimonial->post_title; ?>
                            <?php if ($testimonial->site_link_exists) {?>
                                <!--noindex-->
                                    <a class="chatbots-testimonial-site_link" href="<?php the_field('site_link', $testimonial->ID); ?>" target="_blank" rel="nofollow">
                                        <?php the_field('site_title', $testimonial->ID); ?>
                                    </a>
                                <!--/noindex-->
                            <?php } else { ?>
                                <span class="chatbots-testimonial-no_link"><?php the_field('site_title', $testimonial->ID); ?></span>
                            <?php } ?>
                        </h3>
                    </div>
                    <?php if (get_field('logo_image_white', $testimonial->ID)) {?>
                        <img class="lozad chatbots-testimonial-logo" src="<?php  echo get_field('logo_image_white', $testimonial->ID); ?>" data-src="<?php  echo get_field('logo_image_white', $testimonial->ID); ?>" alt="<?php _e('Logo', 'moc'); ?>"
                             style="background-color: <?php echo get_field('logo_background', $testimonial->ID); ?>">
                    <?php }; ?>
                    <div class="chatbots-testimonial-content">
                        <?php echo get_the_content(); ?>
                    </div>
                </li>

            <?php }
            wp_reset_postdata(); ?>

        </ul>
    </div>
    <div class="moc-inner touch-only">
        <div class="designv2 owl-carousel testimonials-carousel" id="testimonials-carousel">

            <?php $testimonials = get_field('testimonials');

            foreach ( $testimonials as $testimonial ) {
                setup_postdata( $testimonial ); ?>

                <div class="column chatbots-testimonials-column">
                    <?php
                    $testimonial_image_id = get_field('author_image', $testimonial->ID);
                    $set_82 = wp_get_attachment_image_src($testimonial_image_id, 'avatar');
                    $image_82 = reset( $set_82 );

                    $testimonial_image_id_webp = get_field('author_image_webp', $testimonial->ID);
                    $image_webp = wp_get_attachment_image_src($testimonial_image_id_webp, '');
                    $image_full_webp = reset( $image_webp);

                    $testimonial_small_image_id_webp = get_field('author_small_image_webp', $testimonial->ID);
                    $image_small_webp = wp_get_attachment_image_src($testimonial_small_image_id_webp, '');
                    $image_small_webp = reset( $image_small_webp);
                    ?>
                    <div class="chatbots-testimonial-heading__wrapper">
                        <div class="avatar-holder with-shadow">
                            <picture>
                                <?php if ($testimonial_small_image_id_webp) { ?>
                                    <source srcset="<?php echo $image_small_webp; ?>" type="image/webp">
                                <?php } else { ?>
                                    <source srcset="<?php echo $image_full_webp; ?>" type="image/webp">
                                <?php } ?>
                                <img class="avatar owl-lazy" data-src="<?php echo $image_82; ?>" alt="Author" width="80" height="80">
                            </picture>
                        </div>
                        <h3 class="chatbots-testimonial-heading"><?php echo $testimonial->post_title; ?>
                            <?php if ($testimonial->site_link_exists) {?>
                                <!--noindex-->
                                <a class="chatbots-testimonial-site_link" href="<?php the_field('site_link', $testimonial->ID); ?>" target="_blank" rel="nofollow">
                                    <?php the_field('site_title', $testimonial->ID); ?>
                                </a>
                                <!--/noindex-->
                            <?php } else { ?>
                                <span class="chatbots-testimonial-no_link"><?php the_field('site_title', $testimonial->ID); ?></span>
                            <?php } ?>
                        </h3>
                    </div>
                    <?php if (get_field('logo_image_white', $testimonial->ID)) {?>
                        <img class="chatbots-testimonial-logo owl-lazy" src="<?php  echo get_field('logo_image_white', $testimonial->ID); ?>" data-src="<?php  echo get_field('logo_image_white', $testimonial->ID); ?>" alt="<?php _e('Logo', 'moc'); ?>"
                             style="background-color: <?php echo get_field('logo_background', $testimonial->ID); ?>">
                    <?php }; ?>
                    <div class="chatbots-testimonial-content">
                        <?php echo get_the_content(); ?>
                    </div>
                </div>

            <?php }
            wp_reset_postdata(); ?>

        </div>
    </div>
</section>
