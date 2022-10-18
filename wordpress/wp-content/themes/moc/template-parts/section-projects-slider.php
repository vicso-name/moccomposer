<section class="projects-slider__section" id="project-slider">
    <?php if (get_field('portfolio_title', $post->ID)) { ?>
        <h2 class="responsive-header"><?php the_field('portfolio_title', $post->ID); ?></h2>
    <?php } else { ?>
        <h2 class="responsive-header">Featured chatbots
            <span class="sub-header desktop-only">See how businesses similar to yours are growing with conversational AI</span>
        </h2>
    <?php }; ?>

    <?php $portfolio_items = get_field('portfolio_items', $post->ID); ?>
    <script>var css = "";</script>
    <div class="projects-slider owl-carousel owl-theme" id="owl-projects-carousel">

        <?php
        $slideindex = 0;
        foreach ($portfolio_items as $post) {
            setup_postdata($post);
            $post_id = $post->ID;
            $one_image_mobile = false;
            $background_color = get_field('slide_background_color');

            $background_image_id = get_field('slide_background', $post_id);
            $img_blog_min = wp_get_attachment_image_src($background_image_id, 'blog_min');
            $img_current_size = wp_get_attachment_image_src($background_image_id, '');
            $background_image_767 = reset($img_blog_min);
            $background_image_full = reset($img_current_size);
            if (get_field('mobile_image_l', $post_id)) {
                $one_image_mobile = true;
                $background_image_767 = get_field('mobile_image_l', $post_id);
                $background_image_375 = get_field('mobile_image_p', $post_id);
            };
            if (get_field('mobile_image_webp', $post_id)) {
                $mob_webp = get_field('mobile_image_webp', $post_id);
            };
            ?>
            <div class="project-slide item" data-dote="<?php echo $slideindex ?>">
                <span class="slide-background-wrapper" style="background-color: <?php echo $background_color; ?>;">
                    <picture>
                        <?php if (get_field('slide_background_webp', $post_id)) { ?>
                            <source class="owl-lazy" media="(min-width: 768px)"
                                    type="image/webp"
                                    data-srcset="<?php echo get_field('slide_background_webp', $post_id); ?>">
                        <?php }; ?>

                        <source class="owl-lazy" media="(min-width: 768px)"
                                data-srcset="<?php echo $background_image_full; ?>">

                        <?php if (get_field('mobile_webp', $post_id)) { ?>
                            <source class="owl-lazy" media="(max-width: 767px)"
                                    type="image/webp" data-srcset="<?php echo get_field('mobile_webp', $post_id); ?>">
                        <?php }; ?>
                        <?php if (get_field('small_webp', $post_id)) { ?>
                            <source class="owl-lazy" media="(max-width: 420px)"
                                    type="image/webp" data-srcset="<?php echo get_field('small_webp', $post_id); ?>">
                        <?php }; ?>
                        <?php if ($one_image_mobile) { ?>
                            <source class="owl-lazy" media="(max-width: 767px)"
                                    data-srcset="<?php echo $background_image_767; ?>">
                            <source class="owl-lazy" media="(max-width: 420px)"
                                    data-srcset="<?php echo $background_image_375; ?>">
                        <?php }; ?>


                        <img class="owl-lazy slide-background"
                             data-src="<?php echo $background_image_full; ?>"
                             alt="<?php the_field('project_text', $post_id); ?>" width="1920" height="1021">

                        <noscript><img class="slide-background" src="
                        <?php echo $background_image_full; ?>" alt="
                        <?php the_field('project_text', $post_id); ?>">
                    </noscript>
                    </picture>


                </span>
                <?php $portfolio_icon_id = get_field('project_logo', $post_id); ?>

                <div class="slide-wrapper js-full-height-large <?php if ($one_image_mobile) echo 'non-amp-only'; ?>">
                    <div class="project-slide__right">
                        <span class="project-slide__logo handheld-only">
                                <img class="owl-lazy project-logo__img"
                                     src="<?php the_field('project_logo', $post_id); ?>"
                                     data-src="<?php the_field('project_logo', $post_id); ?>"
                                     alt="<?php the_field('project_text', $post_id); ?>" height="71" width="71">
                            </span>
                        <picture>
                            <?php if (get_field('project_image_webp', $post_id)) { ?>
                                <source class="owl-lazy" type="image/webp"
                                        srcset="<?php echo get_field('project_image_webp', $post_id); ?>"
                                        data-srcset="<?php echo get_field('project_image_webp', $post_id); ?>">
                            <?php }; ?>
                            <img class="owl-lazy project-slide__img"
                                 data-src="<?php the_field('project_image', $post_id); ?>"
                                 alt="<?php the_field('project_text', $post_id); ?> - <?php the_field('project_text', $post_id); ?>"
                                 width="495" height="460">
                            <noscript><img class="project-slide__img" src="<?php the_field('project_image', $post_id); ?>" alt="<?php the_field('project_text', $post_id); ?> - <?php the_field('project_text', $post_id); ?>"
                                           width="495" height="460">
                            </noscript>
                        </picture>



                    </div>
                    <div class="project-slide__left">
                            <span class="project-slide__logo no-handheld">
                                <img class="owl-lazy project-logo__img" src="<?php the_field('project_logo', $post_id); ?>"
                                     data-src="<?php the_field('project_logo', $post_id); ?>"
                                     alt="<?php the_field('project_text', $post_id); ?>" height="71" width="71">
                            </span>
                        <h3 class="project-slide__name"><?php the_title(); ?></h3>
                        <div class="inside">
                            <p class="project-slide__description"><?php the_field('project_text', $post_id); ?></p>
                            <?php if (get_field('project_link', $post_id)) { ?>
                                <a href="<?php the_field('project_link', $post_id); ?>" class="view-more white">View
                                    More</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $slideindex = $slideindex + 1;
        } ?>

    </div>

    <?php wp_reset_postdata(); ?>
</section>
