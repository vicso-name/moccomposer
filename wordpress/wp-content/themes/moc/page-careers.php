<?php
/*
 * Template Name: Careers
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>

<?php $career_location = get_field('career_location');


$career_slug = 'careers-'.strtolower($career_location);

$args = array(
    'post_type' => $career_slug,
    'posts_per_page' => -1,
    'orderby' => 'menu_order, date',
    'order' => 'ASC',
    'post_status' => 'publish'
);
$careers = get_posts( $args );
?>
<main id="main" class="inner-page careers-page">

    <section class="intro wrapped-section">
        <h1 class="careers-title"><?php _e('We Are Hiring', 'moc'); ?></h1>
        <h2 class="careers-subtitle">in <?php echo $career_location; ?></h2>
        <?php if ( !empty( $careers ) ) { ?>
        <p class="section-description align-l"><?php the_field('we_are_hiring_text', $post->ID); ?></p>
        <?php } else { ?>
            <p class="section-description centered-section no-careers">
                Currently we don't have any open positions in <?php echo $career_location; ?>
            </p>
        <?php } ?>
    </section>

    <section class="careers-openings wrapped-section">
        <?php

        if ( !empty( $careers ) ) { ?>
            <ul class="grid-list inline-grid flex-grid careers-list">

                <?php foreach( $careers as $career ) {

                    $single_location = get_field('career_location', $career->ID);


                    $to_post = false;

                    if ($career_location == "Cherkasy") {
                        if (($single_location == "") || ($single_location == "Cherkasy") || ($single_location == "Cherkasy/Remote") || ($single_location == "Сherkasy/Ukraine remote")) {
                            $to_post = true;
                        }
                    }
                    elseif  ($career_location == "Kyiv") {
                        if (($single_location == "Kyiv") || ($single_location == "Kyiv/Remote") || ($single_location == "Kyiv/Ukraine remote") || ($single_location == "Kyiv/Ukraine/Remote")) {
                            $to_post = true;
                        }
                    }
                    elseif ($career_location == "Winnipeg") {
                        if (($single_location == "Winnipeg") || ($single_location == "Winnipeg/Remote") || ($single_location == "Winnipeg/Canada remote") || ($single_location == "USA/Canada/Remote")) {
                            $to_post = true;
                        }
                    }
                    elseif  ($career_location == "Seattle") {
                        if (($single_location == "Seattle") || ($single_location == "Seattle/Remote") || ($single_location == "USA/Canada/Remote")) {
                            $to_post = true;
                        }
                    }
                    elseif  ($single_location == $career_location) {
                        $to_post = true;
                    }
                    if ($to_post) {
                        ?>
                        <li class="grid-list__item inline-grid__item flex-grid__item careers-list__item">

                            <a class="careers-item__link" href="<?php the_permalink( $career->ID ); ?>">
                                <?php
                                $career_img = get_field('career_image', $career->ID);
                                $career_img = $career_img ?: get_template_directory_uri() . '/images/careers/default.svg';
                                $career_background = get_field('career_background', $career->ID);
                                $career_background = $career_background ?: get_template_directory_uri() . '/images/careers/default_bg.png';
                                ?>
                                <span class="careers-item__heading" style="background-image: url(<?php echo $career_background; ?>)"></span>
                                <img class="lozad careers-item__image" src="image.svg" data-src="<?php echo $career_img; ?>"
                                     alt="<?php echo $career->post_title; ?>" width="100" height="100">
                                <h2><?php echo $career->post_title; ?></h2>
                                <div class="careers-requirements__wrapper">
                                    <?php if (get_field('from_you_appearance', $career->ID) == 'text') { ?>
                                        <?php echo get_field('from_you', $career->ID); ?>
                                    <?php }
                                    else {
                                        echo get_list_by_line_break( remove_extra_line_breaks( get_field('from_you', $career->ID) ) );
                                    }; ?>
                                </div>

                                    <a href="<?php the_permalink( $career->ID ); ?>" class="read-more"><?php _e( 'Details', 'moc' ); ?></a>
                            </a>

                        </li>
                    <?php }} ?>
            </ul>

        <?php } ?>
        <p class="hidden" id="career-location"><?php echo $career_location; ?></p>
        <?php if ($career_location != 'Seattle' && $career_location != 'Winnipeg' ) {?>
            <p class="subscribe-job-wrapper"><a href="#" data-open-menu="subscribe-careers">Subscribe</a> for new jobs</p>
        <?php } ?>
    </section>

    <section class="apply-job wrapped-section contact-form-wrapper" id="apply-job">
        <h2 class="section-heading js-hide-after-submit"><?php _e( 'Apply for a job', 'moc' ); ?></h2>
        <p class="form-description align-c js-hide-after-submit">
            <?php $apply_job = empty( $careers ) ? 'apply_job_empty' : 'apply_job';
            the_field( $apply_job, $post->ID ); ?>
        </p>
        <div class="gform_wrapper" id="careers-form"><?php

            switch ($career_location) {
                case 'Seattle':
                    echo do_shortcode('[contact-form-7 id="19234" title="Careers Seattle"]');
                    break;
                case 'Winnipeg':
                    echo do_shortcode('[contact-form-7 id="5410" title="Careers Winnipeg"]');
                    break;
                case 'Cherkasy':
                    echo do_shortcode('[contact-form-7 id="5409" title="Careers"]');
                    break;
                case '':
                    echo do_shortcode('[contact-form-7 id="5409" title="Careers"]');
                    break;
                case 'Kyiv':
                    echo do_shortcode('[contact-form-7 id="9193" title="Careers"]');
                    break;
            }
            ?>
        </div>
    </section>

</main>
<?php get_template_part('template-parts/header/menu', $career_slug); ?>
<?php get_footer(); ?>
