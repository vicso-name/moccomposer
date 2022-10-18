<?php
/*
 * Template Name: Webinars
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/webinars/webinars', 'svg'); ?>

<main id="main" class="webinars-page-content">
    <div class="page-container">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>

    <div class="webinars-container">


        <?php

        $args = array(
            'post_type' => 'webinars',
            'order' => 'ASC',
            'posts_per_page' => -1
        );
        $webinars = new WP_Query($args); ?>

        <?php if ($webinars->have_posts()): ?>
            <div class="upcoming-webinars-wrap owl-carousel owl-theme">
                <?php while ($webinars->have_posts()) : $webinars->the_post(); ?>

                    <?php

                    //date_default_timezone_set('Europe/Kiev');
                    $today = date('F d, Y H:i:s', strtotime('-1 hour'));
                    $date = get_field('webinar_date', false, false);
                    $date = new DateTime($date);
                    $newDate = $date->format('F d, Y H:i:s');

                    if (strtotime($today) < strtotime($newDate)) { ?>

                        <?php get_template_part('template-parts/webinars/upcoming-webinars'); ?>

                    <?php } ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        <?php endif; ?>

        <?php

        $args = array(
            'post_type' => 'webinars',
            'order' => 'DESC',
            'posts_per_page' => 5
        );
        $webinars = new WP_Query($args); ?>

        <?php if ($webinars->have_posts()): ?>
            <div class="page-container">

                <div class="post-list">
                    <?php while ($webinars->have_posts()) : $webinars->the_post(); ?>

                        <?php

                        //date_default_timezone_set('Europe/Kiev');
                        $today = date('F d, Y H:i:s', strtotime('-1 hour'));
                        $date = get_field('webinar_date', false, false);
                        $date = new DateTime($date);
                        $newDate = $date->format('F d, Y H:i:s');

                        if (strtotime($today) > strtotime($newDate)) { ?>

                            <?php get_template_part('template-parts/webinars/past-webinars'); ?>

                        <?php } ?>

                    <?php endwhile; ?>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>


</main>

<?php get_footer(); ?>
