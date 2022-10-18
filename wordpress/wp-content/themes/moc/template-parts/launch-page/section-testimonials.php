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

        <ul class="testimonial-slider">

            <?php foreach ( $testimonials as $post ) {
                setup_postdata( $post ); ?>
                <?php if (get_field('homepage', $post->ID)) { ?>
                <li class="testimonial-slide">
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
                                  <a href="<?php the_field('site_link', $post->ID); ?>" target="_blank" rel="nofollow"><?php the_field('site_title', $post->ID); ?></a>
                              <!--/noindex-->
                          <?php } else { ?>
                              <span class="no_link"><?php the_field('site_title', $post->ID); ?></span>
                          <?php } ?>

                            <?php if (get_field('site_description', $post->ID)) { ?>, <?php the_field('site_description', $post->ID); } ?>
                        </li>

                    </ul>

                </li>
                <?php } ?>
            <?php } ?>


        </ul>
        <div class="testimonials-pager__wrapper">
            <ul id="testimonials-pager" class="testimonial-slider__pager">
            <?php
            $slideindex = 0;
            $testimonials = get_posts( $args );
            foreach ( $testimonials as $post ) {
                    setup_postdata( $post );

            if (get_field('homepage', $post->ID)) { ?>
                <li class="testimonials-pager__item">
                    <a data-slide-index="<?php echo $slideindex ?>" href="">

                        <?php
                        $testimonial_logo_id = get_field('logo_image', $post->ID);
                        $logo_full = reset( wp_get_attachment_image_src($testimonial_logo_id, '') );
                        ?>
                        <img class="lozad" data-src="<?php echo $logo_full;  ?>" alt="<?php the_field('site_title', $post->ID); ?>">
                    </a>
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
