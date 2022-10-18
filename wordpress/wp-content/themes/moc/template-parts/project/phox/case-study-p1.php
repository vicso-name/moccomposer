<?php get_template_part('template-parts/project/phox/phox-svg'); ?>
<section class="case-study-idea">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Idea</h2>
        <div class="case-section-text">
            <p>Phox is called to save users time by giving them the ability to quickly capture, organize, and share workplace photos from the smartphone. Using Phox, all photos are organized by location, employee, date & time, securely backed up. All photos are available on the phone or web for easy searching, sharing and referencing whenever users need them.</p>
        </div>
        <div class="idea-image-wrapper">
            <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/idea.png" alt="Phox app pages">
        </div>

    </div>
</section>
<section class="case-study-discovery">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Discovery</h2>
        <h3 class="case-section-subtitle">Phox main features:</h3>
    </div>
    <div class="case-study-wrapper">
        <ul class="case-study-features">
            <li class="case-study-feature">
                <h3 class="feature-heading">
                    <svg class="feature-icon">
                        <use xlink:href="#phox-upload"></use>
                    </svg>
                    Photo Uploading
                </h3>
                <p>Users can easily open the app, take a photo within the app or upload any photo from the gallery. Phox provides users with a sufficient storage size.</p>
            </li>
            <li class="case-study-feature">
                <h3 class="feature-heading">
                    <svg class="feature-icon">
                        <use xlink:href="#phox-manage"></use>
                    </svg>
                    Photo managing
                </h3>
                <p>It is possible to sort photos by organizations, projects, folders and share them separately with friends and employees.</p>
            </li>
            <li class="case-study-feature">
                <h3 class="feature-heading">
                    <svg class="feature-icon">
                        <use xlink:href="#phox-comment"></use>
                    </svg>
                    Photo commenting
                </h3>
                <p>Phox users can comment on any photo in the system and see previous users comments. </p>
            </li>
            <li class="case-study-feature">
                <h3 class="feature-heading">
                    <svg class="feature-icon">
                        <use xlink:href="#phox-share"></use>
                    </svg>
                    Photo sharing
                </h3>
                <p>Sharing links are helping users to easily and securely share photos with non-Phox users without giving them access to the organization.</p>
            </li>
        </ul>
    </div>
    <div class="case-study-wrapper with-custom-bg">
        <article class="case-study-comment">
            <div class="comment-wrapper full-height-image-wrapper">
                <div class="comment-image-wrapper round-bordered-shadow">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/device_01.png" alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p>The most complicated features in the project were User permissions, User roles and payments. We've changed flows several times to make them more clear. We've also faced several issues when submitting app for review on the App Store, as Apple has very strict rules for making payments in the app and we had to change a lot of elements to finally approve the app for Sale. However, it gave us great experience and understanding of best practices.</p>
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
        <p class="case-section-text-centered vertical-indent">Phox is a long-term project that we have been working on for the past year.</p>
        <p class="case-section-text-centered vertical-indent">
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
<section class="case-study-development grey-bg">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">What We Created</h2>
        <p class="case-section-text">Amazon Lambda is a serverless technology for performing one action. We used Lambda to resize pictures and save them on S3. To simplify photo management in the app we added ‘Move photos between projects and folders’ and ‘Different users roles’. Paid system version was added to the web with advanced features.</p>
        <p class="case-section-text">There were several challenges on the tech side. Unclear understanding of the complete user roles stack caused some difficulties during the app development process.</p>
        <p class="case-section-text">As a result, we’ve added three roles for organizations, two roles for projects and the proper relationships between them.</p>
        <article class="case-study-comment revert">
            <div class="comment-wrapper short-comment-wrapper half-height-image-wrapper">
                <div class="comment-image-wrapper blue-shadow">
                    <img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/organization_screenshot.png" alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p>In-app purchases didn’t meet the app business model requirements, that’s why we removed such functionality in the Android and iOS apps. To implement payment transactions on the website, we’ve chosen the Stripe payment system.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Vlad Yarovyi <span class="author-position">— Android Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-section-text-centered vertical-indent">The last changes were made on November 2017 and right now we are currently in beta testing phase.</p>
    </div>
</section>
