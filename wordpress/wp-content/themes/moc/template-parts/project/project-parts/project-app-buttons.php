<?php if (get_field('appstore') || get_field('chatbot') || get_field('playmarket') ||  get_field('website')) { ?>
<section class="case-study-buttons-block align-c">
    <div class="buttons-wrap">
        <?php
        if (get_field('appstore')) { ?>
            <!--noindex-->
                <a aria-label="appstore" href="<?php the_field('appstore'); ?>" class="sprite-btn sprite-btn_appstore" rel="nofollow" target="_blank">
                    <svg class="btn-img">
                        <use xlink:href="#btn_appstore"></use>
                    </svg>
                </a>
            <!--/noindex-->

        <?php };
        if (get_field('chatbot')) {?>
            <!--noindex-->
                <a aria-label="chatbot" href="<?php the_field('chatbot'); ?>" class="sprite-btn sprite-btn_bot" rel="nofollow" target="_blank">
                    <svg class="btn-img">
                        <use xlink:href="#btn_bot"></use>
                    </svg>
                </a>
            <!--/noindex-->
        <?php };
        if (get_field('playmarket')) {?>
            <!--noindex-->
                <a aria-label="playmarket" href="<?php the_field('playmarket'); ?>" class="sprite-btn sprite-btn_googleplay" rel="nofollow" target="_blank">
                    <img class="btn-bg-img" src="<?php echo get_template_directory_uri(); ?>/images/project/btn_googleplay_hover_bg.png" alt="GooglePlay" />
                    <svg class="btn-img">
                        <use xlink:href="#btn_googleplay"></use>
                    </svg>
                </a>
            <!--/noindex-->
        <?php };
        if (get_field('website')) {?>
            <!--noindex-->
                <a aria-label="website" href="<?php the_field('website'); ?>" class="sprite-btn sprite-btn_site" rel="nofollow" target="_blank">
                    <svg class="btn-img">
                        <use xlink:href="#btn_site"></use>
                    </svg>
                </a>
            <!--/noindex-->
        <?php }; ?>
    </div>
</section>
<?php }; ?>