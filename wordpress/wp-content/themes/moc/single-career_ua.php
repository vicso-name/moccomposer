<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans|Roboto&subset=cyrillic');
    </style>
<main id="main" class="inner-page single-career-page hide-estimate">
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
        <div class="heading-intro align-l"><?php the_field('intro_text', $post->ID); ?></div>
        <br />
        <p class="heading-intro align-l">Наша команда тут: <a class="career-inside-link" href="https://www.facebook.com/masters.community/" target="_blank">https://www.facebook.com/masters.community/</a></p>
    </section>

    <section class="single-career__requirements">
        <ul class="single-requirements__list">
            <li class="single-requrements__item">
                <h2><?php echo get_field('requirements_title'); ?></h2>
                <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( get_field('requirements', $post->ID) ) ); ?></div>
            </li>
            <li class="single-requrements__item">
                <h2><?php echo get_field('from_you_title'); ?></h2>
                <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( get_field('from_you', $post->ID) ) ); ?></div>
            </li>
            <?php
            $good_bonus = get_field('good_bonus', $post->ID);
            if ( preg_replace( "/\r|\n|<br\s?\/?>/", "", $good_bonus) ) { ?>
                <li class="single-requrements__item">
                    <h2><?php echo get_field('a_good_bonus_would_be_title'); ?></h2>
                    <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( $good_bonus ) ); ?></div>
                </li>
            <?php } ?>
            <li class="single-requrements__item">
                <h2><?php echo get_field('what_do_we_offer_title'); ?></h2>
                <div class="careers-requirements__wrapper"><?php echo get_list_by_line_break( remove_extra_line_breaks( get_field('we_offer', $post->ID) ) ); ?></div>
            </li>

        </ul>
    </section>

    <section class="share share-block wrapped-section" id="social">
        <?php echo do_shortcode("[ssba]"); ?>
    </section>

    <section class="join-team wrapped-section" id="apply-job">
        <h2 class="section-heading js-hide-after-submit"><?php _e('Зроби свій відгук', 'moc'); ?></h2>
        <p class="form-description careers-description align-c">Якщо тебе зацікавила будь-яка з наших позицій, просто заповни цю форму.</p>
        <p class="form-description careers-description align-c">Не вагайся, навіть якщо тобі не вистачає певних знань, ми любимо спілкуватись з розумними людьми!</p>
        <div class="contact-form-wrapper">
            <div class="gform_wrapper">
                <?php echo do_shortcode('[contact-form-7 id="5411" title="Careers Ua"]'); ?></div>
            </div>

    </section>
</main>

<?php get_footer(); ?>