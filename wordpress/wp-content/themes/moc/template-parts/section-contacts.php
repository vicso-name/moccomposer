<section class="contacts">

    <h1 class="responsive-header"><?php _e('Contacts', 'moc'); ?></h1>

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

        <ul class="address-list">

            <?php foreach ( $contacts as $post ) {
                setup_postdata( $post );?>

                <li>
                    <h2><?php the_title(); ?></h2>

                    <address>

                        <?php the_field('contact_address'); ?>

                        <a href="tel:<?php the_field('phone', $post->ID); ?>"><?php the_field('phone', $post->ID); ?></a>

                        <a href="mailto:<?php the_field('email', $post->ID); ?>" class="mail"
                           id="<?php the_field('id', $post->ID); ?>"><span class="screen-reader-text"><?php the_field('email', $post->ID); ?></span></a>

                    </address>

                </li>

            <?php }
            wp_reset_postdata(); ?>
        </ul>

        <?php get_template_part('template-parts/footer/section', 'social-links')?>

        <p class="copy"><?php printf( __('© %s Master of Code Global', 'moc'), date('Y') ); ?></p>

    <?php } ?>

</section>