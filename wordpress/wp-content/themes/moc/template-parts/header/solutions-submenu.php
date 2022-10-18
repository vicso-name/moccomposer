<?php
//page ID
$launch_page = get_page_by_path('its-all-about-your-launch');
if ($launch_page) {
    $pageid = $launch_page->ID;
} else {
    $pageid = get_option('page_on_front');
};
$flex_content = get_field('homepage_channel', $pageid);
$flex_content_industry = get_field('homepage_industry', $pageid);
//var_dump($flex_content);?>


<?php  if (!empty($flex_content_industry)) { ?>

<li class="has-submenu">
    <span class="submenu-title">By Industry</span>
    <ul class="inner-submenu">
        <?php
            foreach ($flex_content_industry as $flex_block) { ?>
                <li class="inner-submenu-item <?php echo $flex_block['icon_class']; ?>">
                    <a href="<?php echo $flex_block['link']; ?>" tabindex="-1" class="inner-submenu-link">
                                <span class="icon-holder-submenu">
                                    <span class="icon-holder-submenu__inner">
                                        <?php get_template_part('template-parts/solutions-menu-icons/' . $flex_block["icon_class"]); ?>
                                    </span>
                                </span>
                        <span><?php echo $flex_block['title']; ?></span>
                    </a>
                </li>
            <?php }
        ?>
    </ul>
</li>
<?php } ?>

<?php  if (!empty($flex_content)) { ?>
<li class="has-submenu">
    <span class="submenu-title">By Channel</span>
    <ul class="inner-submenu">
        <?php
            foreach ($flex_content as $flex_block) { ?>
                <li class="inner-submenu-item <?php echo $flex_block['icon_class']; ?>">
                    <a href="<?php echo $flex_block['link']; ?>" tabindex="-1" class="inner-submenu-link">
                                <span class="icon-holder-submenu">
                                    <span class="icon-holder-submenu__inner">
                                        <?php get_template_part('template-parts/channels-menu-icons/' . $flex_block["icon_class"]); ?>
                                    </span>
                                </span>
                        <span><?php echo $flex_block['title']; ?></span>
                    </a>
                </li>
            <?php }
        ?>
    </ul>
</li>
<?php } ?>