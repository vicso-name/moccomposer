<?php
/**
 * Template Name: Apple Business Chat Page
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
    <main id="main" class="apple-chat">
        <section class="apple-chat-hero page-container">
            <div class="apple-chat-hero__inner">
                <h1 class="apple-chat-hero__title"><?php the_field('app_chat_hero_title'); ?></h1>
                <p class="apple-chat-hero__description"><?php the_field('app_chat_hero_descr'); ?></p>
                <p class="apple-chat-hero__cta-text"><?php the_field('app_chat_hero_cta_text'); ?></p>

                <?php
                $link = get_field('app_chat_hero_btn');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="lets-chat" href="#abc-form-wrapper"
                       target="<?php echo esc_attr($link_target); ?>" data-get-in-touch>
                        <span class="cta-content"><?php echo esc_html($link_title); ?></span>&nbsp;&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                            <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <div class="apple-chat-hero__img-wrap">
                <div class="apple-chat-hero__img-inner">
                    <picture>
                        <source srcset="<?php the_field('app_chat_hero_image_webp'); ?>" type="image/webp">
                        <img src="<?php the_field('app_chat_hero_image'); ?>" class="apple-chat-hero__img" alt="">
                    </picture>
                </div>
            </div>
        </section>

        <section class="apple-values">
            <?php if (have_rows('values_list')): ?>
                <div class="apple-values__list page-container">
                    <?php while (have_rows('values_list')) : the_row(); ?>
                        <div class="apple-values__item">
                            <span class="value-title"><?php the_sub_field('item_value'); ?></span>
                            <p class="value-description"><?php the_sub_field('item_descr'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </section>

        <section class="apple-benefits">
            <div class="page-container">
                <h2 class="apple-benefits__title section-title"><?php the_field('why_abc_section_title'); ?></h2>
                <?php if (have_rows('why_abc_benefits_list')): ?>
                    <div class="apple-benefits__list">
                        <?php while (have_rows('why_abc_benefits_list')) : the_row(); ?>

                            <div class="apple-benefits__item">
                                <div class="apple-benefits__icon-wrap">
                                    <img src="<?php the_sub_field('item_icon'); ?>" alt="" class="apple-benefits__icon">
                                </div>
                                <h3 class="item-title"><?php the_sub_field('item_title'); ?></h3>
                                <p class="item-description"><?php the_sub_field('item_info'); ?></p>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="customer-service page-container">
            <div class="customer-service__inner">
                <h2 class="customer-service__title section-title"><?php the_field('customer_service_section_title'); ?></h2>
                <?php if (have_rows('section_information_list')): ?>
                    <div class="customer-service__list">
                        <?php while (have_rows('section_information_list')) : the_row(); ?>

                            <div class="customer-service__item">
                                <div class="customer-service__image-part">
                                    <picture>
                                        <source srcset="<?php the_sub_field('item_image_webp'); ?>" type="image/webp">
                                        <img src="<?php the_sub_field('item_image'); ?>" alt="">
                                    </picture>
                                </div>

                                <div class="customer-service__text-part">
                                    <h3 class="customer-service__item-title"><?php the_sub_field('item_title'); ?></h3>
                                    <p class="customer-service__item-description"><?php the_sub_field('item_description'); ?></p>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="abc-features">
            <div class="page-container">
                <h2 class="abc-features__title section-title"><?php the_field('features_section_title'); ?></h2>
                <?php if (have_rows('features_list')): ?>
                    <div class="abc-features__list">
                        <?php while (have_rows('features_list')) : the_row(); ?>

                            <div class="abc-features__item">
                                <div class="abc-features__icon-wrap">
                                    <img src="<?php the_sub_field('item_icon'); ?>" alt="" class="abc-features__icon">
                                </div>
                                <h3 class="item-title"><?php the_sub_field('item_title'); ?></h3>
                                <p class="item-description"><?php the_sub_field('item_info'); ?></p>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="abc-form-wrapper">
            <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
            <p class="section-description centered-description js-hide-after-submit">
                <span class="desktop-only">Want to discuss a project or simply ask a question?<br/>
                </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

            <div class="moc-inner gform_wrapper" id="apple-business-chat-form">
                <?php echo do_shortcode('[contact-form-7 id="26196" title="ABC Page Form"]'); ?>
            </div>
        </section>

        <?php get_template_part('template-parts/zoho-questions-popup'); ?>
    </main>

<?php get_footer(); ?>