<div class="resources-wrapper">
    <ul class="resources-list">
        <?php if ( get_field('client') ) { ?>
            <li>
                <h4 class="caption"><?php _e('Client', 'moc'); ?></h4>
                <span class="amount"><?php the_field('client'); ?></span>
            </li>
        <?php } ?>
        <li>
            <h4 class="caption"><?php _e('Duration', 'moc'); ?></h4>
            <span class="amount"><?php the_field('duration'); ?></span>
        </li>
        <li>
            <h4 class="caption"><?php _e('Team size', 'moc'); ?></h4>
            <span class="amount"><?php the_field('team_size'); ?></span>
        </li>
        <li>
            <h4 class="caption"><?php _e('Platform', 'moc'); ?></h4>
            <span class="amount"><?php the_field('platforms'); ?></span>
        </li>
        <li>
            <h4 class="caption"><?php _e('Industry', 'moc'); ?></h4>
            <span class="amount"><?php the_field('industry'); ?></span>
        </li>
        <?php if ( ( get_field('website_link') ) && !(get_field('hide_website_link_in_resources') ) ) { ?>
            <li>
                <h4 class="caption"><?php _e('Website', 'moc'); ?></h4>
                <span class="amount">
                    <!--noindex-->
                      <a class="resources-website-link" href="<?php the_field('website_link'); ?>" rel="nofollow" target="_blank">
                        <?php the_field('website_name'); ?>
                    </a>
                    <!--/noindex-->

                </span>
            </li>
        <?php } ?>
    </ul>
</div>