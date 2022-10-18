<div class="main-header js-full-height">
    <?php
    global $priority_service;
    global $whoweare_top;
    global $get_in_touch_text;
//    global $timeout_estimate;
//    global $slider_pause;
    global $contact_form_header;
    $is_query = 0;
    $priority_service = '';
    $header_content = '';
    $header_class = '';
    $header_text_block = '';
    $dont_show_video = '';
    $button_instead_of_arrow = '';
    $flex_content = get_field('rule');
    if(!empty($flex_content)){
        foreach($flex_content as $flex_block){ ?>

            <?php
            $query_hash = strpos(parse_url($_SERVER['REQUEST_URI'])["query"], $flex_block['uri_hash']) ; ?>
            <?php if ( ( $query_hash !== false) && ($is_query===0) ) {
                $header_class = $flex_block['uri_hash'];
                $header_content = $flex_block['header_content'];
                $priority_service = $flex_block['priority_service'];
                $get_in_touch_text = $flex_block['get_in_touch_text'];
                $whoweare_top = $flex_block['whoweare_top'];
                $timeout_estimate = $flex_block['timeout_estimate'];
                $exit_popup = $flex_block['exit_popup'];
                $slider_pause = $flex_block['slider_pause'];
                $header_text_block = $flex_block['header_text_block'];
                $dont_show_video = $flex_block['dont_show_video'];
                $contact_form_header = $flex_block['contact_form_header'];
                $whoweare_animation_off = $flex_block['whoweare_animation_off'];
                $button_instead_of_arrow = $flex_block['button_instead_of_arrow'];
                $is_query = 1;  };
        }
    }; ?>
    <?php ?>
    <span class="hidden" id="dynamic-page-features"
        <?php if ($slider_pause) {?> data-pause="<?php  echo $slider_pause;  ?>" <?php }; ?>
        <?php if ($whoweare_animation_off) { ?> data-counter <?php } ; ?>
        <?php if ($timeout_estimate) {?> data-timeout="<?php  echo $timeout_estimate;  ?>" <?php }; ?>
        <?php if ($exit_popup) {?> data-exit-popup="1" <?php }; ?>

    ></span>

    <?php get_template_part('template-parts/front_page', 'svg'); ?>
    <?php if (! $dont_show_video) { ?>
    <div class="bg-video-wrapper">
        <video muted preload="metadata" autoplay="autoplay"
               loop="loop" class="bgvideo" id="bgvideo"
               poster="<?php echo get_stylesheet_directory_uri() ?>/images/home/header-video-bg.png">
                <source src="https://d2kgfxwlms9nfi.cloudfront.net/video-light-processed.mp4" type="video/mp4">
<!--            <source src="https://d2btr9yg6upxbz.cloudfront.net//wp-content/uploads/2018/06/video-light-processed.mp4" type="video/mp4">-->
        </video>
    </div>
    <?php } ?>
    <div class="center">
        <a href="<?php echo get_site_url(); ?>" class="main-logo">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/home/main-logo.svg" alt="We are mobile and web application development company with operations in US and Canada" />
        </a>
        <div class="header-wrapper">
          <?php get_template_part( 'template-parts/header', 'fixed' ); ?>
        </div>
        <div class="text-wrapper">
          <h1 class="<?php echo $header_class; ?>"><?php if (($is_query == 1) && ($header_content)) { echo $header_content; } else { the_title(); } ?></h1>
          <p><?php if ($header_text_block) echo $header_text_block; else the_field('header_subtitle'); ?></p>
        </div>
    </div>
    <div class="bottom-controls-wrapper">
        <?php if ($button_instead_of_arrow ) { ?>
            <a href="#" class="static-get-in-touch get-in-touch-link" data-get-in-touch>
                <?php echo $button_instead_of_arrow ; ?>
            </a>
        <?php } else { ?>
            <a href="#" class="arrow" id="scroll-arrow">
                <svg class="scroll-arrow" aria-label="Scroll to Services">
                    <use xlink:href="#scroll-down"></use>
                </svg>
            </a>
        <?php }; ?>

    </div>
</div>
