<?php
careers_redirects_from_404();

get_template_part('template-parts/head'); ?>

<main>

    <h1><?php _e("err<i>404</i>r", 'moc'); ?></h1>

    <p><?php _e("What you are looking for doesn't exist.<br>Follow the orange square...", 'moc'); ?></p>

</main>

<footer>

    <a href="<?php echo get_site_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_bar.png" width="65" height="65"
             alt="<?php _e('World-class development of web and mobile experiences - Master of Code Global', 'moc'); ?>">
    </a>

</footer>

</body>
</html>