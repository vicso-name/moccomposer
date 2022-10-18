<ul class="social-list footer-social__list">
    <?php
    //page ID
    $launch_page = get_page_by_path( 'its-all-about-your-launch' );
    if ( $launch_page ) {
        $targetpage_id =  $launch_page->ID;
    }
    else {
        $targetpage_id = get_option('page_on_front');
    };
    if (get_page_template_slug() == 'page-design.php') {
        $targetpage_id = get_the_ID();
    };
    $social_links = get_field('social_links', $targetpage_id);

    if ( !empty( $social_links ) ) {

        foreach ( $social_links as $social_link ) { ?>

            <li class="<?php echo $social_link['class']; ?>">

                <a href="<?php echo $social_link['class'] == 'skype' ? "skype:{$social_link['url']}?chat" : $social_link['url']; ?>" target="_blank" rel="noopener nofollow">
                    <svg class="social-footer-icon" aria-label="<?php echo $social_link['class']; ?>">
                        <use xlink:href="#social-<?php echo $social_link['class']; ?>"></use>
                    </svg>
                </a>

            </li>

        <?php }
    } ?>

</ul>
