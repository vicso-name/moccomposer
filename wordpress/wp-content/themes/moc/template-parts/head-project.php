<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/favicon.ico"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part( 'template-parts/footer/social', 'svg' ); ?>