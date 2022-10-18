<section class="case-study-general-info">

    <div class="cai-workshop-header project-container">
        <div class="cai-workshop-image-block hide-on-desktop">
            <img class="header-image shape"
                 src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/workshop-hero-image.svg"
                 alt="CAI Workshop"/>
        </div>

        <h1 class="name-caption"><?php the_title(); ?></h1>

        <div class="cai-workshop-header-inner">
            <div class="cai-workshop-info-block">

                <div class="project-description">
                    <?php the_field('header_text'); ?>
                </div>
            </div>
            <div class="cai-workshop-image-block hide-on-mobile">
                <img class="header-image shape"
                     src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/workshop-hero-image.svg"
                     alt="CAI Workshop"/>
            </div>
        </div>
    </div>
</section>
