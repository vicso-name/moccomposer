<section class="case-study-idea">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Idea</h2>
        <div class="case-section-text">
            <?php
            while ( have_posts() ):the_post();
                the_content();
            endwhile; ?>
        </div>
        <ul class="presentain-idea-list">
            <li>
                <ul class="inside-list">
                    <li>
                        <h5 class="inside-list-title">Real-time presentation broadcasting</h5>
                        <p class="inside-list-description">Presenters can broadcast the slides on a projection screen and straight to audience members’ smart devices.</p>
                    </li>
                    <li>
                        <h5 class="inside-list-title">Presentation recording</h5>
                        <p class="inside-list-description">Lets you record the presenting session to get a slidecast with voiceover.</p>
                    </li>
                    <li>
                        <h5 class="inside-list-title">Access control</h5>
                        <p class="inside-list-description">A presenter can control presentation access, recorded slidecast, and slide sharing.</p>
                    </li>
                </ul>
            </li>
            <li class="idea-images">
                <div class="idea-img-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/idea_img.png" alt="idea image">
                </div>
<!--                <div class="app-store-btn">-->
<!--                    <a href="https://play.google.com/store/apps/details?id=com.masterofcode.android.presentainapp&hl=en" target="_blank">-->
<!--                        <img class="lozad" data-src="--><?php //echo get_template_directory_uri(); ?><!--/images/project/--><?php //echo get_field('images_directory'); ?><!--/play-market-btn.png" alt="app store button image">-->
<!--                    </a>-->
<!--                </div>-->
            </li>
            <li>
                <ul class="inside-list">
                    <li>
                        <h5 class="inside-list-title">Polls & stats</h5>
                        <p class="inside-list-description">By creating and conducting polls and surveys, a presenter can engage the audience with post-insights. Stats show which answer has been chosen most and which poll is the most popular.</p>
                    </li>
                    <li>
                        <h5 class="inside-list-title">Questions from the audience</h5>
                        <p class="inside-list-description">Presentain allows audience members to send questions during the presentation, and a presenter can show them on the screen while answering.</p>
                    </li>
                    <li>
                        <h5 class="inside-list-title">Insights</h5>
                        <p class="inside-list-description">When the audience connects, Presentain offers to join the presentation via social networks. A presenter gets the audience list with contacts. Also, every recorded session contains its own stats.</p>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>
<section class="case-study-estimate">
    <div class="case-study-wrapper">
        <h2 class="case-section-title case-section-title-estimate">Estimate</h2>
        <p class="case-section-text case-section-text-estimate">Presentain is a long-term project we have been working on for 2 years.
            The project activity included:
        </p>
        <ul class="estimate-list">
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Design</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Web</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">iOS</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Android</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Quality Assurance</h5>
            </li>
        </ul>
    </div>
</section>
<section class="case-study-discovery">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Discovery</h2>
        <p class="case-section-text">We’ve extended the mobile functional - ‘Upload a presentation’ and ‘Create poll’ options were added, as well as new features: integration with cloud services, embed code feature for web to generate HTML that can be embedded in a site or blog.</p>
    </div>
    <div class="case-study-wrapper">
        <p class="case-study-text">On a new Presentain logo, we wanted to translate its functional versatility.</p>
        <article class="case-study-comment">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery_img.png" alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">​To make our product recognizable and unique, I had to design a simple logo for better memorization and sharp enough to be meaningful. Four basic aspects form the image: seamless action, audio capturing, slideshow capability, and visual engagement. After a couple stages of sketching and refinements, I came up with a simple design that delivers the message and works great in different colour solutions (mono and multi colored) and sizes.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Sergium Sagadeyev  <span class="author-position">— UI/UX Designer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-study-text">There were several challenges on the tech side. Many Presentain users connect to the presentation via one WI-Fi spot. When the internet channel gets overloaded, the connection crashes and Presentain stops working. Also, we needed to minimize a delay between the action on the presenter’s device and broadcasting on the screens.</p>
        <p class="case-study-text">During the development process, we received a request from one of the most valued Presentain customers - US Air Force - to increase the number of connected audiences by 4 times for their great upcoming presentation.</p>
    </div>
</section>
<section class="case-study-development">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">What We Created</h2>
        <article class="case-study-comment revert">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img1.png" alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">We have implemented Node.js in a project backend and updated it to the latest LTS release. This lets us increase synchronization speed with the server and reduce the delay between actions on a presenter’s device and its appearance on the audience’s devices. Also, we used REDIS to store click statuses on the Node.JS server.
                            Considering the request, using Node.js let us increase the maximum number of clients to 10000. Also, we’ve updated a converter to decrease the size of uploaded slides to optimize the connecting speed to the presentation. We added an Internet indicator, so a presenter could make sure the internet will not let him down when he gets on stage.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                          Vlad Bolibruk <span class="author-position">— DevOps / JavaScript Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <article class="case-study-comment">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img2.png" alt="dev_image_2">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">We needed to solve a problem with the real-time presentation uploading progress. To make the indicator work properly, we used Faye to provide message servers for Node.js. In addition, Faye synchronizes polling results when the presenter shows them on the screen.
                            Presentain is being used on four types of screens: smartphone, tablet, desktop, and projector. We’ve enabled on-demand crop, resizing, and flipping of images by using a smart imaging service, Thumbor. We need not store 4 copies of 1 picture in different sizes anymore.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                          Oleksandr Kharchenko <span class="author-position">— Back-end Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-section-text top-margin">As for the iOS version, we have simplified the code by getting rid of global variables. Now, the information transfers between the activities by events.</p>
    </div>
</section>
