<?php
/*
 * Template Name: Estimate
 * */

get_template_part('template-parts/head');
get_template_part('template-parts/header', 'fixed'); ?>

<main role="main" class="inner-page contacts-page hide-estimate">
    <section class="contact-form-wrapper estimate-form-wrapper">
        <h1 class="js-hide-after-submit">Get Free Estimate</h1>
        <p class="js-hide-after-submit section-description team-description">To receive an estimate for your next project, please answer the following questions:</p>
        <?php the_content(); ?>
    </section>
</main>

<?php get_footer(); ?>
