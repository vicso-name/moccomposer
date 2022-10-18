<section class="clearfix bg-theme general-info">

    <div class="info-block align-c">
        <?php if (get_field('website_link')) { ?>
            <!--noindex-->
            <a class="logo-block" href="<?php the_field('website_link'); ?>" rel="nofollow" target="_blank">
                <img src="<?php the_field('logo'); ?>" alt="<?php echo $post->post_title; ?>" height="78" width="78">
            </a>
            <!--/noindex-->
            <h1 class="name-caption">
                <!--noindex-->
                <a class="name-caption-link" href="<?php the_field('website_link'); ?>" rel="nofollow" target="_blank">
                    <?php the_field('name'); ?>
                </a>
                <!--/noindex-->

            </h1>
        <?php } else { ?>
            <span class="logo-block">
                <img src="<?php the_field('logo'); ?>" alt="<?php echo $post->post_title; ?>" height="78" width="78">
            </span>
            <h1 class="name-caption"><?php the_field('name'); ?></h1>
        <?php } ?>
        <div class="name-link text-theme"><?php the_field('link'); ?></div>
    </div>
    <?php
    if ((get_field('header_image'))) { ?>
        <div class="heading-block">
            <?php $one_image = get_field('header_image', $post->ID);
            $one_image_webp = get_field('header_image_webp', $post->ID); ?>

            <picture>
                <?php if ($one_image_webp) : ?>
                    <source srcset="<?php echo $one_image_webp; ?>" type="image/webp">
                <?php endif; ?>
                <img class="heading-image" width="765" height="479" src="<?php echo $one_image; ?>"
                     alt="<?php echo $post->post_title; ?>">
            </picture>
        </div>
    <?php }; ?>
</section>