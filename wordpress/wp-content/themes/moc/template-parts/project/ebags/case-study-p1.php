<section class="case-study-idea">
    <div class="case-study-content-bg">
        <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/ebags/idea_bg.webp"
                    type="image/webp">
            <img class="lozad case-study-content-bg-img"
                 src="<?php echo get_stylesheet_directory_uri() ?>/images/project/ebags/idea_bg.jpg"
                 data-src="<?php echo get_stylesheet_directory_uri() ?>/images/project/ebags/idea_bg.jpg" alt=""
                 width="1920" height="971">
        </picture>
    </div>

    <div class="case-study-wrapper">
        <h2 class="case-section-title">Idea</h2>
        <div class="case-section-text">
            <?php
            while (have_posts()):the_post();
                the_content();
            endwhile; ?>
        </div>
        <ul class="idea-list">
            <li class="idea-list-item">
                <div class="icon-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_1.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_1.png"
                         alt="Connected tags">
                </div>
                <div class="icon-overflow">
                    <h5 class="idea-item-title">Connected tags</h5>
                    <p class="idea-item-text">feature gives the ability to add a tag to luggage with digital owner’s
                        contact information included. And a bag will never lose its owner!</p>
                </div>
            </li>
            <li class="idea-list-item">
                <div class="icon-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_2.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_2.png"
                         alt="Visual Search">
                </div>
                <div class="icon-overflow">
                    <h5 class="idea-item-title">Visual Search</h5>
                    <p class="idea-item-text">When the perfect bag passes by, the match can be found on eBags store by
                        snapping a picture and picking from the gallery.</p>
                </div>
            </li>
            <li class="idea-list-item">
                <div class="icon-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_3.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_3.png"
                         alt="Steal of the day">
                </div>
                <div class="icon-overflow">
                    <h5 class="idea-item-title">Steal of the day</h5>
                    <p class="idea-item-text">There is no way to miss a great deal with the Alerts option.</p>
                </div>
            </li>
            <li class="idea-list-item">
                <div class="icon-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_4.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/feat_4.png"
                         alt="eBags Obsession">
                </div>
                <div class="icon-overflow">
                    <h5 class="idea-item-title">eBags Obsession</h5>
                    <p class="idea-item-text">Analyzing likes and dislikes to make recommendations that help to find the
                        perfect handbag.</p>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="case-study-estimate">
    <div class="case-study-wrapper">
        <h2 class="case-section-title case-section-title-estimate">Estimate</h2>
        <p class="case-section-text case-section-text-estimate">The project comprised two phases: apps development and
            eBags Connected Tags. Master of Code gave the mission to 7 masters, and they completed it brilliantly and
            just in time.
            The launch of eBags app was expected to be done in 2,5 month. The project activity included:</p>
        <ul class="estimate-list">
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">iOS</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Android</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Design</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Quality Assurance
                </h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Project management
                </h5>
            </li>
        </ul>
        <p class="case-section-text-centered small-vertical-indent">Connected Tags phase needed 2,2 months to be
            implemented .</p>
    </div>
</section>
<section class="case-study-discovery">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Discovery</h2>
        <p class="case-section-text">In ecommerce app development, you really need to make sure the architecture is
            perfect. If something seems not obvious, tricky to the customer, or doesn’t work well enough, he will not
            make an order. So we made a detailed wireframe:</p>
    </div>
    <div class="case-study-image-wrapper big-image">
        <picture>
            <source media="(max-width: 400px)"
                    srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/wireframes_small.png">
            <img class="lozad"
                 src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/wireframes.png"
                 data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/wireframes.png"
                 alt="wireframes">
        </picture>
    </div>
    <div class="case-study-wrapper">
        <p class="case-section-text">After discussing details with the our UI/UX designer, we worked on the
            prototype:</p>
    </div>
    <div class="case-study-image-wrapper average-image">
        <picture>
            <source media="(max-width: 400px)"
                    srcset="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/prototype-small.png">
            <img class="lozad"
                 src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/prototype-white.png"
                 data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/prototype-white.png"
                 alt="prototype">
        </picture>
    </div>
</section>
<section class="case-study-development">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">What We Created</h2>
        <article class="case-study-comment">
            <p class="case-section-text">One of the major stumbling blocks has been UI. The design was made mostly by a
                web expert from the client’s side. Our job was to make it adapted to mobile with a tight schedule that
                the eBags team dictated.</p>
            <div class="comment-wrapper short-comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_image_1.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_image_1.png"
                         alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">We have made a custom menu widget. The main challenge was to make the
                            blur for background image work fast and correctly for all SoC architectures.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Serhii Yaremych <span class="author-position">— Android Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <article class="case-study-comment">
            <p class="case-section-text">Working with the eBags app backend, we used Go language for push notifications
                dispatching.</p>
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_image_2.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_image_2.png"
                         alt="dev_image_2">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">Complex system of notifications required specific server
                            configuration. Go technology allows to create cross-platform scalable solution that can be
                            easily integrated into existing eBags infrastructure.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                          Glib Dobzhanskyi <span class="author-position">— VP of Engineering</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <article class="case-study-comment">
            <p class="case-section-text top-margin">The customer planned to carry out a paid advertising campaign, so we
                connected Appsflyer to assess the effectiveness of the campaign. This tool allows connecting product
                application activity (including committed purchases) with the method of installation of the application
                (the user can find the app in the AppStore or follow the ad campaign link).</p>
            <p class="case-section-text">During the development process, we were using Parse for sending notifications,
                but it closed soon, so we had to look for an alternative.</p>
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_image_3.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_image_3.png"
                         alt="dev_image_3   ">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">We used Firebase for sending notifications, despite only one month
                            since the feature was announced for iOS. It caused difficulties during the development
                            because of unsatisfied documentation and some bugs on Firebase side, but it became one of
                            the most popular notification services</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Anton Popovichenko <span class="author-position">— iOS Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
            <p class="case-section-text">The full technology bundle: PCSSO API, Android SDK, eBags API, iOS SDK.</p>
        </article>
    </div>
</section>

