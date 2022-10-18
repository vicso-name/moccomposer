<style>
    <?php

        $background_top_color = get_field('background_top_color');
        $background_bottom_color = get_field('background_bottom_color');

    ?>
    <?php if (get_field(background_image_instead_of_gradient)) {?>
    .case-study-general-info {
        background-image: url('<?php the_field(background_image) ?>');
        background-size: cover;
    }

    <?php }
    else { ?>
    .case-study-general-info {
        background: <?php echo $background_top_color ?>;
        background: -moz-linear-gradient(top, <?php echo $background_top_color; ?> 0%, <?php echo $background_bottom_color; ?> 100%);
        background: -webkit-linear-gradient(top, <?php echo $background_top_color; ?> 0%, <?php echo $background_bottom_color; ?> 100%);
        background: -o-linear-gradient(top, <?php echo $background_top_color; ?> 0%, <?php echo $background_bottom_color; ?> 100%);
        background: -ms-linear-gradient(top, <?php echo $background_top_color; ?> 0%, <?php echo $background_bottom_color; ?> 100%);
        background: linear-gradient(to bottom, <?php echo $background_top_color; ?> 0%, <?php echo $background_bottom_color; ?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $background_top_color; ?>', endColorstr='<?php echo $background_bottom_color; ?>', GradientType=0);
    }

    <?php } ?>
</style>
<section class="clearfix bg-theme case-study-general-info">

    <div class="case_study--container">


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
        <div class="one-image-header">

        <?php $one_image = get_field('header_image', $post->ID);
        $one_image_webp = get_field('header_image_webp', $post->ID); ?>

        <picture>
            <source srcset="<?php echo $one_image_webp; ?>" type="image/webp">
            <img class="header-image shape" width="765" height="479" src="<?php echo $one_image; ?>"
                 alt="<?php echo $post->post_title; ?>">
        </picture>
    </div>

    </div>

</section>