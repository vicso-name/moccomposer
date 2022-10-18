<section class="ai-hero-section">

    <div class="ai-hero-inner">
        <div class="ai-hero-text-part hero-comment-content hero-comment-content hero-section-text">
            <h1 class="ai-hero-title"><?php the_field('ai_hero_title'); ?></h1>
            <p class="ai-hero-description"><?php the_field('ai_hero_description'); ?></p>

            <?php
            $link = get_field('ai_hero_button');
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                <a class="lets-chat" rel="nofollow noreferrer" id="get-in-toucht" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>" data-get-in-touch>
                    <span class="cta-content"><?php echo esc_html($link_title); ?></span>
                    </svg>
                </a>
            <?php endif; ?>
        </div>

        <div class="hero-image-wrapper">
            <div class="video-image-wrapper hero-video-image-wrapper">
                <div class="hero-video-wrapper" id="video-frame">
                    <video preload="metadata" autoplay="autoplay" muted="muted" playsinline loop="loop" class="video-in-frame"
                           id="video-in-frame"
                           poster="<?php the_field('video_poster_hero'); ?>">
                        <source id="video-source" src="<?php the_field('video_for_phone_hero'); ?>" type="video/mp4">
                    </video>
                </div>
                <picture>
                    <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/images/hero-screen/iPhone-mob.webp">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/images/hero-screen/iPhone.png 2700w,
                            <?php echo get_template_directory_uri(); ?>/images/hero-screen/iPhone-mob.png 1200w"
                            sizes="100vw" />
                    <img src="<?php echo get_template_directory_uri(); ?>/images/hero-screen/iPhone-mob.png" alt="t-mobile Bot Demo" width="407" height="644">
                </picture>
                <?php if(get_field('video_for_phone_hero')) : ?>
                <button class="hero-video-start playing" id="hero-video-start"><span class="screen-reader-text">Video Control</span></button>
                <?php endif;?>
            </div>
        </div>
    </div>

</section>
