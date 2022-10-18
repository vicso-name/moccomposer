<button class="btn-menu hamburger" data-open-menu="main">
    <span class="line"></span>
    <span class="line"></span>
    <span class="line"></span>
    <span class="screen-reader-text">Menu</span>
</button>
<a href="<?php echo get_site_url(); ?>" class="logo fixed-logo-wrapper" id="fixed-logo-wrapper">
    <img data-src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="MasterOfCode Global"
         class="lozad fixed-logo" width="65" height="65">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_full.svg" alt="MasterOfCode Global"
         class="totally-fixed-logo" width="275" height="235">
</a>
<nav aria-label="Main Navigation">
    <?php $args = array(
        'menu' => 2,
        'container' => false,
        'depth' => 1,
        'items_wrap' => '<ul class="nav fixed-list" id="main-nav" role="menubar" aria-hidden="false">%3$s</ul>'
    );

    wp_nav_menu($args); ?>
    <ul class="sub-menu" id="services-submenu" data-test="true" aria-hidden="true">
        <?php get_template_part('template-parts/header/services-submenu'); ?>
    </ul>
    <ul class="sub-menu" id="channels-submenu" data-test="true" aria-hidden="true">
        <?php get_template_part('template-parts/header/channels-submenu'); ?>
    </ul>
    <ul class="sub-menu" id="solutions-submenu" data-test="true" aria-hidden="true">
        <?php get_template_part('template-parts/header/solutions-submenu'); ?>
    </ul>
    <ul class="sub-menu" id="resources-submenu" data-test="true" aria-hidden="true">
        <?php get_template_part('template-parts/header/resources-submenu'); ?>
    </ul>
    <ul class="sub-menu right-aligned" id="industries-submenu" data-test="true" aria-hidden="true">
        <?php get_template_part('template-parts/header/industries-submenu'); ?>
    </ul>
    <ul class="sub-menu" id="company-submenu" data-test="true" aria-hidden="true" >
        <?php get_template_part('template-parts/header/company-submenu'); ?>
    </ul>
    <ul class="sub-menu" id="careers-submenu" data-test="true" aria-hidden="true">
        <?php get_template_part('template-parts/header/careers-submenu'); ?>
    </ul>
