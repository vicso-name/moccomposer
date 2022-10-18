<?php
/*
 * Template Name: Page with PDF
 * */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    <!-- W3TC-include-css -->
</head>

<body <?php body_class(); ?>>

<div class="pdf-wrap">
    <div class="embed-wrap">
        <?php the_field('embed_pdf'); ?>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
