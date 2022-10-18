<?php
/**
 * Template Name: Conversation Design Page
 **/
?>
<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
    <main id="main" class="page-conversation-design page-no-lazy template">
        <section class="cd-hero-section moc-section">
            <div class="cd-hero-section__inner moc-inner">
                <div class="cd-hero-section__text-part">
                    <h1 class="cd-hero-section__title"><?php the_field('cd_hero_title'); ?></h1>
                    <p class="cd-hero-section__description"><?php the_field('cd_hero_description'); ?></p>
                    <a id="get-in-toucht" href="#conversation-design-form" class="lets-chat" rel="nofollow noreferrer"
                       data-get-in-touch>
                        <span class="cta-content">Let’s Chat</span>&nbsp;&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                            <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                        </svg>
                    </a>
                </div>
                <div class="cd-hero-section__image-part">
                    <img class="cd-hero-section__image" src="<?php the_field('cd_hero_image'); ?>" alt="">
                </div>
            </div>
        </section>

        <section class="cd-how-we-do moc-section">
            <div class="moc-inner">
                <h2 class="cd-how-we-do__title section-title"><?php the_field('cd_how_section_title'); ?></h2>
                <div class="cd-how-we-do__image-wrap">
                    <img class="cd-how-we-do__image" src="<?php the_field('cd_how_section_image'); ?>">
                </div>
                <p class="cd-how-we-do__description"><?php the_field('cd_how_section_description'); ?></p>
            </div>
        </section>

        <section class="cd_why_design moc-section">
            <div class="cd_why_design__inner moc-inner">
                <h2 class="cd_why_design__title section-title"><?php the_field('cd_why_section_title'); ?></h2>
                <div class="cd_why_design__info">
                    <?php if (have_rows('cd_why_section_info')): ?>
                        <?php while (have_rows('cd_why_section_info')) : the_row(); ?>
                            <div class="cd_why_design__item">
                                <h3 class="cd_why_design__item-title mobile-block"><?php the_sub_field('item_title'); ?></h3>
                                <div class="cd_why_design__image-part">
                                    <img src="<?php the_sub_field('item_image'); ?>" alt=""
                                         class="cd_why_design__item-image">
                                </div>
                                <div class="cd_why_design__text-part">
                                    <h3 class="cd_why_design__item-title desktop-block"><?php the_sub_field('item_title'); ?></h3>
                                    <div class="cd_why_design__item-text">
                                        <?php the_sub_field('item_text'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="cd-process moc-section">
            <div class="moc-inner">
                <h2 class="cd-process__title section-title mobile-block"><span class="section-subtitle">Our Proven</span>Conversation
                    Design Process</h2>

                <ul class="cd-process__list mobile-block">
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            01
                        </span>
                        <span class="cd-process__item-name">
                            Discovery
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            02
                        </span>
                        <span class="cd-process__item-name">
                            Data Analysis
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            03
                        </span>
                        <span class="cd-process__item-name">
                            Use Case Prioritization
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            04
                        </span>
                        <span class="cd-process__item-name">
                            User Persona Identification
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            05
                        </span>
                        <span class="cd-process__item-name">
                            User Journey Mapping
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            06
                        </span>
                        <span class="cd-process__item-name">
                            Bot persona development
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            07
                        </span>
                        <span class="cd-process__item-name">
                            Flow chart creation dialog development
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            08
                        </span>
                        <span class="cd-process__item-name">
                            NLP Matrix
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            09
                        </span>
                        <span class="cd-process__item-name">
                            User Testing
                        </span>
                    </li>
                    <li class="cd-process__item">
                        <span class="cd-process__item-number">
                            10
                        </span>
                        <span class="cd-process__item-name">
                            Bot Tuning
                        </span>
                    </li>
                </ul>

                <div class="cd-process__main-image-wrap desktop-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/conversation-design/Conversation-Design-Process.svg">
                </div>
            </div>
        </section>

        <!-- Conversation Design Offerings Section START-->

        <section id="сonversation_design_offerings"   class="cd_offerings moc-section extra_сonversational_item">
            <div class="cd_offerings__inner">

                <div class="moc-inner">
                    <h2 class="cd_offerings__title section-title"><?php the_field('cd_offerings_title'); ?></h2>
                </div>

                <?php if (have_rows('conversation_design_first_row')): ?>
                    <?php while (have_rows('conversation_design_first_row')) : the_row(); ?>
                        <div id="сonversational_ai_consulting" class="extra_сonversational_item cd_offerings__item-row cd-consulting-section moc-inner">

                            <div class="cd_offerings__item-main-text">
                                <h3 class="cd_offerings__item-title"><?php the_sub_field('section_title'); ?></h3>
                                <div class="cd_offerings__item-text">
                                    <?php the_sub_field('section_text'); ?>
                                </div>
                                <div class="cd_offerings__image-wrap">
                                    <img src="<?php the_sub_field('section_image'); ?>" alt=""
                                         class="cd_offerings__item-image">
                                </div>
                            </div>

                            <div class="cd_offerings__offers-part">
                                <h3 class="cd_offerings__offers-title"><?php the_sub_field('offers_title'); ?></h3>

                                <ul class="cd_offerings__offers-list">
                                    <?php if (have_rows('offers_list')): ?>
                                        <?php while (have_rows('offers_list')) : the_row(); ?>
                                            <li class="cd_offerings__offers-item"><?php the_sub_field('оffers_item'); ?></li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('conversation_design_second_row')): ?>
                <?php while (have_rows('conversation_design_second_row')) :
                the_row(); ?>

                <div  id="сonversation_design_services" class="extra_сonversational_item cd-services-section">

                    <div class="cd_offerings__item-row moc-inner">
                        <div class="cd_offerings__item-main-text">
                            <h3 class="cd_offerings__item-title"><?php the_sub_field('section_title'); ?></h3>
                            <div class="cd_offerings__item-text">
                                <?php the_sub_field('section_text'); ?>
                            </div>
                            <div class="cd_offerings__image-wrap">
                                <img src="<?php the_sub_field('section_image'); ?>" alt=""
                                     class="cd_offerings__item-image">
                            </div>
                        </div>

                        <div class="cd_offerings__offers-part">
                            <h3 class="cd_offerings__offers-title"><?php the_sub_field('offers_title'); ?></h3>

                            <ul class="cd_offerings__offers-list">
                                <?php if (have_rows('offers_list')): ?>
                                    <?php while (have_rows('offers_list')) : the_row(); ?>
                                        <li class="cd_offerings__offers-item"><?php the_sub_field('оffers_item'); ?></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <?php if (have_rows('conversation_design_third_row')): ?>
                <?php while (have_rows('conversation_design_third_row')) :
                the_row(); ?>

                        <div id="сonversation_design_training" class="extra_сonversational_item cd_offerings__item-row cd-consulting-section moc-inner">

                            <div class="cd_offerings__item-main-text">
                                <h3 class="cd_offerings__item-title"><?php the_sub_field('section_title'); ?></h3>
                                <div class="cd_offerings__item-text">
                                    <?php the_sub_field('section_text'); ?>
                                </div>
                                <div class="cd_offerings__image-wrap">
                                    <img src="<?php the_sub_field('section_image'); ?>" alt=""
                                         class="cd_offerings__item-image">
                                </div>
                            </div>

                            <div class="cd_offerings__offers-part">
                                <h3 class="cd_offerings__offers-title"><?php the_sub_field('offers_title'); ?></h3>

                                <ul class="cd_offerings__offers-list">
                                    <?php if (have_rows('offers_list')): ?>
                                        <?php while (have_rows('offers_list')) : the_row(); ?>
                                            <li class="cd_offerings__offers-item"><?php the_sub_field('оffers_item'); ?></li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
        </section>

        <!-- Conversation Design Offerings Section END-->

        <section class="cd-experience moc-section">
            <div class="moc-inner">
                <h2 class="cd-experience__title section-title"><?php the_field('cd_experience_title'); ?></h2>
                <p class="cd-experience__description"><?php the_field('cd_experience_text'); ?></p>
            </div>

            <div class="cd-experience__image-wrap">
                <picture class="cd-experience__image">
                    <source srcset="<?php the_field('cd_experience_desktop_image'); ?>" media="(min-width: 600px)">
                    <img src="<?php the_field('cd_experience_mobile_image'); ?>" alt="">
                </picture>
            </div>
        </section>

        <section class="cd-contact moc-section moc-contact-section contact-form-wrapper wide-form-wrapper"
                 id="conversation-design-form">
            <div class="moc-inner">
                <h2 class="cd-contact__title section-title js-hide-after-submit"><?php the_field('cd_contact_section_title'); ?></h2>
                <p class="cd-contact__description js-hide-after-submit">
                    <?php the_field('cd_contact_description'); ?>
                </p>

                <div class="gform_wrapper" id="cd-form">
                    <?php
                    $contact_form = get_field('cd_contact_form');
                    echo do_shortcode($contact_form); ?>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/zoho-questions-popup'); ?>
    </main>

<?php get_footer(); ?>