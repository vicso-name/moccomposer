<?php
/**
 * Template Name: Google RCS Page
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
    <main id="main" class="google-rcs">
        <section class="google-rcs-hero page-container">
            <div class="google-rcs-hero__text-part">
                <h1 class="google-rcs-hero__title"><?php the_field('google_rcs_hero_title'); ?></h1>
                <p class="google-rcs-hero__description"><?php the_field('google_rcs_hero_descr'); ?></p>

                <?php
                $link = get_field('google_rcs_cta_button');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="lets-chat" href="#rcs-form-wrapper"
                       target="<?php echo esc_attr($link_target); ?>" data-get-in-touch>
                        <span class="cta-content"><?php echo esc_html($link_title); ?></span>&nbsp;&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                            <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

            <div class="google-rcs-hero__image-part">
<!--                <img src="--><?php //the_field('google_rcs_hero_image'); ?><!--" alt="" class="google-rcs-hero__img">-->

                <picture>
                    <source srcset="<?php the_field('google_rcs_hero_image_webp'); ?>" type="image/webp">
                    <img src="<?php the_field('google_rcs_hero_image'); ?>" class="google-rcs-hero__img" alt="">
                </picture>
            </div>
        </section>

        <section class="google-rcs-values">
            <?php if (have_rows('google_rcs_values_list')): ?>
                <div class="google-rcs-values__list page-container">
                    <?php while (have_rows('google_rcs_values_list')) : the_row(); ?>
                        <div class="google-rcs-values__item">
                            <span class="value-title"><?php the_sub_field('item_value'); ?></span>
                            <p class="value-description"><?php the_sub_field('item_descr'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </section>

        <section class="google-rcs-benefits">
            <div class="page-container">
                <h2 class="google-rcs-benefits__title section-title"><?php the_field('why_google_rcs_section_titel'); ?></h2>

                <?php if (have_rows('why_google_rcs_benefits_list')): ?>
                    <div class="apple-benefits__list">
                        <?php while (have_rows('why_google_rcs_benefits_list')) : the_row(); ?>

                            <div class="google-rcs-benefits__item">
                                <div class="google-rcs-benefits__icon-wrap">
                                    <img src="<?php the_sub_field('item_icon'); ?>" alt="" class="google-rcs-benefits__icon">
                                </div>
                                <h3 class="item-title"><?php the_sub_field('item_title'); ?></h3>
                                <p class="item-description"><?php the_sub_field('item_info'); ?></p>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="google-rcs-features page-container">
            <h2 class="google-rcs-features__title section-title"><?php the_field('features_google_rcs_section_title'); ?></h2>

            <div class="google-rcs-features__inner">

                <?php if (have_rows('features_google_rcs_information_list')): ?>
                    <div class="google-rcs-features__list">
                        <?php while (have_rows('features_google_rcs_information_list')) : the_row(); ?>

                            <div class="google-rcs-features__item">
                                <div class="google-rcs-features__image-part">
                                    <picture>
                                        <source srcset="<?php the_sub_field('item_image_webp'); ?>" type="image/webp">
                                        <img src="<?php the_sub_field('item_image'); ?>" alt="">
                                    </picture>
                                </div>

                                <div class="google-rcs-features__text-part">
                                    <h3 class="google-rcs-features__item-title"><?php the_sub_field('item_title'); ?></h3>
                                    <p class="google-rcs-features__item-description"><?php the_sub_field('item_description'); ?></p>
                                </div>

                                <div class="google-rcs-features__decor-image">
                                    <img src="<?php the_sub_field('item_decoration'); ?>" alt="">
                                </div>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="google_rcs_advantages">
            <div class="page-container">
                <h2 class="google_rcs_advantages__title section-title"><?php the_field('google_rcs_advantages_title'); ?></h2>

                <?php if (have_rows('google_rcs_advantages_list')): ?>
                    <div class="google_rcs_advantages__list">
                        <?php while (have_rows('google_rcs_advantages_list')) : the_row(); ?>

                            <div class="google_rcs_advantages__item">
                                <div class="google_rcs_advantages__icon-wrap">
                                    <img src="<?php the_sub_field('item_icon'); ?>" alt="" class="google_rcs_advantages__icon">
                                </div>
                                <h3 class="item-title"><?php the_sub_field('item_title'); ?></h3>
                                <p class="item-description"><?php the_sub_field('item_info'); ?></p>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="rcs-form-wrapper">
            <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
            <p class="section-description centered-description js-hide-after-submit">
                <span class="desktop-only">Want to discuss a project or simply ask a question?<br/>
                </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

            <div class="moc-inner gform_wrapper" id="google-rcs-form">
                <?php echo do_shortcode('[contact-form-7 id="26195" title="Google RCS page form"]'); ?>
            </div>
        </section>

        <?php get_template_part('template-parts/zoho-questions-popup'); ?>
    </main>
<?php get_footer(); ?>
