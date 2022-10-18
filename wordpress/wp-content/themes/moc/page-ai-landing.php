<?php
/**
 * Template Name: AI Landing template
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>

<?php $page_class = get_field('ai_landing_page_class'); ?>

<main id="main" class="page-chatbots template industry-landing <?php echo $page_class ? $page_class : ''; ?>">

    <?php
    $page_id = get_the_ID();

    if ($page_id == '33898') {
        get_template_part('template-parts/ai-landing/conversation', 'popup-finance');
    }
    ?>

    <?php get_template_part('template-parts/ai-landing/section', 'hero'); ?>


    <?php get_template_part('template-parts/ai-landing/section', 'use-cases'); ?>

    <?php if (get_field('displayed_information_airports')) {
        get_template_part('template-parts/ai-landing/information', 'section');
    } ?>

    <?php if (get_field('displayed_chatbot_examples')) {
        get_template_part('template-parts/ai-landing/bot-examles', 'section');
    } ?>

    <?php get_template_part('template-parts/section', 'projects-slider'); ?>

    <?php if (get_field('displayed_channel_section')) {
        get_template_part('template-parts/chatbots/channels', 'section');
    } ?>

    <?php if ($page_id == '33898') { ?>

        <section class="conversational_services">

            <div class="conversational-container conversational_services_container">
                <h2>Conversational AI Services</h2>
                <p class="conversational_subtitle_description">Master of Code Global provides an end-to-end list of services for any financial organization looking to enter or expand their conversational AI footprint.</p>
            </div>



            <div class="conversational-container">

                <div class="conversational-tabs-wrapper">

                    <div class="conversational-tab-item">

                        <ul class="tabs-list">
                            <li id="tab-1" class="tab-item tab-border">Conversational AI Strategy Consultancy</li>
                            <li id="tab-2" class="tab-item">Solution Review</li>
                            <li id="tab-3" class="tab-item">Conversation Design</li>
                            <li id="tab-4" class="tab-item">Finance Bot Development</li>
                            <li id="tab-5" class="tab-item">System Integration</li>
                        </ul>

                    </div>

                    <div id="conv-tabs-content" class="conversational-tab-item">

                        <div id="tab-1-content" class="tab-content-item show">
                            <div class="tab-content__header">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_stratage.png" alt="strategy_consultancy">
                                </figure>
                                <h3>Conversational AI Strategy Consultancy</h3>
                            </div>
                            <p>Defining a conversational strategy is important for long-term success, but is also challenging. A solid strategy requires both knowledge of the business as well as the landscape in which you - and your competition - are playing. </p>
                            <p>A strategist will help you plan your vision, review your data, prioritize the right use cases, create a roadmap, identify the right channels, and more. With an understanding of the banking and financial services sector, Master of Code Global is prepared to guide you through creating the optimal AI strategy for your needs, and setting you up for continued growth and expansion as your needs and the landscape continues to evolve.</p>
                            <a id="convr_strategy_consultancy" class="conversational_btn" href="#ai-page-form">
                                <span>Get Started</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                    <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                                </svg>
                            </a>
                        </div>

                        <div id="tab-2-content" class="tab-content-item">
                            <div class="tab-content__header">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_solution_review.png" alt="strategy_consultancy">
                                </figure>
                                <h3>Solution Review</h3>
                            </div>
                            <p>You’ve already realized that a conversational AI solution is a strength for any financial services business to have, allowing your customers to self-serve. But how do you mature to the next level? </p>
                            <p>The first step in planning that next step is to review your current solution from top to bottom - from persona to the use cases; from the technology to the underlying platform. </p>
                            <p>Planning for the next stage requires an understanding of where you are at today, and the Conversational Experts at Master of Code can review what’s there today, document it, and provide inputs to help define the strategy for tomorrow and beyond.</p>
                            <a id="convr_solution_review" class="conversational_btn" href="#ai-page-form">
                                <span>Get Started</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                    <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                                </svg>
                            </a>
                        </div>

                        <div id="tab-3-content" class="tab-content-item">
                            <div class="tab-content__header">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conversatio_design.png" alt="strategy_consultancy">
                                </figure>
                                <h3>Conversation Design</h3>
                            </div>
                            <p>The strength of any self-service tool is how it engages with the customer. Do you want a basic service that can only do a handful of things, or do you want a virtual assistant that can do as much as a branch advisor or teller? </p>
                            <p>Master of Code’s dedicated team of Conversation Designers can help you expand your customers’ experience with your chatbot or voice assistant, making the bot feel like and truly represent your brand and your services. From FAQ automation to checking your balance, making a bill payment to applying for a credit card… </p>
                            <p>Our Designers can help map out your conversational use cases, taking into consideration all of the details that need to be part of the process, helping design an experience that gives your users the control that they want and desire when banking with you.</p>
                            <a id="convr_conversation_design" class="conversational_btn" href="/conversation-design">
                                <span>Learn More</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                    <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                                </svg>
                            </a>
                        </div>

                        <div id="tab-4-content" class="tab-content-item">
                            <div class="tab-content__header">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_finance_bot_development.png" alt="strategy_consultancy">
                                </figure>
                                <h3>Finance Bot Development</h3>
                            </div>
                            <p>Master of Code’s bot development team can do the entire solution build - top to bottom. We work with the leading bot and hosting providers - Microsoft, AWS, Google, LivePerson, Glia, and more! - to implement the right solution for what you need, working within the tools you have or recommending the ideal solution for your financial institution, based on your needs. </p>
                            <a id="convr_finance_bot" class="conversational_btn" href="#ai-page-form">
                                <span>Get Started</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                    <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                                </svg>
                            </a>
                        </div>

                        <div id="tab-5-content" class="tab-content-item">
                            <div class="tab-content__header">
                                <figure>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_system_integration.png" alt="strategy_consultancy">
                                </figure>
                                <h3>System Integration</h3>
                            </div>
                            <p>A major success factor with any virtual assistant is being able to provide the user the right information at the right time. Many banking services are spread out over multiple systems, some of which are in the cloud and others on-premise. And in some cases the ability for the systems to talk to one another can be a struggle. </p>
                            <p>Master of Code Global’s experience includes extensive integrations with many different systems. Building this bridge between disconnected systems will provide your users with more opportunity for self-service, allowing them to take ownership of their financial activities.</p>
                            <a id="convr_system_integration" class="conversational_btn" href="#ai-page-form">
                                <span>Get Started</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                    <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                                </svg>
                            </a>
                        </div>

                    </div>

                </div>

                <section class="convr_carousel convr-finance-mobile">

                    <!-- first tab content -->
                    <h3 class="convr_carousel-item">Conversational AI Strategy Consultancy</h3>

                    <div class="convr_carousel-content">

                        <figure>
                            <img class="strategy_consultancy_img" src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_stratage.png" alt="strategy_consultancy">
                        </figure>

                        <p>Defining a conversational strategy is important for long-term success, but is also challenging. A solid strategy requires both knowledge of the business as well as the landscape in which you - and your competition - are playing. </p>
                        <p>A strategist will help you plan your vision, review your data, prioritize the right use cases, create a roadmap, identify the right channels, and more. With an understanding of the banking and financial services sector, Master of Code Global is prepared to guide you through creating the optimal AI strategy for your needs, and setting you up for continued growth and expansion as your needs and the landscape continues to evolve.</p>

                        <a id="convr_strategy_consultancy_mobile" class="conversational_btn" href="#ai-page-form">
                            <span>Get Started</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                            </svg>
                        </a>

                    </div>

                    <!-- second tab content -->
                    <h3 class="convr_carousel-item">Solution Review</h3>
                    <div class="convr_carousel-content">

                        <figure>
                            <img class="solution_img" src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_solution_review.png" alt="strategy_consultancy">
                        </figure>

                        <p>You’ve already realized that a conversational AI solution is a strength for any financial services business to have, allowing your customers to self-serve. But how do you mature to the next level? </p>
                        <p>The first step in planning that next step is to review your current solution from top to bottom - from persona to the use cases; from the technology to the underlying platform. </p>
                        <p>Planning for the next stage requires an understanding of where you are at today, and the Conversational Experts at Master of Code can review what’s there today, document it, and provide inputs to help define the strategy for tomorrow and beyond.</p>

                        <a id="convr_solution_review_mobile" class="conversational_btn" href="#ai-page-form">
                            <span>Get Started</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                            </svg>
                        </a>

                    </div>

                    <!-- three tab content -->
                    <h3 class="convr_carousel-item">Conversation Design</h3>
                    <div class="convr_carousel-content">

                        <figure>
                            <img class="conversation_design_img" src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conversatio_design.png" alt="strategy_consultancy">
                        </figure>

                        <p>The strength of any self-service tool is how it engages with the customer. Do you want a basic service that can only do a handful of things, or do you want a virtual assistant that can do as much as a branch advisor or teller? </p>
                        <p>Master of Code’s dedicated team of Conversation Designers can help you expand your customers’ experience with your chatbot or voice assistant, making the bot feel like and truly represent your brand and your services. From FAQ automation to checking your balance, making a bill payment to applying for a credit card… </p>
                        <p>Our Designers can help map out your conversational use cases, taking into consideration all of the details that need to be part of the process, helping design an experience that gives your users the control that they want and desire when banking with you.</p>

                        <a id="convr_conversation_design_mobile"  class="conversational_btn" href="/conversation-design">
                            <span>Learn More</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                            </svg>
                        </a>

                    </div>

                    <!-- four tab content -->
                    <h3 class="convr_carousel-item">Finance Bot Development </h3>
                    <div class="convr_carousel-content">

                        <figure>
                            <img class="finance_bot_development_img" src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_finance_bot_development.png" alt="strategy_consultancy">
                        </figure>

                        <p>Master of Code’s bot development team can do the entire solution build - top to bottom. We work with the leading bot and hosting providers - Microsoft, AWS, Google, LivePerson, Glia, and more! - to implement the right solution for what you need, working within the tools you have or recommending the ideal solution for your financial institution, based on your needs. </p>

                        <a id="convr_finance_bot_mobile" class="conversational_btn" href="#ai-page-form">
                            <span>Get Started</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                            </svg>
                        </a>

                    </div>

                    <!-- five tab content -->
                    <h3 class="convr_carousel-item">System Integration </h3>
                    <div class="convr_carousel-content">

                        <figure>
                            <img class="system_integration_img" src="<?php echo get_template_directory_uri() ?>/images/ai-landing/conv_system_integration.png" alt="strategy_consultancy">
                        </figure>

                        <p>A major success factor with any virtual assistant is being able to provide the user the right information at the right time. Many banking services are spread out over multiple systems, some of which are in the cloud and others on-premise. And in some cases the ability for the systems to talk to one another can be a struggle.</p>
                        <p>Master of Code Global’s experience includes extensive integrations with many different systems. Building this bridge between disconnected systems will provide your users with more opportunity for self-service, allowing them to take ownership of their financial activities.</p>

                        <a  id="convr_system_integration_mobile" class="conversational_btn" href="#ai-page-form">
                            <span>Get Started</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16.6" viewBox="0 0 24 24">
                                <path fill="#ffffff" fill-rule="evenodd" d="M2.01 3L2 10l15 2-15 2 .01 7L23 12z"></path>
                            </svg>
                        </a>

                    </div>

                </section>

            </div>
        </section>

    <?php }
    ?>

    <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="ai-page-form">
        <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
        <p class="section-description centered-description js-hide-after-submit">
                <span class="desktop-only">Want to discuss a project or simply ask a question?<br/>
                </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

        <div class="moc-inner gform_wrapper" id="ai-page-form">
            <?php
            $contact_form = get_field('contact_form_shortcode');
            echo do_shortcode($contact_form); ?>
        </div>
    </section>

    <?php get_template_part('template-parts/zoho-questions-popup'); ?>

    <!-- for video in Hero screen -->
    <script>
      document.addEventListener("DOMContentLoaded", videoControl);

      function videoControl() {
        var triggerStart = document.getElementById("hero-video-start");
        var videoWrapper = document.getElementById("video-frame");
        const source = document.getElementById('video-source');
        const sourceSrc = source.getAttribute('src');
        videoWrapper.classList.add('loaded');

        if (sourceSrc) {
          triggerStart.addEventListener("click", function () {
            playVideo("video-in-frame");
          });
        }

        function playVideo(videoId) {
          var video = document.getElementById(videoId);
          if (typeof video !== 'undefined') {
            if (video.paused) {
              video.play();
              triggerStart.classList.add('playing');
            } else {
              video.pause();
              triggerStart.classList.remove('playing');
            }
          }
        }
      }

    </script>
</main>

<?php get_footer(); ?>

