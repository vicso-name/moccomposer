<?php global $flex_block; ?>
<?php if (!empty($flex_block['testimonials']))
{ ?>
    <section class="testimonials">

        <?php if (!empty($flex_block['title']))
        { ?>
        <h2 class="flexible-caption"><?php echo $flex_block['title']; ?></h2>
        <?php } ?>

        <div class="carousel-wrap">

            <ul class="testimonial-slider">

                <?php foreach ($flex_block['testimonials'] as $testimonial)
                {
                    $testimonial_ID = $testimonial['testimonial']->ID;
                    $testimonial_title = apply_filters('the_title', $testimonial['testimonial']->post_title);
                    $testimonial_content = apply_filters('the_content', $testimonial['testimonial']->post_content);
                    ?>

                    <li>
                        <div class="logo-wrap">
                            <img class="lozad logo"
                                 src="image.svg"
                                 data-src="<?php the_field('logo_image', $testimonial_ID); ?>"
                                 alt="<?php the_field('site_title', $testimonial_ID); ?>"
                                 width="91" height="91" >
                            <noscript aria-hidden="true"><img class="logo" src="<?php the_field('logo_image', $testimonial_ID); ?>"
                                           alt="<?php the_field('site_title', $testimonial_ID); ?>"
                                           width="91" height="91" ></noscript>
                        </div>

                        <h2>
                            <?php echo $testimonial_title; ?>
                            <br>
                            <?php if ($testimonial['testimonial']->site_link_exists)
                            { ?>
                                <!--noindex-->
                                    <a href="<?php the_field('site_link', $testimonial_ID); ?>" target="_blank"
                                       rel="nofollow"><?php the_field('site_title', $testimonial_ID); ?></a>
                                <!--/noindex-->
                            <?php }
                            else
                            { ?>
                                <span class="no_link"><?php the_field('site_title', $testimonial_ID); ?></span>
                            <?php } ?>
                        </h2>
                        <?php
                        $testimonial_image_id = get_field('author_image', $testimonial_ID);
                        $image_235 = reset( wp_get_attachment_image_src($testimonial_image_id, 'testimonial_235') );
                        $image_170= reset( wp_get_attachment_image_src($testimonial_image_id, 'testimonial_170') );
                        ?>
                        <img class="lozad"
                             src="image.svg"
                             data-src="<?php echo $image_235; ?>"
                             alt="<?php echo esc_attr($testimonial_title); ?>"
                             width="235" height="235">
                        <noscript aria-hidden="true"><img src="<?php echo $image_235; ?>"
                                       alt="<?php echo esc_attr($testimonial_title); ?>"
                                       width="235" height="235"></noscript>

                        <p><?php echo $testimonial_content; ?></p>

                    </li>

                <?php } ?>

            </ul>
        </div>

        <a href="/testimonials" class="read-more">Testimonials</a>

    </section>
<?php } ?>
