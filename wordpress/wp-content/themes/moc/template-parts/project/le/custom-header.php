<section class="clearfix bg-theme case-study-general-info">
    <div class="custom-case-study-header le-header">

        <div class="le-block align-l ">
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
        <div class="le-block">
            <picture>
                <source type="image/webp"
                        srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/boat-2.webp">
                <source srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/boat-2.png">
                <img class="le-header-image"
                     src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/boat-2.png"
                     height="697" width="610" alt="Luxury Escapes">
            </picture>
        </div>
    </div>

</section>
