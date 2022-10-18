<?php
/*
 * Template Name: Webinars - successful registration
 * */
?>


<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/webinars/webinars', 'svg'); ?>

<main class="webinar-registration page-container">


    <div class="page-content">
        <h1 class="webinar-registration__title">You have successfully registered for Webinar</h1>
        <h2 class="webinar-registration__subtitle js-registration-title"><span class="hidden">Title of the webinar</span></h2>
        <h3 class="webinar-registration__by-name">by Master of Code Global</h3>

        <div class="webinar-registration__image-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/images/webinars/webinar-registration.svg" alt="">
        </div>

        <a href="<?php echo get_site_url(); ?>/blog" class="webinar-registration__button button">Check our blog</a>
    </div>



</main>

<?php get_footer(); ?>
