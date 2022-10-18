<?php
//page ID
$launch_page = get_page_by_path('its-all-about-your-launch');
if ($launch_page) {
    $pageid = $launch_page->ID;
} else {
    $pageid = get_option('page_on_front');
};
$flex_content = get_field('homepage_channel', $pageid);
//var_dump($flex_content);


$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (stristr($user_agent, 'MSIE') or stristr($user_agent, 'NT')) {

    // for IE11
    if (!empty($flex_content)) {
        foreach ($flex_content as $flex_block) { ?>
            <li class="<?php echo $flex_block['icon_class']; ?>">
                <a href="<?php echo $flex_block['link']; ?>" tabindex="-1">
                                <span class="icon-holder-submenu">
                                              <span class="icon-holder-submenu__inner">
                                    <?php get_template_part('template-parts/channels-menu-icons/' . $flex_block["icon_class"]); ?>
                                              </span>
                                              </span>
                    <span><?php echo $flex_block['title']; ?></span>
                </a>
            </li>
        <?php }
    }

} else {

    // for NORMAL browsers
    if (!empty($flex_content)) {
        foreach ($flex_content as $flex_block) { ?>
            <li class="<?php echo $flex_block['icon_class']; ?>">
                <a href="<?php echo $flex_block['link']; ?>" tabindex="-1">
                                <span class="icon-holder-submenu">
                                    <span class="icon-holder-submenu__inner">
                                        <?php get_template_part('template-parts/channels-menu-icons/' . $flex_block["icon_class"]); ?>
                                    </span>
                                </span>
                    <span><?php echo $flex_block['title']; ?></span>
                </a>
            </li>
        <?php }
    }

}
?>
