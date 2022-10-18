<section class="clearfix bg-theme case-study-general-info">
    <div class="custom-case-study-header">

        <div class="info-block align-l custom-title-column">
            <?php if ( get_field('website_link') ) { ?>
                <h1 class="name-caption custom-wide-wrapper align-l">
                    <!--noindex-->
                    <a class="name-caption-link" href="<?php the_field('website_link'); ?>" rel="nofollow" target="_blank">
                        <?php the_field('name'); ?>
                    </a>
                    <!--/noindex-->

                </h1>
            <?php } else { ?>

                <h1 class="name-caption custom-wide-wrapper align-l"><?php the_field('name'); ?></h1>
            <?php }; ?>
            <span class="name-link text-theme custom-wide-wrapper"><?php the_field('link'); ?></span>
            <div class="project-description case-section-text custom-wide-wrapper align-l">
                <?php the_field('header_text'); ?>
            </div>
        </div>
        <div class="image-block custom-title-column">
            <picture>
                <source media="(min-width: 376px)" type="image/webp"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png-desktop.webp" />
                <source media="(max-width: 375px)" type="image/webp"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png-mobile.webp" />
                <source media="(min-width: 376px)"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png.png" />
                <source media="(max-width: 375px)"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png-mobile.png" />
                <img class="header-image shape"
                     src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png.png"
                     height="714" width="635" alt="Aveda Chatbot" />
            </picture>
        </div>
    </div>

</section>
