<?php
/*
 * Template Name: Team
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
    <main id="main" class="inner-page page-team">
        <section class="leaders-block align-c">
            <h1><?php the_field('leadership_title'); ?></h1>
            <p class="section-description team-description"><?php the_field('leadership_text'); ?></p>

            <?php $masters = get_field('team');
            if (!empty($masters)) { ?>
                <ul class="grid-list inline-grid leadership-list">

                    <?php foreach ($masters as $master) { ?>

                        <li class="grid-list__item inline-grid__item leadership-list__item">
                            <div class="avatar-holder">
                                <picture>
                                    <source srcset="<?php echo $master['image_webp']; ?>" type="image/webp">
                                    <img class="lozad avatar" src="<?php echo $master['image']; ?>"
                                         data-src="<?php echo $master['image']; ?>"
                                         alt="<?php echo $master['position']; ?>">
                                </picture>
                                <noscript aria-hidden="true"><img class="no-js avatar"
                                                                  src="<?php echo $master['image']; ?>"
                                                                  alt="<?php echo $master['position']; ?>"></noscript>

                                <a href="<?php echo $master['linkedin_link']; ?>" class="linkedin-link" target="_blank"
                                   rel="nofollow">
                                    <svg class="linkedin-icon" aria-label="Linkedin Account" viewBox="0 0 24 24">
                                        <use xlink:href="#social-linkedin"></use>
                                    </svg>
                                </a>
                            </div>
                            <h2>
                                <span><?php echo $master['name']; ?> </span><span><?php echo $master['last_name']; ?></span>
                            </h2>
                            <span class="leader-position"><?php echo $master['position']; ?></span>
                        </li>

                    <?php } ?>
                </ul>
            <?php } ?>
        </section>
        <section class="masters-block align-c">
            <h2 class="section-heading"><?php the_field('masters_title'); ?></h2>
            <p class="section-description team-description"><?php the_field('masters_text'); ?></p>
            <span class="masters-image__holder">
                   <picture>
                        <source srcset="<?php the_field('masters_image_webp'); ?>" type="image/webp">
                        <img class="lozad masters-image desktop-image" src="<?php the_field('masters_image'); ?>"
                             data-src="<?php the_field('masters_image'); ?>" alt="MasterOfCode Masters">
                    </picture>

                    <picture>
                        <source srcset="<?php the_field('mobile_image_webp'); ?>" type="image/webp">
                        <img class="lozad masters-image mobile-image" src="<?php the_field('mobile_image'); ?>"
                             data-src="<?php the_field('mobile_image'); ?>" alt="MasterOfCode Masters">
                    </picture>
                <noscript aria-hidden="true">
                    <img class="masters-image desktop-image" src="<?php the_field('masters_image'); ?>"
                         alt="MasterOfCode Masters">
                    <img class="masters-image mobile-image" src="<?php the_field('mobile_image'); ?>"
                         alt="MasterOfCode Masters">
                </noscript>
            </span>
        </section>
    </main>

<?php get_footer(); ?>