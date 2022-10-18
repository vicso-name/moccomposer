<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<main id="main" class="inner-page single-career-page">
    <section class="inner-page__heading wrapped-section">
        <?php
        $career_img = get_field('career_image', $post->ID);
        $career_img = $career_img ?: get_template_directory_uri() . '/images/careers/default.svg';
        ?>
        <span class="heading-image__wrapper">
            <img src="<?php echo $career_img; ?>" alt="<?php echo $post->post_title; ?>"
                 width="105" height="105">
        </span>

        <h1><?php echo $post->post_title; ?></h1>
        <p class="heading-intro align-l"><?php the_field('intro_text', $post->ID); ?></p>
    </section>

    <section class="single-career__requirements">
        <ul class="single-requirements__list">
            <li class="single-requrements__item">
                <h2><?php _e('Requirements', 'moc'); ?></h2>
                <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( get_field('requirements', $post->ID) ) ); ?></div>
            </li>
            <li class="single-requrements__item">
                <h2><?php if (get_field('from_you_heading') == '') {_e('From you', 'moc');} else { echo get_field('from_you_heading');} ?></h2>
                <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( get_field('from_you', $post->ID) ) ); ?></div>
            </li>
            <?php
            $good_bonus = get_field('good_bonus', $post->ID);
            if ( preg_replace( "/\r|\n|<br\s?\/?>/", "", $good_bonus) ) { ?>
                <li class="single-requrements__item">
                    <h2><?php _e('A good bonus would be', 'moc'); ?></h2>
                    <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( $good_bonus ) ); ?></div>
                </li>
            <?php } ?>
            <li class="single-requrements__item">
                <h2><?php _e('What do we offer?', 'moc'); ?></h2>
                <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( get_field('we_offer', $post->ID) ) ); ?></div>
            </li>
            <li class="single-requrements__item">
                <h2>Location:</h2>
                <div class="careers-requirements__wrapper">
                    <ul>
                        <li>
                            <?php
                                $single_location = get_field('career_location');
                            if ($single_location == "") $single_location = 'Cherkasy';
                            echo $single_location;
                            ?>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </section>

    <section class="share share-block wrapped-section" id="social">
        <?php echo do_shortcode("[ssba]"); ?>
    </section>

    <section class="join-team wrapped-section" id="apply-job">
        <h2 class="section-heading js-hide-after-submit"><?php _e('Apply for a Job', 'moc'); ?></h2>
        <p class="form-description careers-description align-c">If there isn`t a position that matches your skills, send us email anyway. We are always up for hiring smart people who make an impact.</p>
        <div class="contact-form-wrapper"><?php echo do_shortcode('[gravityform id=6 title=false description=false ajax=true]'); ?></div>
    </section>

</main>

<?php get_footer(); ?>