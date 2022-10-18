<?php
/**
 * Template Name: Launch Page *
 **/
get_template_part('template-parts/head'); ?>

<?php get_header('home'); ?>

<main role="main" class="launch-page js-top-bar-position" id="services-top">

    <?php
        get_template_part( 'template-parts/launch-page/services', 'home' );
        get_template_part( 'template-parts/launch-page/section', 'whoweare' );
        get_template_part( 'template-parts/section', 'projects-slider' );
        get_template_part( 'template-parts/processes/section', 'processes' );
        get_template_part( 'template-parts/launch-page/section', 'team' );
        get_template_part( 'template-parts/launch-page/section', 'owl-testimonials' );
        get_template_part( 'template-parts/launch-page/section', 'contact-form' );
        get_template_part( 'template-parts/launch-page/section', 'team-video' );
    ?>
</main>
<?php get_footer(''); ?>
