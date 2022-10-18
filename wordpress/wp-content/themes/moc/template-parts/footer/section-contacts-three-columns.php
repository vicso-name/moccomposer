<section class="contacts">

    <?php global $post;

    $args = array(
        'post_type' => 'contact',
        'posts_per_page'   => 4,
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'post_status'      => 'publish',
    );
    $contacts = get_posts( $args );
    if ( !empty($contacts) ) { ?>

        <ul class="contacts-list">


            <?php foreach ( $contacts as $post ) {
                setup_postdata( $post );?>

            <li class="country-wrapper">
                <h2><?php the_title(); ?></h2>
                <ul class="address-wrapper">
                    <?php
                    $flex_content = get_field('add_address');
                    if(!empty($flex_content)){ ?>

                    <?php foreach($flex_content as $flex_block) { ?>

                        <li class="single-address">
                            <address>

                                <?php echo $flex_block['contact_address'];
                                    $phone_number = str_replace(' ','',$flex_block['phone']);
                                ?>
                                <a href="tel:<?php echo $phone_number; ?>" class="address-phone__contacts phone-<?php echo $flex_block['id']; ?>" aria-label="phone-number: <?php echo $phone_number; ?>">
                                    <?php echo $flex_block['phone']; ?>
                                </a>
                                <a href="mailto:<?php echo $flex_block['email']; ?>" class="address-mail__contacts <?php echo $flex_block['id']; ?>" data-metrix="Email<?php the_title(); ?>">Send email
                                </a>

                            </address>
                        </li>
                        <?php } } ?>
                    </ul>


                </li>

            <?php  }
            wp_reset_postdata(); ?>
        </ul>
        <?php get_template_part('template-parts/footer/section', 'social-links'); ?>
        <?php get_template_part('template-parts/footer/section', 'clutch'); ?>
        <div class="copy">
            <?php printf( __('© %s Master of Code Global', 'moc'), date('Y') ); ?>
            <ul class="terms">
                <li>
                    <a href="<?php echo get_site_url(); ?>/privacy-policy">Privacy policy</a>
                </li>
                <li>
                    <a href="<?php echo get_site_url(); ?>/terms-of-use">Terms of Use</a>
                </li>
            </ul>

        </div>
        <?php
        $city = '';
        $country = '';
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if (is_plugin_active('geoip-detect/geoip-detect.php')) {
            $city = do_shortcode('[geoip_detect2 property="city"]');
            $country = do_shortcode('[geoip_detect2 property="country"]');
        }
        ?>
        <input type="text" class="hidden feedback_ip" name="feedback_ip" value="<?php echo $ip; ?>"/>
        <span class="hidden" id="client_city"><?php echo $city; ?></span>
        <span class="hidden" id="client_country"><?php echo $country; ?></span>

    <?php } ?>

</section>
