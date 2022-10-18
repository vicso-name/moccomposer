<?php
/**
 * Template Name: AI Landing Ecommerce template
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>

<?php $page_class = get_field('ai_landing_page_class'); ?>

<main id="main" class="page-chatbots template industry-landing <?php echo $page_class ? $page_class : ''; ?>">

    <?php get_template_part('template-parts/ai-landing-ecommerce/conversation', 'popup'); ?>

    <?php get_template_part('template-parts/ai-landing/section', 'hero'); ?>

    <?php if (get_field('displayed_use_cases_values')) {
        get_template_part('template-parts/ai-landing/values', 'section');
    } ?>

    <?php if (get_field('displayed_why_use_case')) {
        get_template_part('template-parts/ai-landing/benefits', 'section');
    } ?>


    <section class="conversational_services">
        <h2 class="conversational_services-title">Conversational Commerce Use Cases</h2>
        <div class="conversational-container-tabs">
            <div class="conversational-tabs-wrapper">

                <div class="conversational-tab-item conversational-item-list">
                    <?php
                        $rows = get_field('use_cases_list');
                        if($rows):
                    ?>
                        <ul class="tabs-list">
                            <?php
                                $a = 0;
                                foreach ($rows as $row):
                                $a++;
                            ?>
                                    <li id="tab-<?php echo $a; ?>" class="tab-item <?php if($a===1): ?>tab-border<?php endif; ?>"><?php echo $row['tab_name']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>


                <?php if($rows): ?>

                <div id="conv-tabs-content" class="conversational-tab-item conversational-item-content">


                    <?php
                        $y = 0;
                        foreach ($rows as $row):
                        $y++;
                    ?>
                            <div id="tab-<?php echo $y; ?>-content" class="tab-content-item <?php if($y===1): ?>show<?php endif; ?> ">

                                <div class="tab-content-item__guts">
                                    <figure class="tab-content-item__guts-image">
                                        <img src="<?php echo $row['item_image']; ?>" alt="customer_acquisition_item_image">
                                    </figure>
                                    <div class="tab-content-item__guts-content">
                                        <div class="ai-use-cases__inner-item-title">
                                            <?php echo $row['item_title']; ?>
                                        </div>
                                        <div class="ai-use-cases__main-info">
                                            <p><?php echo $row['item_description']; ?></p>
                                        </div>
                                        <div class="cd_additional-info">
                                            <span class="logan-value"><?php echo $row['ai_info_value']; ?></span>
                                            <p class="logan-sorce-description"><?php echo $row['info_description']; ?></p>
                                        </div>
                                        <div class="ai-use-cases__source-info cd_additional-cases__source-info">
                                            <span class="ai-use-cases__source-title">Source: </span>
                                            <a class="ai-use-cases__source-name" href="<?php echo $row['ai_item_source']['url']; ?>" target="_blank"><?php echo $row['ai_item_source']['title']; ?></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                    <?php endforeach; ?>





                </div>

                <?php endif; ?>

            </div>
            <section class="convr_carousel convr-finance-mobile">

                <!-- first tab content -->
                <h3 class="convr_carousel-item">Сustomer Acquisition</h3>

                <div class="convr_carousel-content logan">
                        <figure class="tab-content-item__guts-image">
                            <img src="<?php echo get_template_directory_uri() ?>/images/customer_acquisition_item_image.png" alt="customer_acquisition_item_image">
                        </figure>
                        <h4 class="logan-title">Сustomer Acquisition</h4>
                        <p>Ecommerce chatbots act as an outstanding tool for lead generation in the online stores. Virtual assistants using intelligent cues are able to engage strangers on your website, app or social media in a conversation and convert them into customers.</p>
                        <span class="logan-value">42%</span>
                        <p class="logan-sorce-description" >Of ecommerce buyers chat to buy primarily via social and messaging platforms. </p>
                        <span class="logan-sorce-title">Source: </span>
                        <a class="logan-sorce-link" href="https://www.facebook.com/iq/insights-to-go/42-in-the-us-42-of-c-commerce-buyers-chat-to-buy-primarily-via-social-and-messaging-platforms/" target="_blank">Facebook</a>
                </div>

                <!-- second tab content -->
                <h3 class="convr_carousel-item">Sales Conversion</h3>
                <div class="convr_carousel-content logan">

                    <figure class="tab-content-item__guts-image">
                        <img src="<?php echo get_template_directory_uri() ?>/images/sales_conversion_item.png" alt="customer_acquisition_item_image">
                    </figure>

                    <h4 class="logan-title">Sales Conversion</h4>
                    <p>At the stage of making a purchase decision, consumers have many questions. It is virtual assistants who can make it easier to get answers 24/7, help with finding alternatives or product reviews, and do their best to nudge the customer towards making a purchase.</p>
                    <span class="logan-value">83%</span>
                    <p>Of customers require some sort of assistance to complete an online purchase</p>
                    <span class="logan-sorce-title">Source: </span>
                    <a class="logan-sorce-link" href="https://www.forbes.com/sites/jiawertz/2017/08/18/exceptional-customer-service-is-key-to-e-commerce-growth/?sh=73f49e053dc6" target="_blank">Forbes</a>

                </div>

                <!-- three tab content -->
                <h3 class="convr_carousel-item">Cart Abandonment</h3>
                <div class="convr_carousel-content logan">

                    <figure class="tab-content-item__guts-image">
                        <img src="<?php echo get_template_directory_uri() ?>/images/minimize_card_abandonment.png" alt="customer_acquisition_item_image">
                    </figure>

                    <h4 class="logan-title">Minimize Cart Abandonment</h4>
                    <p>A chatbot for conversational commerce reduces the likelihood of rejection by actively engaging visitors in a conversation they might find interesting,  convincing customers to return to their carts and converting them into buying customers. Acting like a persevering human sales manager, a virtual assistant answers customers’ questions about products they are considering buying.</p>
                    <span class="logan-value">70%</span>
                    <p>the average cart abandonment rate across all industries</p>
                    <span class="logan-sorce-title">Source: </span>
                    <a class="logan-sorce-link" href="https://www.drip.com/blog/cart-abandonment-statistics" target="_blank">Sleeknote</a>

                </div>

                <!-- four tab content -->
                <h3 class="convr_carousel-item">Payment</h3>
                <div class="convr_carousel-content logan">

                    <figure class="tab-content-item__guts-image">
                        <img src="<?php echo get_template_directory_uri() ?>/images/payments_item.png" alt="customer_acquisition_item_image">
                    </figure>
                    <h4  class="logan-title">Payments</h4>
                    <p>Ecommerce AI Chatbot can be integrated with your back-end systems to complete the uninterrupted transaction experience as a part of the conversational flow. Chatbots ensure encrypted and properly secured transactions due to the use of the top technology stack.</p>
                    <span class="logan-value">41,3%</span>
                    <p>Of consumers use conversational marketing tools for purchases</p>
                    <span class="logan-sorce-title">Source: </span>
                    <a class="logan-sorce-link" href="https://startupbonsai.com/chatbot-statistics/" target="_blank">Startupbonsai</a>

                </div>

                <!-- five tab content -->
                <h3 class="convr_carousel-item">Customer Satisfaction</h3>
                <div class="convr_carousel-content logan">

                    <figure class="tab-content-item__guts-image">
                        <img src="<?php echo get_template_directory_uri() ?>/images/improve_customer_satisfaction_item.png" alt="customer_acquisition_item_image">
                    </figure>
                    <h4  class="logan-title">Improve customer satisfaction</h4>
                    <p>Сommunications powered by AI significantly increase customer satisfaction, which leads to repeat purchases and the possibility of additional sales in the future. This is so, since e-commerce virtual assistants are available 24/7 to resolve about 80% or more of inbound queries that brands receive.</p>
                    <span class="logan-value">65%</span>
                    <p>Avg. chatbot satisfaction rate from chats with bots</p>
                    <span class="logan-sorce-title">Source: </span>
                    <a class="logan-sorce-link" href="https://www.livechat.com/customer-service-report/" target="_blank">Livechat</a>

                </div>

                <!-- six tab content -->
                <h3 class="convr_carousel-item">Personalized Customer Experience</h3>
                <div class="convr_carousel-content logan">

                    <figure class="tab-content-item__guts-image">
                        <img src="<?php echo get_template_directory_uri() ?>/images/personalized_omnichannel_customer_item.png" alt="customer_acquisition_item_image">
                    </figure>
                    <h4 class="logan-title">Personalized omnichannel customer experience</h4>
                    <p>By keeping all customer data in one place, chatbots for conversational commerce can proactively recommend timely and relevant offers based on customer preferences and actions which is a key factor in building long-term customer relationships and encouraging repeat purchases.</p>
                    <span class="logan-value">31%</span>
                    <p>Conversational commerce shoppers message with brands for personalized advice</p>
                    <span class="logan-sorce-title">Source: </span>
                    <a class="logan-sorce-link" href="https://www.facebook.com/business/news/insights/conversational-commerce" target="_blank">Facebook</a>

                </div>

                <!-- seven tab content -->
                <h3 class="convr_carousel-item">Customer Support</h3>
                <div class="convr_carousel-content logan">

                    <figure class="tab-content-item__guts-image">
                        <img src="<?php echo get_template_directory_uri() ?>/images/customer_support_item.png" alt="customer_acquisition_item_image">
                    </figure>

                    <h4 class="logan-title">Customer Support</h4>
                    <p>More and more ecommerce customers prefer to contact a virtual assistant when it comes to order tracking, returns and cancellations, payment issues, and more. E-commerce chatbots can quickly and seamlessly resolve customer’s queries from start to finish, significantly reducing operating costs and increase containment rate by 30% to 60%.</p>
                    <span class="logan-value">69,2%</span>
                    <p>Conversations in retail can be automated with chatbots</p>
                    <span class="logan-sorce-title">Source: </span>
                    <a class="logan-sorce-link" href="https://www.liveperson.com/solutions/retail%20" target="_blank">Liveperson</a>

                </div>

            </section>
        </div>
    </section>


    <?php get_template_part('template-parts/section', 'projects-slider'); ?>

    <?php if (get_field('displayed_channel_section')) {
        get_template_part('template-parts/chatbots/channels', 'section');
    } ?>


    <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="ai-ecommerce-page-form">
        <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
        <p class="section-description centered-description js-hide-after-submit">
                <span>Want to discuss a project or simply ask a question?
                </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

        <div class="moc-inner gform_wrapper" id="ecommerce-page-form">
            <?php
            $contact_form = get_field('contact_form_shortcode');
            echo do_shortcode($contact_form); ?>

            <div class="icon icon--order-success svg show-on-success" style="display:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" fill="none">
                    <circle cx="60" cy="60" r="58" stroke="#F1563C" stroke-width="4" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                    <path d="M30 62.5L48 80.5L90 38.5" stroke="#F1563C" stroke-width="5" style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"><path>
                </svg>
            </div>
            <div class="response success-response" style="display: none;">
                We've just sent you an email containing your copy.
            </div>
        </div>

    </section>

    <?php get_template_part('template-parts/zoho-questions-popup'); ?>

    <!-- for video in Hero screen -->
    <script>
        document.addEventListener("DOMContentLoaded", videoControl);

        function videoControl() {
            var triggerStart = document.getElementById("hero-video-start");
            var videoWrapper = document.getElementById("video-frame");
            videoWrapper.classList.add('loaded');
            triggerStart.addEventListener("click", function () {
                playVideo("video-in-frame");
            });

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

