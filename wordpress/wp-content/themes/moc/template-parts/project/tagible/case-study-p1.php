<section class="case-study-idea">
    <div class="case-study-content-bg">
        <picture>
            <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/tagible/idea.webp" type="image/webp">
            <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/tagible/idea_mob.webp" type="image/webp">
            <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/tagible/idea_mon.jpg" type="image/jpeg">
            <img class="lozad case-study-content-bg-img"
                 src="<?php echo get_stylesheet_directory_uri() ?>/images/project/tagible/idea.jpg"
                 data-src="<?php echo get_stylesheet_directory_uri() ?>/images/project/tagible/idea.jpg" alt=""
                 width="1920" height="971">
        </picture>
    </div>
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Idea</h2>
        <div class="case-section-text">
            <?php
            while ( have_posts() ):the_post();
                the_content();
            endwhile; ?>
        </div>
    </div>
</section>
<section class="case-study-estimate">
    <div class="case-study-wrapper">
        <h2 class="case-section-title case-section-title-estimate">Estimate</h2>
        <p class="case-section-text case-section-text-estimate">We have got the project idea in April 2016 and came up with the first designs in May. As a next step, we started working on a MVP and finished the prototype in July, which we were updating for the next two months.
            The project activities included:</p>
        <ul class="estimate-list">
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Design</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Web/Server</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Quality Assurance</h5>
            </li>
            <li class="estimate-list-item">

                <h5 class="estimate-icon-title">Project management</h5>
            </li>
        </ul>
    </div>
</section>
<section class="case-study-discovery">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">Discovery</h2>
        <p class="case-section-text">Tagible for Travel admin panel has two different modes: for customers and for content curators. Customer mode contains dashboard with “Curate site” option to manage content on the site directly and analytics with data comparison with and without Tagible for Travel usage.</p>
        <p class="case-section-text">The keywords look entirely native to each client site, as Tagible for Travel’s overlay styles are customized for every customer according to the corporate identity, design style and colour scheme. The pop-ups with media content are displayed for every keyword with a simple click.To increase conversion each popup has a call to action like “Book online” or “Get a quote” that are replicating native client site’s call to action buttons.</p>
        <p class="case-section-text">There was a challenge to curate millions of keywords and their variants. For example, customers use different spellings for the same keyword, so we decided to group them to reduce curation time and costs. For example, “Paris” keyword contains “Paris”, “PARIS”, “City of Light” and some other spellings, but as a group it was curated once.</p>
    </div>
    <div class="case-study-image-wrapper">
        <picture>
            <img class="lozad"
                 src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery-image.png"
                 data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery-image.png"
                 alt="discovery image">
        </picture>
    </div>
</section>
<section class="case-study-development">
    <div class="case-study-wrapper">
        <h2 class="case-section-title">What We Created</h2>
        <p class="case-section-text">The primary goal of the project is to increase the conversion and time spent on the site by engaging users with rich media content that most of the travel sites don’t have. So, in design, we focused on UX.</p>
        <article class="case-study-comment revert">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_1.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_1.png" alt="dev_image_1">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">A design of integrated media block has to be easily customizable to fit every client site and UX has to be intuitively easy to provide customers of all ages the best user experience. Existing Tagible colours are used in the new project. They can be updated anytime if needed. Using the extra colours is not desired to keep the design as clean as possible.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Bohdan Doshchak <span class="author-position">— UI/UX Designer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <article class="case-study-comment">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_2.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_2.png" alt="dev_image_2">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">For Tagible for Travel, we have used pure JS as a frontend technology which is extremely fast because no frameworks are used, just pure JavaScript. It was one of the main targets to make a quick and scalable solution to satisfy any client site implementation and platform. Our frontend script is working inside the client’s site architecture. So we needed to implement a solution, that would not break the client's frontend code and will work in any environment and framework. Tagible for Travel clients only need to add only one simple line of our script to their site code and that's all to be done to receive a rich media content on any approved page of a site. All other stuff our code does under that single line.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                          Oleh Kastornov <span class="author-position">— JavaScript Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-section-text">As for the backend, Tagible for Travel provided us with an opportunity to use rather new and promising Go programming language by Google as the primary technology for developing backend part.</p>
        <article class="case-study-comment revert">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_3.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_3.png"
                         alt="dev_image_3">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">Go is all about building a flexible microservice architecture with a clear and easy separation of execution of objectives across multiple services and console applications. The choice of this technology was influenced by the need to ease the scaling and interaction between system components, as well as targeting simple concurrency implementation and execution speed for special tasks processing media content. Also, The usage of IBM Alchemy and PhantomJS for analyzing web pages can be mentioned among the most remarkable and extraordinary features of this project.</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Vitaliy Hurin <span class="author-position">— Back-end Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-section-text">As we had to build MVP first, we needed some quick solution.</p>
        <article class="case-study-comment">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_4.png"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_4.png"
                         alt="dev_image_4">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">First the project was developed in Symfony 2 for quick development of MVP version. Now Symfony is used only for rendering backend admin area that is a collection of single page JS applications. The whole API for frontend and backend is developed in Go.
                            With the help of Go language, we have implemented several separate microservices: API, client sites analyzer, media content importers and synchronization, and daily statistics processor.
                            Frontend consists of 2 parts: backend admin area (implemented as a bunch of single page JS applications using Backbone.JS) and the client side (written without using any third-party libraries excepting Google Maps to display panoramas to minimize the script size and maximize its working speed on client sites).</p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                          Serghii Gychka <span class="author-position">— Back-end Developer</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>
        <p class="case-section-text">Using Golang increases the performance by up to 60% compared to other backend languages such as PHP, Ruby or even JAVA.</p>
    </div>
</section>
