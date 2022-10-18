<?php
/*
 * Template Name: Design
 * */
?>
<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed' ); ?>
<?php get_template_part( 'template-parts/services/design', 'svg' ); ?>
<script>
    if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
        window.mobileBrowser = true;
        document.body.classList.add('design-mobile');
    }
    else window.mobileBrowser = false;
</script>
<main id="main" class="page-design page-no-lazy">

    <section class="heading parallax-heading js-full-height " id="parallax-wrapper">
        <div class="background">
            <div class="sprite sprite-element_4 bg-item"></div>
            <div class="sprite sprite-element_18 bg-item"></div>
            <div class="sprite sprite-element_3 bg-item"></div>
            <div class="sprite sprite-element_6 bg-item"></div>
            <div class="sprite sprite-element_22 bg-item"></div>
            <div class="sprite sprite-element_12 bg-item"></div>

        </div>
        <div class="midground">
            <div class="sprite sprite-element_7 bg-item"></div>
            <div class="sprite sprite-element_9 bg-item"></div>
            <div class="sprite sprite-element_10 bg-item"></div>
            <div class="sprite sprite-element_13 bg-item"></div>
            <div class="sprite sprite-element_14 bg-item"></div>
            <div class="sprite sprite-element_15 bg-item"></div>
            <div class="sprite sprite-element_16 bg-item"></div>
            <div class="sprite sprite-element_20 bg-item"></div>
            <div class="sprite sprite-element_21 bg-item"></div>
            <div class="sprite sprite-element_23 bg-item"></div>
        </div>
        <div class="foreground">
            <div class="sprite sprite-element_2 bg-item"></div>
            <div class="sprite sprite-element_19 bg-item"></div>
            <div class="sprite sprite-element_1 bg-item"></div>
            <div class="sprite sprite-element_11 bg-item"></div>
            <div class="sprite sprite-element_17 bg-item"></div>
            <div class="sprite sprite-element_5 bg-item"></div>
            <div class="sprite sprite-element_8 bg-item"></div>

        </div>
        <div class="top-layer">
            <h1 class="design-top-header">Design</h1>
            <strong class="design-slogan design-desktop-only">Intensify Your Project with
            <span class="blue-color">Top-notch UX Design</span></strong>
            <strong class="design-slogan design-mobile-only">We make your<span class="blue-color"> product<br /> great</span></strong>
            <a href="#animation1" class="scroll-bottom" data-custom-scroll="animation1" id="scroll-down">
                <svg class="scroll-arrow" aria-label="Scroll To Next Screen">
                    <use xlink:href="#scroll-arrow"></use>
                </svg>
            </a>
        </div>
    </section>
    <span id="mob-wrapper1"></span>
    <section class="animated-panel-wrapper animation-slide" id="wrapper1">

        <div class="animated-part animation1 panel animated-part__wrapper" id="animation1">
            <div class="img-part img-wrapper-part transparent-panel" id="img-part1">
                <picture>
                    <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/web_full.webp" type="image/webp">
                    <img class="lozad img-fg full-color" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/web_full.png" alt="app design" />
                    <noscript aria-hidden="true"><img class="img-fg full-color" src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/web_full.png" alt="app design" /></noscript>
                </picture>
                <div class="img-part sliding-part">
                    <picture>
                        <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/web.webp" type="image/webp">
                        <img class="lozad img-fg" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/web.png" alt="how to design an app" />
                        <noscript aria-hidden="true"><img class="img-fg" src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/web.png" alt="how to design an app" /></noscript>
                    </picture>
                </div>
            </div>
            <div class="text-wrapper-part">
                <div id="text-part1">
                    <div class="text-part hide-for-mobile-design">
                        <p class="animated-part-slogan">
                            <span class="text-to-hide">Engaging </span>
                            <span class="black-accent">Web UI</span>
                            <span class="text-to-hide"> starts from brilliant idea</span>
                        </p>
                        <a href="#text-part1_2" class="scroll-bottom" data-custom-scroll="text-part1_2">
                            <svg class="scroll-arrow" aria-label="Scroll To Next Screen">
                                <use xlink:href="#scroll-arrow"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="text-part" id="text-part1_2" >
                        <p class="animated-part-slogan small-font">
                            <span class="black-accent">Web UI</span>
                        </p>
                        <p class="animated-part-description hide-for-mobile-design">Make use of our all-inclusive web design services to build a strong online presence. Our tailored approach to producing custom and unique designs will make the difference.</p>
                        <p class="animated-part-description mobile-description">Make use of our all-inclusive web design and development services to build a strong online presence.</p>
                        <a href="<?php echo get_field('web_behance_link'); ?>" target="_blank" class="explore-btn">Explore</a>
                        <a href="#animation2" class="scroll-bottom" data-custom-scroll="animation2" >
                            <svg class="scroll-arrow" aria-label="Scroll To Next Screen">
                                <use xlink:href="#scroll-arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <span id="mob-wrapper2"></span>
    <section class="animated-panel-wrapper animation-slide" id="wrapper2">

        <div class="animated-part animation2 panel animated-part__wrapper flex-reverse" id="animation2">

            <div class="img-part img-wrapper-part" id="img-part2">
                <picture>
                    <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/mobile_full.webp" type="image/webp">
                    <img class="lozad img-fg" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/mobile_full.png" alt="mobile app design company" />
                    <noscript aria-hidden="true"><img class="img-fg" src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/mobile_full.png" alt="mobile app design company" /></noscript>
                </picture>
                <div class="img-part sliding-part">
                    <picture>
                        <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/mobile.webp" type="image/webp">
                        <img class="lozad img-fg" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/mobile.png" alt="design mobile applications" />
                        <noscript aria-hidden="true"><img class="img-fg" src="<?php echo get_stylesheet_directory_uri() ?>/images/services/design/mobile.png" alt="design mobile applications" /></noscript>
                    </picture>
                </div>
            </div>
            <div class="text-wrapper-part">
                <div id="text-part2">
                    <div class="text-part hide-for-mobile-design">
                        <p class="animated-part-slogan">
                            <span class="text-to-hide">Refining every bit of </span>
                            <span class="black-accent">Mobile UI</span>
                            <span class="text-to-hide"> right from the beginning</span>
                        </p>
                        <a href="#text-part2_2" class="scroll-bottom"  data-custom-scroll="text-part2_2">
                            <svg class="scroll-arrow" aria-label="Scroll To Next Screen">
                                <use xlink:href="#scroll-arrow"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="text-part" id="text-part2_2">
                        <p class="animated-part-slogan small-font">
                            <span class="black-accent">Mobile UI</span>
                        </p>
                        <p class="animated-part-description hide-for-mobile-design">We develop better projects by exploring user's behavior as well as we improve interactions and usability, from interaction design to usability research.</p>
                        <p class="animated-part-description mobile-description">We develop better projects by exploring user's behavior as well as we improve interactions and usability.</p>
                        <a href="<?php echo get_field('mobile_behance_link'); ?>" target="_blank" class="explore-btn">Explore</a>
                        <a href="#project-slider" class="scroll-bottom" data-custom-scroll="project-slider">
                            <svg class="scroll-arrow" aria-label="Scroll To Next Screen">
                                <use xlink:href="#scroll-arrow"></use>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/section', 'projects-slider' ); ?>

    <section class="behance-link-section no-animated" id="animation2end">
        <?php $portfolio_social_links = get_field('portfolio_social_links'); ?>
        <?php if ( !empty( $portfolio_social_links ) ) { ?>
        <h2 class="section-heading">More on Behance and Dribbble</h2>
        <ul class="social-design-links">
        <?php
        foreach ( $portfolio_social_links as $portfolio_social_link ) { ?>

            <li>
                <!--noindex-->
                    <a class="design-social-link <?php echo $portfolio_social_link['svg_id']; ?>" href="<?php echo $portfolio_social_link['link']; ?>" target="_blank" rel="nofollow">
                        <svg class="design-social-icon" aria-label="<?php echo $portfolio_social_link['svg_id']; ?>">
                            <use xlink:href="#social-<?php echo $portfolio_social_link['svg_id']; ?>"></use>
                        </svg>
                    </a>
                <!--/noindex-->
            </li>
        <?php } }?>
        </ul>
    </section>

    <section class="contact-form-wrapper no-animated" id="estimate-project-form">
        <h2 class="section-heading js-hide-after-submit">Let’s Create Remarkable Products Together!</h2>
        <div class="gform_wrapper" id="homepage-form">
            <?php echo do_shortcode('[contact-form-7 id="5419" title="Contacts_Design"]'); ?>
        </div>
    </section>

</main>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/scrollmagic/TweenMax.min.js"></script>

<script src="<?php echo get_stylesheet_directory_uri() ?>/js/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/scrollmagic/animation.gsap.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>-->


<?php get_footer(); ?>
