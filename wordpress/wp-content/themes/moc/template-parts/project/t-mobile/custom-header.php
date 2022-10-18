<section class="clearfix bg-theme case-study-general-info t-mobile">
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
                <source media="(max-width: 375px)"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png@2x-mobile.jpg">
                <source media="(max-width: 767px)"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png.jpg">
                <img class="header-image shape" width="765" height="479"
                     src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/hero-png@2x.jpg" alt="<?php echo $post->post_title; ?>">
            </picture>


        </div>
    </div>

</section>
