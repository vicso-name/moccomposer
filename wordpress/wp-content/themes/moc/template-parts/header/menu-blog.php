<?php
function isMobileDevice()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
        , $_SERVER["HTTP_USER_AGENT"]);
}

if (isMobileDevice()) { ?>
    <div class="menu-holder" data-menu="main">
        <div class="scroll-holder">
            <div class="menu-header clearfix">
                <a href="#" aria-label="Close Menu" class="hamburger btn-close-main" data-close-menu="main">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="screen-reader-text">Mobile Menu</span>
                </a>
                <a href="<?php echo get_site_url(); ?>" class="logo-holder">
                    <svg aria-label="Master Of Code Homepage">
                        <use xlink:href="#main-logo"></use>
                    </svg>
                </a>
            </div>
            <nav id="mobile-nav">
                <?php $args = array(
                    'menu' => 2,
                    'container' => false,
                    'depth' => 1,
                    'items_wrap' => '<ul class="menu-list">%3$s</ul>'
                );
                wp_nav_menu($args); ?>
            </nav>
            <span class="divider"></span>
            <a href="<?php echo get_home_url(); ?>/contacts" aria-label="Subscribe"
               class="get-in-touch-link subscribe-link">
                <?php _e('Get in touch', 'moc'); ?>
            </a>
        </div>
    </div>

    <div class="menu-holder" data-menu="services">
        <div class="scroll-holder">
            <div class="menu-header clearfix">

                <a href="#" aria-label="Close Menu" class="btn-close" data-close-menu="main"><span
                            class="screen-reader-text">Close Menu</span></a>
                <a href="#" aria-label="Back" class="btn-back" data-close-menu="services"><span
                            class="screen-reader-text">Close Services</span></a>
                <span class="menu-title"><?php _e('Services', 'moc'); ?></span>
            </div>
            <ul class="menu-list">
                <?php get_template_part('template-parts/header/services-submenu'); ?>
            </ul>
            <span class="divider"></span>
            <a href="<?php echo get_home_url(); ?>/contacts" aria-label="Subscribe"
               class="get-in-touch-link subscribe-link">
                <?php _e('Get in touch', 'moc'); ?>
            </a>
        </div>
    </div>

    <div class="menu-holder" data-menu="channels">
        <div class="scroll-holder">
            <div class="menu-header clearfix">
                <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
                <a href="#" class="btn-back" data-close-menu="channels"><span
                            class="screen-reader-text">To Main Menu</span></a>
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
                <a href="#" aria-label="Close Menu" class="btn-close" data-close-menu="main"><span
                            class="screen-reader-text">Close Menu</span></a>
                <a href="#" aria-label="Back" class="btn-back" data-close-menu="company"><span
                            class="screen-reader-text">Close Menu</span></a>
                <span class="menu-title">Company</span>
            </div>
            <ul class="menu-list">
                <?php get_template_part('template-parts/header/company-submenu'); ?>
            </ul>
            <span class="divider"></span>
            <a href="<?php echo get_home_url(); ?>/contacts" aria-label="Subscribe"
               class="get-in-touch-link subscribe-link">
                <?php _e('Get in touch', 'moc'); ?>
            </a>
        </div>
    </div>

    <div class="menu-holder" data-menu="industries">
        <div class="scroll-holder">
            <div class="menu-header clearfix">
                <a href="#" aria-label="Close Menu" class="btn-close" data-close-menu="main"><span
                            class="screen-reader-text">Close Menu</span></a>
                <a href="#" aria-label="Back" class="btn-back" data-close-menu="industries"><span
                            class="screen-reader-text">Close Menu</span></a>
                <span class="menu-title">Industries</span>
            </div>
            <ul class="menu-list">
                <?php get_template_part('template-parts/header/industries-submenu'); ?>
            </ul>
            <span class="divider"></span>
            <a href="<?php echo get_home_url(); ?>/contacts" aria-label="Subscribe"
               class="get-in-touch-link subscribe-link">
                <?php _e('Get in touch', 'moc'); ?>
            </a>
        </div>
    </div>

    <div class="menu-holder" data-menu="careers">
        <div class="scroll-holder">
            <div class="menu-header clearfix">
                <a href="#" class="btn-close" data-close-menu="main"><span class="screen-reader-text">Close Menu</span></a>
                <a href="#" class="btn-back" data-close-menu="careers"><span class="screen-reader-text">To Main Menu Menu</span></a>
                <span class="menu-title">Careers</span>
            </div>
            <ul class="menu-list">
                <?php get_template_part('template-parts/header/careers-submenu'); ?>
            </ul>
            <span class="divider"></span>
            <?php get_template_part('template-parts/header/get-in-touch'); ?>

        </div>
    </div>
<?php } ?>

<div class="subscribe-block" id="subscribe-block" data-menu="subscribe">
    <div class="scroll-holder subscribe-content">

        <a href="#" aria-label="Close Menu" class="btn-close" data-close-menu="main"><span
                    class="screen-reader-text">Close Menu</span>
            <span class='close-btn'>
                     <span class="close-btn-line first"></span>
                     <span class="close-btn-line second"></span>
                </span>
        </a>

        <h2 class="subscribe-title"><?php _e('Stay updated on our news', 'moc'); ?></h2>

        <div class="contact-form-wrapper">
            <div class="gform_wrapper" id="subscribe-form">
                <div id="mc_embed_signup_scroll" class="subscribe-form">

                    <?php echo do_shortcode('[contact-form-7 id="32696" title="Blog subscribtion"]'); ?>

                    <div class="icon icon--order-success svg show-on-success" style="display:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" fill="none">
                            <circle cx="60" cy="60" r="58" stroke="#F1563C" stroke-width="4" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                            <path d="M30 62.5L48 80.5L90 38.5" stroke="#F1563C" stroke-width="5" style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"><path>
                        </svg>
                    </div>
                    <div class="response success-response" style="display: none;">
                        Thank you for subscribing!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="subscribe-block" id="download-block" data-menu="download">
    <div class="scroll-holder subscribe-content">

        <a href="#" aria-label="Close Menu" class="btn-close" data-close-menu="main"><span
                    class="screen-reader-text">Close Menu</span>
            <span class='close-btn'>
                     <span class="close-btn-line first"></span>
                     <span class="close-btn-line second"></span>
                </span>
        </a>

        <h2 class="subscribe-title"><?php _e('Fill out the form to access the guide', 'moc'); ?></h2>

        <div class="contact-form-wrapper">
            <div class="gform_wrapper" id="download-form" data-tag="" data-title="">
                <div class="subscribe-form">

                    <?php echo do_shortcode('[contact-form-7 id="35801" title="Blog download pdf"]'); ?>

                    <div class="icon icon--order-success svg show-on-success" style="display:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" fill="none">
                            <circle cx="60" cy="60" r="58" stroke="#F1563C" stroke-width="4" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                            <path d="M30 62.5L48 80.5L90 38.5" stroke="#F1563C" stroke-width="5" style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"><path>
                        </svg>
                    </div>
                    <div class="response success-response" style="display: none;">
                        We've just sent you an email containing your copy.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>