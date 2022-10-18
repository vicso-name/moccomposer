<?php get_template_part('template-parts/project/traptap/traptap-svg'); ?>
<section class="case-study-idea">
    <div class="case-study-content-bg lozad">
        <picture>
            <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/traptap/idea.webp" type="image/webp">
            <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/traptap/idea_mob.webp" type="image/webp">
            <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/traptap/idea.jpg" type="image/jpeg">
            <img class="case-study-content-bg-img" src="<?php echo get_stylesheet_directory_uri() ?>/images/project/traptap/idea_mob.jpg" alt="" width="1920" height="1056">
        </picture>
    </div>
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Idea</h2>
        <div class="case-section-text">
            <p>The project happened because of the unique problem that all four TrapTap creators had: there was no simple, cheap and legal way to avoid the speeding tickets. So, they created a distraction-free device that sits on a vehicle's dash. It maps areas with speed traps, school zones and red light cameras by using GPS and warns you of potential driving hazards.</p>
            <div class="idea-substring">
                <svg class="bt-logo">
                    <use xlink:href="#bt-logo"></use>
                </svg>
                <p>TrapTap uses Bluetooth Low-energy (BLE) to connect with the free app on your smartphone and its mapping software.</p>
            </div>
        </div>

    </div>
</section>
<section class="case-study-estimate">
    <div class="case-study-wrapper">
        <h2 class="case-section-title case-section-title-estimate">Project Overview</h2>
        <p class="case-section-text">To customize the alerts settings and check the statistics users should synchronize TrapTap with our app. The app collects and shows the average speed, travel distance and a number of hazards passed.</p>
        <div class="case-study-image-wrapper">
            <img class="lozad" src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/overview_img1.png" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/overview_img1.png" alt="TrapTap App - Your profile">
        </div>

        <p class="case-section-text-centered vertical-indent">
            It’s incredibly easy to use:
        </p>
        <ul class="traptap-steps">
            <li>
                <span class="sprite-step sprite-step_1 lozad"></span>
                <p>Download the app</p>
            </li>
            <li>
                <span class="sprite-step sprite-step_2 lozad"></span>
                <p>Pair with your TrapTap via Bluetooth</p>
            </li>
            <li>
                <span class="sprite-step sprite-step_3 lozad"></span>
                <p>Configure your settings</p>
            </li>
            <li>
                <span class="sprite-step sprite-step_4 lozad"></span>
                <p>Set the device on your dashboard</p>
            </li>
        </ul>
        <div class="case-study-image-wrapper">
            <img class="lozad" src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/flow.png" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/flow.png" alt="TrapTap - flow">
        </div>
        <p class="case-section-text">The MOC team worked on the project by using a feature-by-feature approach in a short phases. Each sprint lasted for 2-3 weeks. They comprised new feature development, location, database and battery usage optimization and provided workarounds for issues caused by different Bluetooth behaviours of various Android devices.</p>
        <p class="case-section-text-centered vertical-indent">
            The project activity included:
        </p>
        <ul class="estimate-list">
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Android app development</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Quality Assurance</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Customer and product support</h5>
            </li>
        </ul>
    </div>
</section>
<section class="case-study-development grey-bg">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">What We Created</h2>
        <p class="case-section-text">The app and the device work simultaneously with the Bluetooth, location and networking, which influence a phone battery a lot. Also, we had some Bluetooth issues caused by  different vendors' smartphone peculiarities. We solved those issues by fixing the RxAndroidBle library.</p>
        <article class="case-study-comment">
            <div class="comment-wrapper full-height-image-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img1.png" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img1.png" alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p>One of the development challenges was to detect a driving path in a real-time and minimize a distance deviation.A real-time path prediction can passively monitor the driver’s behavior. A driver only gets alerts if the information is highly relevant to the current location. The heading and distance deviation are based on the Gaussian distribution. That enables us to consider the correlated heading and distance uncertainties in a prediction. As the predictive distribution of the multi-output estimates, we generate only one output.</p>
                        <p>To validate that approach, we learned the prediction models by using the collected data, and testing it. The prediction utilizes the individual travel patterns to determine the user’s future travel path. If a user does not have a sufficient path history, the algorithm can transit between individual user path history and all path records that are stored in the database. This principle allows us to individualize the route prediction approach based on the user’s specific travel patterns.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Vlad Yarovyi <span class="author-position">— Android Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-section-text-centered vertical-indent">However, path prediction appeared a tricky thing.</p>
        <article class="case-study-comment revert">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img2.png" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img2.png" alt="dev_image_2">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">We store the mapping tile related data in a Realm database. The location data takes up much space, and, as it turned out, Realm doesn’t work well when data size grows huge. The solution was to divide a huge base into a bunch of small ones. Since map comprises 1’*1’ squares called tiles, we created individual bases for each tile to avoid having huge Realm instances.   We need to keep only a current and every surrounding tile at any given moment. This method helps us save a device’s RAM as well .
                            Compressed data for a single tile occupies up to several megabytes. To consume less battery we load the tiles in advance: initially, the driver’s current tile and then all surrounding tiles.
                        </p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Alex Isaenko <span class="author-position">— Android Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
    </div>
</section>
