<?php $percent = get_useful_percent(get_the_ID()); ?>
<form action="save_feedback" class="blog_feedback" id="feedback_form">
    <div class="feedback-block<?php if ( $percent == 0 ){ ?> unvoted<?php } ?>" >


        <div class="feedback-info left-info" id="feedback-conrols-wrapper">
            <span>Was this article helpful?</span>
            <div class="feedback-action-list">
                <button class="feedback-btn yes-btn" data-send="feedback">Yes</button>
                <button class="feedback-btn no-btn" id="negative-submit" data-open-popup="feedback" >No</button>
            </div>
        </div>
        <?php if ($percent > 0){ ?>
            <div class="feedback-info right-info"><span>
                <?php echo $percent; ?>
                % of people found this helpful</span>
            </div>
        <?php } ?>

        <div class="feedback-positive">
            <span>Thanks for your feedback! You can also share your thoughts on the topic in the comments below</span>
        </div>
    </div>
    <div class="feedback-wrapper" data-popup="feedback">
        <div class="feedback-popup">
            <a href="#" class="close-btn" data-send="feedback">
                <svg aria-label="Close"><use xlink:href='#close-icon-new-search'></use></svg>
            </a>
            <span class="feedback-popup-text">Sorry about that</span>
            <span class="feedback-popup-text feedback-question">How can we improve it?</span>
            <input type="text" class="hidden feedback_info" name="feedback_info" value="<?php echo do_shortcode('[geoip_detect2 property="city"]'); ?>, <?php echo do_shortcode('[geoip_detect2 property="country"]'); ?>">
            <?php
            $ip = '';
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            if (is_plugin_active('geoip-detect/geoip-detect.php')) {
                $ip = do_shortcode('[geoip_detect2_get_client_ip]');
            }
            ?>
            <input type="text" class="hidden feedback_ip" name="feedback_ip" value="<?php echo $ip; ?>"/>
            <input type="text" class="hidden" name="post_id" id="post_id" value="<?php echo get_the_ID(); ?>">
            <input type="text" name="feedback_type" id="feedback_type" class="hidden" value="Yes">
            <input type="hidden" name="post_title" class="hidden post-title" value="<?php the_title(); ?>">
            <textarea id="feedback-content" class="feedback-content" name="feedback-content" placeholder="Leave your feedback here" aria-label="Leave your feedback here"></textarea>
            <?php $launch_page = get_page_by_path( 'its-all-about-your-launch' );
            if ( $launch_page ) {
                $pageid =  $launch_page->ID;
            }
            else {
                $pageid = get_option('page_on_front');
            }; ?>
            <input class="email-list hidden" name="email-list" value="<?php echo get_field('send_to', $pageid) ?>">
            <button class="feedback-btn grey-btn disabled" disabled data-send="feedback">Send</button>
        </div>
    </div>
</form>


