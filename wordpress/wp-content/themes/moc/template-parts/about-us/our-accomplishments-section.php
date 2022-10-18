
<section class="moc-section our-accomplishments grey-section">
    <div class="moc-inner">
        <div class="hading-section-text">
            <h2>Our Accomplishments</h2>
            <p>Below are just a few reviews from our amazing clients from some of the most popular platforms</p>
        </div>
    </div>

    <div class="owl-carousel testimonials">

        <?php
        $testimonials = get_field( 'testimonials' );

        foreach ($testimonials as $testimonial) {
            $post_company = get_field('site_title', $testimonial->ID);
            $post_person_img = get_field('author_image', $testimonial->ID);
            $t_title = $testimonial->post_title;
            $t_content = $testimonial->post_content;

        ?>

            <div class="testimon-item">
                <div class="testimon-main">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/about-page/q.svg" alt='"' />
                    <p><?php echo $t_content; ?></p>
                </div>
                <div class="testimon-footer">
                    <img src="<?php echo wp_get_attachment_image_url($post_person_img); ?>" alt="person-photo-<?php echo $post_person_img;?>">
                    <div class="testimon-person">
                        <span><?php echo $t_title; ?></span>
                        <p><?php echo $post_company; ?></p>
                    </div>
                </div>
            </div>

        <?php
        } ?>

    </div>
</section>