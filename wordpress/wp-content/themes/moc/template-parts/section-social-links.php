<ul class="social-list" id="games-social-list">

    <?php
    $launch_page = get_page_by_path( 'its-all-about-your-launch' );
    if ( $launch_page ) {
        $frontpage_id =  $launch_page->ID;
    }
    else {
        $frontpage_id = get_option('page_on_front');
    };
    $social_links = get_field('social_links', $frontpage_id);

    if ( !empty( $social_links ) ) {

        foreach ( $social_links as $social_link ) { ?>

            <li class="<?php echo $social_link['class']; ?>">

                <a href="<?php echo $social_link['class'] == 'skype' ? "skype:{$social_link['url']}?chat" : $social_link['url']; ?>" target="_blank" rel="nofollow">
                    <svg class="social-footer-icon"><use xlink:href="#social-<?php echo $social_link['class']; ?>"></use></svg>
                </a>

            </li>

        <?php }
    } ?>

</ul>