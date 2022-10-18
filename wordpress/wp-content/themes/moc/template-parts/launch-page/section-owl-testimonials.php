<section class="testimonials">

    <h1 class="responsive-header"><?php the_field('testimonials_title', $post->ID); ?></h1>
    <?php $testimonials_items = get_field('testimonials_items', $post->ID); ?>

    <div class="testimonials-wrap">

        <?php global $post;

        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page'   => -1,
            'orderby'          => 'date',
            'order'            => 'ASC',
            'post_status'      => 'publish',
        );
        $testimonials = get_posts( $args );
        if ( !empty( $testimonials ) ) { ?>

        <div class="testimonial-slider owl-carousel" id="testimonial-slider">

            <?php
            $slideindex = 0;
            foreach ( $testimonials as $post ) {
                setup_postdata( $post );

                ?>
                <?php if (get_field('homepage', $post->ID)) { ?>
                <div class="item testimonial-slide" data-dote="<?php echo $slideindex ?>">
                    <div class="testimonial-slider__content">
                        <svg class="quotes">
                            <use xlink:href="#quotes"></use>
                        </svg>
                        <?php echo get_the_content( $post->ID );?>
                    </div>
                    <ul class="testimonial-slider__signature">
                        <li class="author"><?php the_title(); ?></li>
                        <li class="testimonial-site-description">
                          <?php if ($post->site_link_exists) {?>
                              <!--noindex-->
                                  <a href="<?php the_field('site_link', $post->ID); ?>" target="_blank" rel="noopener nofollow"><?php the_field('site_title', $post->ID); ?></a>
                              <!--/noindex-->
                          <?php } else { ?>
                              <span class="no_link"><?php the_field('site_title', $post->ID); ?></span>
                          <?php } ?>

                            <?php if (get_field('site_description', $post->ID)) { ?>, <?php the_field('site_description', $post->ID); } ?>
                        </li>

                    </ul>

                </div>
                <?php $slideindex = $slideindex + 1; } ?>
            <?php } ?>


        </div>
        <div class="testimonials-pager__wrapper">
            <ul id="testimonials-pager" class="testimonial-slider__pager">
                <?php
                $slideindex = 0;
                $testimonials = get_posts( $args );
                foreach ( $testimonials as $post ) {
                    setup_postdata( $post );

                    if (get_field('homepage', $post->ID)) { ?>
                        <li class="testimonials-pager__item" data-dote="<?php echo $slideindex ?>">
                            <span class="pager-image__wrapper">

                                <?php
                                $testimonial_logo_id = get_field('logo_image', $post->ID);
                                $img_170 = wp_get_attachment_image_src($testimonial_logo_id, 'testimonial_170');
                                $img_206 = wp_get_attachment_image_src($testimonial_logo_id, 'testimonial_206');
                                $logo_170 = reset( $img_170 );
                                $logo_206 = reset( $img_206 );
                                ?>
                                <img class="image-to-animate" data-src="<?php echo $logo_170;  ?>" alt="<?php the_field('site_title', $post->ID); ?>">
                            </span>
                        </li>
                        <?php $slideindex = $slideindex + 1; } } }
                wp_reset_postdata(); ?>
            </ul>
        </div>


    </div>

    <a href="<?php the_field('testimonials_page', $post->ID); ?>" class="read-more hide-on-mobile">
        More
    </a>
</section>