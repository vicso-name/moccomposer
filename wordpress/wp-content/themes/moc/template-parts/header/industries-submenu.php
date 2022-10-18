<!--<li class="enterprice-solutions">-->
<!--    <a class="submenu-item" href="--><?php //echo get_site_url(null, 'software-enterprise-solutions'); ?><!--">-->
<!--        <span class="icon-holder-submenu">-->
<!--            <svg>-->
<!--                <use xlink:href="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/home/header.svg#icon-services-menu__enterprise"></use>-->
<!--            </svg>-->
<!--        </span>-->
<!--        <span>Enterprise</span>-->
<!--    </a>-->
<!--</li>-->
<!--<li class="ecommerce">-->
<!--    <a class="submenu-item" href="--><?php //echo get_site_url(null, 'ecommerce'); ?><!--">-->
<!--        <span class="icon-holder-submenu">-->
<!--            <svg>-->
<!--                <use xlink:href="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/home/header.svg#icon-services-menu__e-commerce"></use>-->
<!--            </svg>-->
<!--        </span>-->
<!--        <span>E-commerce</span>-->
<!--    </a>-->
<!--</li>-->
<!--<li class="healthcare">-->
<!--    <a class="submenu-item" href="--><?php //echo get_site_url(null, 'healthcare'); ?><!--">-->
<!--        <span class="icon-holder-submenu">-->
<!--            <svg>-->
<!--                <use xlink:href="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/home/header.svg#icon-services-menu__healthcare"></use>-->
<!--            </svg>-->
<!--        </span>-->
<!--        <span>Healthcare</span>-->
<!--    </a>-->
<!--</li>-->
<?php
//page ID
$launch_page = get_page_by_path('its-all-about-your-launch');
if ($launch_page) {
    $pageid = $launch_page->ID;
} else {
    $pageid = get_option('page_on_front');
};
$flex_content_industry = get_field('homepage_industry', $pageid);
//var_dump($flex_content);?>

<?php
if (!empty($flex_content_industry)) {
    foreach ($flex_content_industry as $flex_block) { ?>
        <li class="<?php echo $flex_block['icon_class']; ?>">
            <a href="<?php echo $flex_block['link']; ?>" tabindex="-1">
                                <span class="icon-holder-submenu">
                                    <span class="icon-holder-submenu__inner">
                                        <?php get_template_part('template-parts/menu-icons/' . $flex_block["icon_class"]); ?>
                                    </span>
                                </span>
                <span><?php echo $flex_block['title']; ?></span>
            </a>
        </li>
    <?php }
}
