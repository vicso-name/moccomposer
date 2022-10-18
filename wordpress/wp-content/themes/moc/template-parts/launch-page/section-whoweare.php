<section class="whoweare" id="whoweare">
    <h1 class="whoweare__heading1"><?php the_field('whoweare_title', $post->ID); ?></h1>
    <ul class="whoweare__infographics" id="infographics">
        <li class="infographic-item info-startup double-width double-height mobile-full-width mobile-double-height">
            <span class="whoweare-link">
<!--                <span class="big-font"><span >Master of code</span></span>-->
            </span>
        </li>
        <li class="infographic-item info-professionals">
            <a class="whoweare-link" href="<?php the_field('team_page', $post->ID); ?>">
                <span class="big-font bf-red">
                <span class="js-counter" id="counter1">190</span></span>Professionals
            </a>

        </li>
        <li class="infographic-item info-projects">
            <a class="whoweare-link bg-red" href="<?php the_field('portfolio_page', $post->ID); ?>">
                <span class="big-font"><span class="js-counter" id="counter2">273</span></span>Projects Delivered
            </a>
        </li>
        <li class="mobile-full-width double-height no-right-indent-desktop">
            <ul>
                <li class="infographic-item full-width info-downloads">
                    <a class="whoweare-link" href="<?php the_field('portfolio_page', $post->ID); ?>/youversion">
                        <span class="big-font bf-blue"><span class="js-counter" id="counter3">250</span></span>million downloads of developed apps
                    </a>
                </li>
                <li class="infographic-item full-width info-clients">
                    <a class="whoweare-link" href="<?php the_field('testimonials_page', $post->ID); ?>">
                        <span class="big-font bf-red"><span class="js-counter" id="counter4">87</span></span>Loved Clients
                    </a>

                </li>
            </ul>
        </li>
        <li class="double-width mobile-full-width mobile-double-height last-item double-height">
          <ul>
            <li class="infographic-item info-offices double-height">
                <a class="whoweare-link" href="<?php the_field('contacts_page', $post->ID); ?>">
                    <span class="big-font bf-red"><span class="js-counter" id="counter5">5</span></span>offices in US,<br />Canada, EU
                </a>
            </li>
            <li class="infographic-item info-customers double-height">
                <!--noindex-->
                    <a href="https://clutch.co/profile/master-code-global" id="clutch" class="whoweare-link" target="_blank" rel="noopener nofollow">
                        <span class="big-font bf-blue"><span class="js-counter" id="counter6">94</span></span>of our customers<br /> recommend us
                        <span class="clutch-wrapper bf-blue">
                            Validated by
                            <img class="lozad clutch-image" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/home/badge_clutch_2018.svg" alt="Clutch" />
                        </span>
                    </a>
                <!--/noindex-->
            </li>
          </ul>
        </li>
    </ul>
    <p class="whoweare__summary">
        <?php the_field('whoweare_text', $post->ID); ?>
    </p>
</section>
