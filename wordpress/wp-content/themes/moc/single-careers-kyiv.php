<?php if($post->post_status !== 'publish') {
    wp_redirect( home_url() . "/careers-kyiv", 301 );
} ?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
    <main id="main" class="inner-page single-career-page">
        <section class="inner-page__heading wrapped-section">
            <?php
            $career_location = get_field('career_location', $post->ID);
            $career_img = get_field('career_image', $post->ID);
            $career_img = $career_img ?: get_template_directory_uri() . '/images/careers/default.svg';
            ?>
            <span class="heading-image__wrapper">
            <img src="<?php echo $career_img; ?>" alt="<?php echo $post->post_title; ?>"
                 width="105" height="105">
        </span>

            <h1><?php echo $post->post_title; ?></h1>
            <div class="heading-intro align-l"><?php the_field('intro_text', $post->ID); ?></div>
        </section>

        <section class="single-career__requirements">

            <ul class="single-requirements__list">
                <?php if (get_field('requirements', $post->ID)) {?>
                    <li class="single-requrements__item">
                        <h2><?php echo get_field('requirements_heading', $post->ID); ?></h2>
                        <div class="careers-requirements__wrapper">
                            <?php if (get_field('requrements_appearance', $post->ID) == 'text') { ?>
                                <?php echo get_field('requirements', $post->ID); ?>
                            <?php }
                            else {
                                echo get_list_by_line_break( remove_extra_line_breaks( get_field('requirements', $post->ID) ) );
                            }; ?>
                        </div>
                    </li>
                <?php }; ?>
                <?php if (get_field('from_you', $post->ID)) { ?>
                    <li class="single-requrements__item">
                        <h2><?php echo get_field('from_you_heading', $post->ID); ?></h2>
                        <div class="careers-requirements__wrapper">
                            <?php if (get_field('from_you_appearance', $post->ID) == 'text') { ?>
                                <?php echo get_field('from_you', $post->ID); ?>
                            <?php }
                            else {
                                echo get_list_by_line_break( remove_extra_line_breaks( get_field('from_you', $post->ID) ) );
                            }; ?>
                        </div>
                    </li>
                <?php } ?>
                <?php if (get_field('responsibilities', $post->ID)) {?>
                    <li class="single-requrements__item">
                        <h2><?php echo get_field('responsibilities_heading', $post->ID); ?></h2>
                        <div class="careers-requirements__wrapper">
                            <?php if (get_field('responsibilities_appearance', $post->ID) == 'text') { ?>
                                <?php echo get_field('responsibilities', $post->ID); ?>
                            <?php }
                            else {
                                echo get_list_by_line_break( remove_extra_line_breaks( get_field('responsibilities', $post->ID) ) );
                            }; ?>
                        </div>
                    </li>
                <?php }; ?>
                <?php if (get_field('good_bonus', $post->ID)) {?>
                    <li class="single-requrements__item">
                        <h2><?php echo get_field('good_bonus_heading', $post->ID); ?></h2>
                        <div class="careers-requirements__wrapper">
                            <?php $good_bonus = get_field('good_bonus', $post->ID); ?>

                            <?php if (get_field('good_bonus_appearance', $post->ID) == 'text') { ?>
                                <?php echo get_field('good_bonus', $post->ID); ?>
                            <?php }
                            else {
                                if ( preg_replace( "/\r|\n|<br\s?\/?>/", "", $good_bonus) ) {
                                    echo get_list_by_line_break( remove_extra_line_breaks( $good_bonus ) );
                                }
                            }; ?>
                        </div>
                    </li>
                <?php } ?>
                <?php if (get_field('we_offer', $post->ID)) {?>
                    <li class="single-requrements__item">
                        <h2><?php echo get_field('we_offer_heading'); ?></h2>
                        <div class="careers-requirements__wrapper">
                            <?php if (get_field('we_offer_apperance', $post->ID) == 'text') { ?>
                                <?php echo get_field('we_offer', $post->ID); ?>
                            <?php }
                            else {
                                echo get_list_by_line_break( remove_extra_line_breaks( get_field('we_offer', $post->ID) ) );
                            }; ?>
                        </div>
                    </li>
                <?php }; ?>
                <li class="single-requrements__item">
                    <h2>Location:</h2>
                    <div class="careers-requirements__wrapper">
                        <ul>
                            <li id="career-location">
                               <?php the_field('career_location'); ?>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <p class="subscribe-job-wrapper">Have got some time left?)<br />You could devote it to your favorite activity or read about us on our social networks.</p>
        </section>

        <section class="share share-block wrapped-section" id="social">
            <?php echo do_shortcode("[ssba]"); ?>
        </section>

        <section class="join-team wrapped-section contact-form-wrapper" id="apply-job">
            <h2 class="section-heading js-hide-after-submit"><?php _e('Apply for a Job', 'moc'); ?></h2>
            <div class="gform_wrapper" id="career-form"><?php echo do_shortcode('[contact-form-7 id="9193" title="Careers"]'); ?></div>
        </section>
    </main>

<?php get_footer(); ?>
