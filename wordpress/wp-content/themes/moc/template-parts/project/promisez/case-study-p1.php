<section class="case-study-idea">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Idea</h2>
        <div class="case-section-text centered bottom-indent">
            <p class="centered">PromisEZ is a promise-based management tool, which allows to easily manage promises, measure team performance and make weekly and monthly reports to improve communicative and executive processes within the company.</p>
        </div>
    </div>
</section>
<section class="case-study-discovery">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Discovery</h2>
        <h3 class="case-section-subtitle">PromisEZ main features:</h3>
    </div>
    <div class="case-study-wrapper">
        <ul class="as-case-study-features bottom-indent">
            <li class="as-case-study-feature">
                <h3 class="as-feature-heading">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/as_managing.svg" alt="PromisEZ Feature - Managing Promises">

                    Managing Promises
                </h3>
                <p>Users can easily create a Team with weekly or monthly reporting and set up a plan for the year to manage goals and promises for this period. </p>
            </li>
            <li class="as-case-study-feature">
                <h3 class="as-feature-heading">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/as_statistics.svg" alt="PromisEZ Feature - Statistics">
                    Gathering Statistics
                </h3>
                <p>Any user can get team performance statistics for any period during the year.</p>
            </li>
        </ul>
    </div>
    <div class="case-study-wrapper">
        <article class="case-study-comment bottom-indent bottom-indent-desktop">
            <div class="comment-wrapper full-height-image-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/comment1_image.png" alt="Master's Comment">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p>The most complicated features in the project were Team types, Reports and VIP statuses. The new admin panel Trestle was used for the project, so we’ve experienced a lot of issues when trying to customize it. Luckily, the Trestle admin panel author implemented missing features per our requests. During the system implementation we've changed team managing flows several times to make them more clear and appropriate for the promise-based management process. We've also faced several issues when calculating the teams score. </p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Daria Dementieva <span class="author-position">— Project Manager</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
    </div>
    <div class="case-study-wrapper">
        <p class="case-section-text-centered bottom-indent bottom-indent-desktop">PromisEZ is a medium-term project that we have been working on for the past 6 months.</p>
        <p class="case-section-text-centered vertical-indent">
            The project activity included:
        </p>
        <ul class="estimate-list">
            <li class="estimate-list-item">
                <h5 class="estimate-icon-title">Design</h5>
            </li>
            <li class="estimate-list-item">
                <h5 class="estimate-icon-title">Web Development</h5>
            </li>
            <li class="estimate-list-item">
                <h5 class="estimate-icon-title">Quality Assurance</h5>
            </li>
        </ul>

    </div>
</section>
<section class="case-study-development grey-bg">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Design</h2>
        <p class="case-section-text">We prepared a complete redesign of the existing scorecard system including new features and enhancements. The main problem was to make the product user-friendly and easy to use. The second design version included design of the mobile responsive version and various enhancements, including change of the color scheme due to the change of the logo. </p>
    </div>
    <div class="idea-image-wrapper">
        <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/design-img.png" alt="Accountability Scorecard Design">
    </div>
</section>

<section class="case-study-development">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">What We Created</h2>
        <p class="case-section-text-centered bottom-indent">We’ve used Amazon as hosting for the app and S3 to save avatars and logos.<br /> For deployment, we’ve used Docker Compose.</p>
        <article class="case-study-comment revert">
            <div class="comment-wrapper full-height-image-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/comment2_image.png" alt="DevOps Comment">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p>We’ve used Jenkins server on our side to build images and then pushed them to repository in the Amazon ECR (Amazon Elastic Container Registry) to avoid overloading the production. We’ve also used Ansible as the configuration management system and for automated deploy. All of this allowed us to store the images in the client’s account and simply launch them on the production server with the use of Docker Compose.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Viacheslav Dovhopolyi <span class="author-position">— DevOps Engineer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
    </div>
    <div class="case-study-wrapper">
        <p class="case-section-text">To simplify user management for the global admin we added full access to the users in the system admin panel and provided possibility to manage them and edit their profiles and statuses. For example VIP statuses were added so that partners could get free access to the system for a long periods of time. We offer discount codes for trusted companies, which want to try the complete system functionality for free for a limited period.</p>
        <p class="case-section-text">There were several challenges on the tech side. Unclear understanding of the promise based management specifics caused some difficulties during the app development process.</p>
        <p class="case-section-text bottom-indent">As a result, we’ve implemented three user roles with different permissions in the system, two team types with different reporting periods and improved score calculation and displaying it on the graph.</p>
    </div>
    <div class="case-study-wrapper">
        <article class="case-study-comment">
            <div class="comment-wrapper full-height-image-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/comment3_image.png" alt="Developer Comment">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p>One of the most complicated parts to implement was payment system. <br />System has subscriptions, discount codes, vip users and other functionality that build a lot of different cases that require maximum attention. <br />For deployment we used Amazon Elastic Container Registry to store, manage, and deploy Docker container images. This technology allows us to save configurations and quickly move them into a production environment.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Serhii Ovcharenko <span class="author-position">— Ruby on Rails Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
    </div>

</section>
