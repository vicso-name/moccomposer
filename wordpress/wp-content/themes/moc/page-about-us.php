<?php
/**
 * Template Name: About Us Page
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed' ); ?>
<main id="main" class="page-about-us page-no-lazy template" >
    <?php get_template_part( 'template-parts/about-us/our-purpose', 'section' ); ?>
    <?php get_template_part( 'template-parts/about-us/company-facts', 'section' ); ?>
    <?php get_template_part( 'template-parts/location-map', 'section' ); ?>
    <?php get_template_part( 'template-parts/about-us/our-accomplishments', 'section' ); ?>
    <?php get_template_part( 'template-parts/about-us/awards-recognitions', 'section' ); ?>
    <?php get_template_part( 'template-parts/about-us/our-masters', 'section' ); ?>
    <?php get_template_part( 'template-parts/about-us/path-to-success', 'section' ); ?>

    <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="about-form-wrapper">
        <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
        <p class="section-description centered-description js-hide-after-submit">
                <span class="desktop-only">Want to discuss a project or simply ask a question?<br/>
                </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

        <div class="moc-inner gform_wrapper" id="about-us-form">
            <?php echo do_shortcode('[contact-form-7 id="26211" title="About Us Page Form"]'); ?>
        </div>
    </section>

    <?php get_template_part('template-parts/zoho-questions-popup'); ?>
</main>

<?php get_footer(); ?>

