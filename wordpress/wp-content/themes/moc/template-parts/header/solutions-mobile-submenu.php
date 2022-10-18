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
    <li class="with-submenu with-mobile-submenu" data-open-menu="industries">
        <a href="#">By Industry</a>
    </li>
<?php } ?>

<?php  if (!empty($flex_content)) { ?>
    <li class="with-submenu with-mobile-submenu"  data-open-menu="channels">
        <a href="#">By Channel</a>
    </li>
<?php } ?>