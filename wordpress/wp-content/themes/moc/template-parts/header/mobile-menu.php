<div class="menu-holder" data-menu="main">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="hamburger btn-close-main" data-close-menu="main">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="screen-reader-text">Menu</span>
            </a>
            <a href="<?php echo get_site_url(); ?>" class="logo-holder">
                <svg class="main-logo-outline" aria-label="Master Of Code Global Logo">
                    <use xlink:href="#main-logo"></use>
                </svg>
            </a>
        </div>
        <nav id="mobile-nav">
            <ul class="menu-list mobile-menu">
                <?php $args = array(
                    'menu' => 2,
                    'container' => false,
                    'depth' => 1,
                    'items_wrap' => '%3$s'
                );
                wp_nav_menu($args); ?>
                <li class="menu-item">
                    <span class="divider"></span>
                    <?php get_template_part('template-parts/header/get-in-touch'); ?>
                </li>
            </ul>
        </nav>

        <?php
        $launch_page = get_page_by_path('its-all-about-your-launch');
        if ($launch_page) {
            $frontpage_id = $launch_page->ID;
        } else {
            $frontpage_id = get_option('page_on_front');
        };
        $contacts_page_url = get_field('contacts_page', $frontpage_id); ?>

    </div>
</div>

<div class="menu-holder" data-menu="services">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="services"><span class="screen-reader-text">To Main Menu</span></a>
            <span class="menu-title"><?php _e('Services', 'moc'); ?></span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/services-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>

    </div>
</div>


<div class="menu-holder" data-menu="solutions">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="solutions"><span class="screen-reader-text">To Main Menu</span></a>
            <span class="menu-title"><?php _e('Solutions', 'moc'); ?></span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/solutions-mobile-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>

    </div>
</div>

<div class="menu-holder" data-menu="industries">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="industries"><span
                        class="screen-reader-text">To Main Menu Menu</span></a>
            <span class="menu-title">Industries</span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/industries-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>

    </div>
</div>

<div class="menu-holder" data-menu="channels">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="channels"><span class="screen-reader-text">To Main Menu</span></a>
            <span class="menu-title"><?php _e('Channels', 'moc'); ?></span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/channels-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>
    </div>
</div>

<div class="menu-holder" data-menu="resources">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="resources"><span
                        class="screen-reader-text">To Main Menu</span></a>
            <span class="menu-title"><?php _e('Resources', 'moc'); ?></span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/resources-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>
    </div>
</div>

<div class="menu-holder" data-menu="company">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="company"><span class="screen-reader-text">To Main Menu</span></a>
            <span class="menu-title">Company</span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/company-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>

    </div>
</div>

<div class="menu-holder" data-menu="careers">
    <div class="scroll-holder">
        <div class="menu-header clearfix">
            <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
            <a href="#" class="btn-back" data-close-menu="careers"><span
                        class="screen-reader-text">To Main Menu Menu</span></a>
            <span class="menu-title">Careers</span>
        </div>
        <ul class="menu-list">
            <?php get_template_part('template-parts/header/careers-submenu'); ?>
        </ul>
        <span class="divider"></span>
        <?php get_template_part('template-parts/header/get-in-touch'); ?>

    </div>
</div>