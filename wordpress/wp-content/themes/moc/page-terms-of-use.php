<?php
/*
 * Template Name: Terms of Use
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed' ); ?>
<?php get_template_part('template-parts/chatbots-svg'); ?>

<main id="main" class="page-services page-terms-of-use">
    <?php
    if( get_field('terms_of_use_content') ): ?>
        <section class="flexible-section details-block align-l">
            <div class="description-block align-l">
                <div>
                    <?php the_field('terms_of_use_content'); ?>
                </div>
            </div>
        </section>
    <?php endif;
    ?>
</main>

<?php get_footer(); ?>
