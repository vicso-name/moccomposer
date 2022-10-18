<?php
//page ID
$launch_page = get_page_by_path( 'its-all-about-your-launch' );
if ( $launch_page ) {
    $pageid =  $launch_page->ID;
}
else {
    $pageid = get_option('page_on_front');
};
$contacts_page_url = get_field('contacts_page', $pageid);
global $get_in_touch_text; ?>

<?php
$is_homepage = '';
if (!empty(parse_url($_SERVER['REQUEST_URI'])["query"])) {
    $is_homepage = strpos(parse_url($_SERVER['REQUEST_URI'])["query"], "homepage");
}
 ?>

<?php if( is_singular('careers-cherkasy') || is_singular('careers-kyiv') || is_singular('careers-winnipeg') || is_page_template( 'page-careers.php' )) {?>
    <a href="#apply-job" class="get-in-touch-link" data-apply-job>
        <?php _e('Apply for a job', 'moc'); ?>
    </a>
<?php } else { ?>

    <a href="<?php echo $contacts_page_url; ?>" class="get-in-touch-link" data-get-in-touch>
        <?php if (($get_in_touch_text)) { echo $get_in_touch_text ; } else {?>
            Get in touch <?php }?>

    </a>
<?php } ?>


