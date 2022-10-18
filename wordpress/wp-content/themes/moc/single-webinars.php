<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/webinars/webinars', 'svg'); ?>
<?php
global $post;

$today = date('j-m-Y H:i:s', strtotime('-1 hour'));
$date = get_field('webinar_date', false, false);
$date = new DateTime($date);
$newDate = $date->format('F d, Y');
$newTime = $date->format('g:i a');
$newFullDate = $date->format('j-m-Y H:i:s');

$stage_time = get_field('stage_time');
$duration = get_field('webinar_duration');
$form = get_field('webinar_form');

?>

<main id="main" class="webinar-page <?php echo (strtotime($today) < strtotime($newFullDate))?'':'past-webinar'; ?>">

    <div class="hero-webinar">

        <div class="webinar-bg-wrapper">

            <?php
            $desktop_image = get_field('webinar_main_image');
            $desktop_image_url = $desktop_image['url'];
            $desktop_image_webp = get_field('webinar_main_image_webp');
            $desktop_image_webp_url = $desktop_image_webp['url'];

            $tablet_image = get_field('webinar_main_image_tablet');
            $tablet_image_url = $tablet_image['url'];
            $tablet_image_webp = get_field('webinar_main_image_tablet_webp');
            $tablet_image_webp_url = $tablet_image_webp['url'];

            $mobile_image = get_field('webinar_main_image_mobile');
            $mobile_image_url = $mobile_image['url'];
            $mobile_image_webp = get_field('webinar_main_image_mobile_webp');
            $mobile_image_webp_url = $mobile_image_webp['url'];
            ?>

            <picture>
                <source media="(min-width: 1025px)" srcset="<?php echo $desktop_image_webp_url; ?>" type="image/webp">
                <source media="(min-width: 1025px)" srcset="<?php echo $desktop_image_url; ?>" type="image/png">

                <source media="(max-width: 500px)" srcset="<?php echo $mobile_image_webp_url; ?>"  type="image/webp">
                <?php if ($mobile_image) { ?>
                    <source media="(max-width: 500px)" srcset="<?php echo $mobile_image_url; ?>"  type="image/jpeg">
                <?php } ?>

                <source media="(max-width: 1024px)" srcset="<?php echo $tablet_image_webp_url; ?>" type="image/webp">
                <?php if ($tablet_image) { ?>
                    <source media="(max-width: 1024px)" srcset="<?php echo $tablet_image_url; ?>" type="image/jpeg">
                <?php } ?>

                <img class="webinar-bg-image" src="<?php echo $desktop_image_url; ?>" alt="">
            </picture>
        </div>

        <div class="hero-webinar__intro">
            <div class="page-container">
                <div class="hero-webinar__text-part">
                    <span class="hero-webinar__label">Webinar</span>
                    <div class="hero-webinar__info">
                        <span class="hero-webinar__info-item"><span class="date-value"
                                                                    id="date-value"><?php echo $newDate; ?></span></span>
                        <span class="hero-webinar__item-separator"> - </span>
                        <span class="hero-webinar__info-item"><span
                                    id="time-value"><?php echo $stage_time ? $stage_time : $newTime; ?></span> <span>(CST)</span>
                            <span style="display: none;">(GMT <span class="gmt-value">0</span>)</span></span>
                    </div>

                    <h1 class="hero-webinar__title webinar-title"><?php the_title(); ?></h1>


                    <?php if (strtotime($today) < strtotime($newFullDate)) : ?>
                        <div class="countdown-wrapper">
                            <div class="countdown" id="countdown">
                                <ul class="count-list">
                                    <li class="count-item">
                                        <span class="count-item__title">days</span>
                                        <span class="count-item__value" id="days">00</span>
                                    </li>
                                    <li class="count-item">
                                        <span class="count-item__title">hrs</span>
                                        <span class="count-item__value" id="hours">00</span>
                                    </li>
                                    <li class="count-item">
                                        <span class="count-item__title">min</span>
                                        <span class="count-item__value" id="minutes">00</span>
                                    </li>
                                    <li class="count-item">
                                        <span class="count-item__title">sec</span>
                                        <span class="count-item__value" id="seconds">00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($duration): ?>
                        <span class="hero-webinar__duration">
                            <svg class='webinar-duration-icon'>
                                <use xlink:href='#webinar-duration-icon'></use>
                            </svg>
                            <?php echo $duration; ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>

    <div class="webinars-block page-container">

        <?php

        if (strtotime($today) < strtotime($newFullDate)) { ?>

            <div class="webinar-form registration-form" id="to-form">
                <div class="contact-form-wrapper">
                    <div class="gform_wrapper" id="contact-form">
                        <?php echo do_shortcode($form); ?>
                    </div>
                </div>
            </div>

        <?php } else { ?>


            <?php if (get_field('webinar_video_url')) { ?>

                <div class="webinar-video-popup">

                    <div class="video-wrap">

                        <button class="video-close-button js-video-close-button">

                            <svg class="close-icon" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g id="close-icon-group">
                                    <rect id="Rectangle" x="17.6775" y="5.65625" width="1" height="17"
                                          transform="rotate(45 17.6775 5.65625)" fill="white"/>
                                    <rect id="Rectangle Copy" x="18.3848" y="17.6777" width="1" height="17"
                                          transform="rotate(135 18.3848 17.6777)" fill="white"/>
                                </g>
                            </svg>

                        </button>

                        <div class="video" data-src="<?php the_field('webinar_video_url'); ?>">

                            <iframe class="video__embed" id="video" width="560" height="315" src="" frameborder="0"
                                    style="background: #000000;"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                    allowfullscreen></iframe>

                        </div>
                    </div>
                </div>

                <div class="webinar-form watch-video-form" id="to-form">
                    <div class="contact-form-wrapper">
                        <div class="gform_wrapper" id="contact-form">
                            <?php echo do_shortcode($form); ?>
                        </div>
                    </div>

                    <div class="watch-video-form__continue-block js-continue-watch">
                        <p class="watch-video-form__continue-text">You can continue watching the video without registration</p>

                        <div class="watch-video-form__icon">
                        <svg class='stream-video-icon'>
                            <use xlink:href='#youtube-stream-video'></use>
                        </svg>
                        </div>
                        <button class="watch-video-button js-show-video">Watch video</button>
                    </div>
                </div>

            <?php } else { ?>

<!--                <div class="webinar-form coming-soon-video" id="to-form">-->
<!--                    <p class="coming-soon-video__text">Webinar video coming soon</p>-->
<!--                    <svg class='coming-soon-video-icon'>-->
<!--                        <use xlink:href='#coming-soon-video'></use>-->
<!--                    </svg>-->
<!--                </div>-->

                <div class="webinar-form webinar-subscribe-block" id="subscribe-form-webinars">
                    <p class="webinar-subscribe-block__text">The webinar has ended</p>
                    <p class="webinar-subscribe-block__text">
                        Subscribe to the MOC’s updates, so you won't miss our next webinar or industry news.
                    </p>

                    <a class="webinar-subscribe-block__button" href="#" data-open-menu="subscribe">Subscribe</a></p>
                </div>

            <?php } ?>
        <?php } ?>

        <div class="webinars-content">
            <div class="about-webinar">
                <h2><?php the_field('about_webinar_title'); ?></h2>
                <div class="content-block">
                    <?php the_field('about_webinar_text'); ?>
                </div>
            </div>

            <div class="webinar-infographics">

                <?php
                if (have_rows('webinar_infographics_list')):?>
                    <ul class="webinar-infographics__list">
                        <?php while (have_rows('webinar_infographics_list')) : the_row();

                            $image = get_sub_field('infographics_webinars_picture');
                            $image_webp = get_sub_field('infographics_webinars_picture_webp');
                            $numerical_info = get_sub_field('numerical_webinar_info');
                            $description = get_sub_field('infographics_webinars_description');
                            $source = get_sub_field('infographics_webinars_source'); ?>
                            <li class="webinar-infographics__item">
                                <div class="webinar-infographics__image-wrap">
                                    <picture>
                                        <source srcset="<?php echo $image_webp; ?>" type="image/webp">
                                        <img src="<?php echo $image; ?>" alt="">
                                    </picture>
                                </div>
                                <div class="webinar-infographics__info-wrap">
                                    <span class="webinar-infographics__numeric-info"><?php echo $numerical_info; ?></span>
                                    <div class="webinar-infographics__description"><?php echo $description; ?></div>
                                    <?php if ($source) : ?>
                                        <span class="webinar-infographics__source">(<?php echo $source; ?>)</span>
                                    <?php endif; ?>
                                </div>
                            </li>

                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            </div>

            <div class="learn-in-webinar">
                <h2><?php the_field('webinar_learn_title'); ?></h2>
                <div class="content-block">
                    <?php the_field('webinar_learn_text'); ?>
                </div>
            </div>


            <?php if (get_field('action_block_text')): ?>
                <div class="action-block">
                    <div class="action-block__image-wrap">
                        <img src="<?php the_field('action_block_icon'); ?>" alt="">
                    </div>
                    <div class="action-block__text-wrap">
                        <div class="action-block__text"><?php the_field('action_block_text'); ?></div>

                        <?php
                        $link = get_field('action_block_link');
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="action-block__link webinar-action-link" href="#to-form"
                               target="<?php echo esc_attr($link_target); ?>">

                                <span> <?php echo esc_html($link_title); ?></span>
                                <svg class='arrow-left'>
                                    <use xlink:href='#arrow-left-red'></use>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="webinar-speakers">

                <h2><?php the_field('webinar_speakers_block_title'); ?></h2>

                <?php

                if (have_rows('webinar_speakers')):?>
                    <ul class="webinar-speakers__list">
                        <?php while (have_rows('webinar_speakers')) : the_row();

                            $image = get_sub_field('photo');
                            $image_webp = get_sub_field('photo_webp');
                            $name = get_sub_field('name');
                            $position = get_sub_field('position');
                            $company = get_sub_field('company');
                            $quote = get_sub_field('quote');
                            $linkedin_url = get_sub_field('linkedin_url');
                            ?>
                            <li class="webinar-speakers__item">
                                <div class="webinar-speakers__main-info">
                                    <div class="webinar-speakers__image-wrap">
                                        <?php if ($linkedin_url) : ?>
                                            <a class="webinar-speakers__linkedin-link"
                                               href="<?php echo $linkedin_url; ?>" target="_blank">
                                                <svg class='linkedin-icon'>
                                                    <use xlink:href='#linkedin-icon'></use>
                                                </svg>
                                            </a>
                                        <?php endif ?>

                                        <picture>
                                            <source srcset="<?php echo $image_webp; ?>" type="image/webp">
                                            <img src="<?php echo $image; ?>" alt="">
                                        </picture>
                                    </div>
                                    <h3 class="webinar-speakers__name"><?php echo $name; ?></h3>
                                    <h4 class="webinar-speakers__position">
                                        <?php echo $position; ?>
                                        <span class="webinar-speakers__company">(<?php echo $company; ?>)</span>
                                    </h4>
                                </div>

                                <?php if ($quote) : ?>
                                    <div class="webinar-speakers__quote-wrap">
                                        <div class="webinar-speakers__quote">
                                            <?php echo $quote; ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </li>

                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            </div>

        </div>

    </div>


    <?php
    global $post;
    $posts = get_field('related_webinars', false, false); ?>

    <?php if ($posts) : ?>

    <?php $loop = new WP_Query(array(
        'post_type' => 'webinars',
        'posts_per_page' => 3,
        'post__in' => $posts,
        'post_status' => 'publish',
        'orderby' => 'post__in',
        'order' => 'ASC'
    )); ?>

    <?php if ($loop->have_posts()) { ?>
        <div class="related-webinars page-container">

            <h2 class="related-webinars__title">Also you may be interested to watch</h2>

            <div class="related-webinars__list">
                <?php while ($loop->have_posts()) : $loop->the_post();
                    $date = get_field('webinar_date', false, false);
                    $date = new DateTime($date);
                    $newDate = $date->format('j M Y');
                    $image = get_field('webinar_main_image');
                    $size = 'webinars-preview-img';
                    $thumbnail = $image['sizes'][$size]; ?>


                    <div class="related-webinars__item">
                        <a href="<?php echo get_permalink(); ?>" class="webinar-link"></a>

                        <div class="related-webinars__thumbnail"
                             style="background-image: linear-gradient(rgba(0,0,0, .3), rgba(0,0,0, .3)), url('<?php echo $thumbnail; ?>')">

                        </div>

                        <div class="webinar-post-meta">
                            <span class="webinar-post-meta__info-item"><?php echo $newDate; ?></span>
                            <span class="webinar-post-meta__info-item">
                                <?php if (strtotime($today) > strtotime($newDate)) { ?>
                                    Upcoming
                                <?php } else { ?>
                                    On Demand
                                <?php } ?>
                            </span>
                            <?php
                            $terms = get_the_terms($post->ID, 'industries');
                            echo '<ul class="category-list">';

                            foreach ($terms as $term) {
                                echo '<li class="category-item upcoming-webinar__info-item">' . $term->name . '</li>';
                            }

                            echo "</ul>";
                            ?>
                        </div>

                        <h3 class="post-title"><?php the_title(); ?></h3>

                        <a href="<?php echo get_permalink(); ?>" class="post-link">
                            <span>Watch the Webinar</span>
                            <svg class='arrow-left'>
                                <use xlink:href='#arrow-left-red'></use>
                            </svg>
                        </a>

                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    <?php }
    wp_reset_query(); ?>
    <?php endif; ?>


    <div class="subscribe-block" id="subscribe-block" data-menu="subscribe">
        <div class="scroll-holder subscribe-content">

            <a href="#" aria-label="Close Menu" class="btn-close" data-close-menu="main"><span
                        class="screen-reader-text">Close Menu</span>
                <span class='close-btn'>
                     <span class="close-btn-line first"></span>
                     <span class="close-btn-line second"></span>
                </span>
            </a>

            <h2 class="subscribe-title"><?php _e('Stay updated on our news', 'moc'); ?></h2>

            <div class="contact-form-wrapper ">
                <div class="gform_wrapper">
                    <div id="mc_embed_signup_scroll" class="subscribe-form">

                        <?php echo do_shortcode('[contact-form-7 id="32696" title="Blog subscribtion"]'); ?>

                        <div class="icon icon--order-success svg show-on-success" style="display:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" fill="none">
                                <circle cx="60" cy="60" r="58" stroke="#F1563C" stroke-width="4" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                <path d="M30 62.5L48 80.5L90 38.5" stroke="#F1563C" stroke-width="5" style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"><path>
                            </svg>
                        </div>
                        <div class="response success-response" style="display: none;">
                            Thank you for subscribing!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
