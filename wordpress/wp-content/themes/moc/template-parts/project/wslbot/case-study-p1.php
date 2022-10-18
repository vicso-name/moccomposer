<section class="case-study-idea">


    <div class="case-study-content-bg">
        <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/project/wslbot/idea.webp"
                    type="image/webp">
            <img class="case-study-content-bg-img"
                 src="<?php echo get_stylesheet_directory_uri() ?>/images/project/wslbot/idea.jpg" alt="" width="1440"
                 height="349">
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
    </div>
</section>
<section class="case-study-discovery">
    <div class="case-study-wrapper">
        <h2 class="case-section-title case-section-title-estimate">Discovery</h2>
        <p class="case-section-text">Surfers are very interested in what happens in the Surfing Universe. The first
            thing that pops up when a user enters the chatbot is the offer to subscribe to notifications about live
            events and receive a personal digest based on their subscriptions list. This is the easiest way for a user
            to be notified of the content and events that are within their interests.</p>
        <ul class="casestudy-resources-list">
            <li class="casestudy-resource-item">
                <div class="resource-image-wrapper">
                    <img class="lozad casestudy-resource-image"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery_1.png"
                         alt="American Cancer Society"/>
                </div>
                <p class="case-section-text">Users are also able to search for their favorite athletes directly by
                    entering their search query in Facebook Messenger. </p>
            </li>
            <li class="casestudy-resource-item">
                <div class="resource-image-wrapper">
                    <img class="lozad casestudy-resource-image"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery_2.png"
                         alt="MyLifeLine.org"/>
                </div>
                <p class="case-section-text">WSL cares about personalizing their chatbot experience. Despite the fact
                    that the bot is made in English, half of the flow is written in Portuguese: if you ask “Você é um
                    bot?”, the chatbot answers “Sim, sou o bot da WSL!”.</p>
            </li>
            <li class="casestudy-resource-item">
                <div class="resource-image-wrapper">
                    <img class="lozad casestudy-resource-image"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery_3.png"
                         alt="YouCaring"/>
                </div>
                <p class="case-section-text">The Help Card is another valuable feature. It would help you if you are new
                    to the world of chatbots and feel a bit lost with this new technology; or if you would like to learn
                    more about the things the bot is capable of.</p>
            </li>
            <li class="casestudy-resource-item">
                <div class="resource-image-wrapper">
                    <img class="lozad casestudy-resource-image"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery_4.png"
                         alt="GoFundMe"/>
                </div>
                <p class="case-section-text">Surfers are expressive, that’s why we made the WSL chatbot emojis-friendly.
                    Send your favourite emojis to check out its cute responses in the surfer style.</p>
            </li>
        </ul>
        <p class="case-section-text">To make the WSL chatbot/user experience even more engaging a custom game was
            developed. Everyone from surf fans to professional athletes can check their knowledge of waves.</p>

    </div>
    <div class="case-study-wrapper">
        <article class="case-study-comment">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/discovery_img.png"
                         alt="Project Discovery">
                </div>
                <div class="comment-content">
                    <h4 class="masters-comment-title">
                        <span class="text-title">Master’s comment</span>
                    </h4>
                    <blockquote>
                        <p class="masters-comment">A large batch of attractive images allows users to get 10 new
                            question-images per game. The goal of the game is to hit 10 out of 10.
                            Besides checking your surfing knowledge you get to enjoy beautiful images of spectacular
                            landscapes and catching surfers on boards. At the end of the game the user gets a gallery
                            card with their results and is given the opportunity to share the card with their friends on
                            Messenger. An optimal number of questions along with a well-built user interface engages
                            users and stimulates them to play again and again.
                        </p>
                    </blockquote>
                    <cite>
                        <span class="comment-author">
                            Viktoriia Tymoshchuk <span class="author-position">— Chatbot Product Manager</span>
                        </span>
                    </cite>
                </div>
            </div>
        </article>

    </div>
</section>
<section class="case-study-development">
    <div class="case-study-wrapper">
        <h2 class="case-section-title case-section-title-estimate">What We Created</h2>
        <article class="case-study-comment revert">
            <div class="comment-wrapper">
                <div class="comment-image-wrapper">
                    <img class="lozad"
                         data-src="<?php echo get_template_directory_uri(); ?>/images/project/<?php echo get_field('images_directory'); ?>/dev_img.png"
                         alt="Project Deveopment">
                </div>
                <div class="comment-content">
                    <p class="masters-comment">
                        WSL chatbot was built on the Chatfuel platform. Google Site Search plugin was set up in the bot
                        to allow users to search for athletes bios by entering their search queries directly in Facebook
                        Messenger. Customized RSS feeds were generated to deliver information about schedules and
                        events, latest news and WSL athletes list. Users were also invited to subscribe to notifications
                        about live events and receive personalized digest based on their subscriptions list.
                    </p>
                </div>
            </div>
        </article>

    </div>
</section>
