<?php //get_template_part('template-parts/footer/social', 'svg'); ?>

<footer class="main-footer hide-estimate">
	<?php get_template_part('template-parts/footer/section', 'contacts-three-columns'); ?>
</footer>

<!-- W3TC-include-js-head -->

<?php if (get_page_template_slug() == 'page-blog.php' ||  is_singular( 'post' )) { ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
<script async src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
<?php } ?>
<?php
$page_slug = get_page_template_slug();
echo '<p class="hidden">' . $page_slug . '</p>' ;
if ( $page_slug == 'page-careers.php' || is_singular( 'careers-kyiv' ) || is_singular( 'careers-cherkasy' ) || is_singular( 'careers-winnipeg' )) { ?>
    <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));</script>
<?php };?>

<?php wp_footer(); ?>
</body>
</html>