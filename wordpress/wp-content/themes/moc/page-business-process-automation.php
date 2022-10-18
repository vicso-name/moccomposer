<?php
/**
 * Template Name: Business Process Automation Page
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed' ); ?>
<main id="main" class="page-business-process page-no-lazy template" >
	<?php get_template_part( 'template-parts/business-process/section', 'hero' ); ?>

    <?php get_template_part( 'template-parts/business-process/benefits', 'section' ); ?>
    <?php get_template_part( 'template-parts/business-process/what-we-can-do', 'section' ); ?>
    <?php get_template_part( 'template-parts/business-process/integrations', 'section' ); ?>
    <?php get_template_part( 'template-parts/business-process/technologies', 'section' ); ?>

    <?php get_template_part( 'template-parts/business-process/bpa-blog', 'section' ); ?>

    <?php get_template_part( 'template-parts/business-process/contact', 'section' ); ?>
    <?php get_template_part('template-parts/zoho-questions-popup'); ?>

</main>

<?php get_footer(); ?>

