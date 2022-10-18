


        <div class="buttons-block">
            <a href="#" class="get-a-quote-link">Request<br />a Quote</a>
        </div>

<section class="chatbot-section chatbot-abilities">
    <h2 class="chatbot-caption">What chatbots can do for you?</h2>
    <ul class="chatbots-list chatbot-abilities-list">
        <li>
            <div class="item-container">
  <span class="icon-holder ecommerce-chatbot">
    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ecommerce-chatbot"></use></svg>
  </span>
                <p><b>Ecommerce chatbots</b> allow to discover and buy products and services right within the mobile messenger</p>
            </div>
        </li>
        <li>
            <div class="item-container">
  <span class="icon-holder food-chatbot">
    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#food-chatbot"></use></svg>
  </span>
                <p><b>Food chatbots</b> (foodbots) allow users to order food directly from the messenger</p>
            </div>
        </li>
        <li>
            <div class="item-container">
  <span class="icon-holder iot-chatbot">
    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#iot-chatbot"></use></svg>
  </span>
                <p><b>IoT chatbots</b> connect users with their cars, smart homes etc.</p>
            </div>
        </li>
        <li>
            <div class="item-container">
  <span class="icon-holder content-chatbot">
    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#content-chatbot"></use></svg>
  </span>
                <p><b>Content chatbots</b> allow to share and display relevant information, images, videos etc.</p>
            </div>
        </li>
    </ul>
</section>

<section class="chatbot-section chatbot-social align-c">
    <h2 class="chatbot-caption">Master of Code Global develops chat bots for the most popular social messengers including</h2>

    <ul class="chatbots-list chatbot-social-list">
        <li>
            <span class="icon-holder icon-messenger"></span>
            <p>Messenger</p>
        </li>
        <li>
            <span class="icon-holder icon-telegram"></span>
            <p>Telegram</p>
        </li>
        <li>
            <span class="icon-holder icon-skype"></span>
            <p>Skype</p>
        </li>
        <li>
            <span class="icon-holder icon-kik"></span>
            <p>KiK</p>
        </li>
        <li>
            <span class="icon-holder icon-line"></span>
            <p>Line</p>
        </li>
    </ul>
</section>
<section class="chatbot-section chatbot-invite align-c">
    <div class="inner-wrapper">
        <h2 class="white-text caption">How do chatbots work?<br />Chat with our MOCBot in Messenger!</h2>
        <a href="https://www.messenger.com/t/master.of.code.global/" target="_blank" class="messenger-btn">
            <svg class="messenger-btn-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-messenger"></use></svg>
            Message Me
        </a>
    </div>
</section>

<section class="chatbot-section chatbot-advantages align-c">
    <h2 class="chatbot-caption">Advantages of chatbots</h2>
    <ul class="chatbots-list chatbot-advantage-list align-c">
        <li>
<span class="icon-holder">
  <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#advantages-1"></use></svg>
</span>
            <h4 class="advantage-header">Faster response time</h4>
            <p>Chatbots upon receiving a request react immediatly. It's a far better and faster option than waiting to speak to a real-life person.</p>
        </li>
        <li>
<span class="icon-holder">
  <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#advantages-2"></use></svg>
</span>
            <h4 class="advantage-header">Multi-tasking</h4>
            <p>Chatbots can simultaneously fulfill multiple tasks and communicate with multiple clients. You won't lose any customer never again.</p>
        </li>
        <li>
<span class="icon-holder">
  <svg>
      <mask id="mask">
          <g stroke="white" stroke-width="0" fill="white">
              <circle cx="33.5" cy="33.5" r="33.5"/>
          </g>
      </mask>
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#advantages-3"></use>
  </svg>

</span>
            <h4 class="advantage-header">24/7</h4>
            <p>Chatbots operate 24 hours a day? 7 days a week. They aim to guarantee great customer service around-the-clock.</p>
        </li>
    </ul>
</section>

<?php
global $post;
$blog_posts = get_field('blog_posts', $post->ID);
if ( !empty($blog_posts) ) {
    ?>
    <section class="chatbot-section chatbot-blog">
        <h2 class="new-style-header">Blog</h2>
        <ul class="chatbots-list chatbot-blog-list">
            <?php
            foreach ( $blog_posts as $post_array ) {
                ?>
                <li>
                    <a class="chatbot-blogpost-link" href="<?php the_permalink($post_array['blog_post']) ?>">
                        <h4 class="chatbot-blogpost-title"><?php echo $post_array['title']; ?></h4>
                        <p class="short-content"><?php echo $post_array['text']; ?></p>
                    </a>

                </li>
                <?php
            }
            ?>
        </ul>
    </section>
    <?php
}
?>

<?php
$chatbot_projects = get_field('chatbot_projects', $post->ID);
if ( !empty($chatbot_projects) ) {
    ?>
    <section class="chatbot-section chatbot-projects">
        <h2 class="caption new-style-header">Chatbot projects</h2>
        <ul class="selected-list">
            <?php
            foreach ( $chatbot_projects as $chatbot_array ) {
                ?>
                <li>
                    <?php $portfolio_icon_id = get_field('icon', $chatbot_array['project']->ID);
                    $image_640 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_640') );
                    ?>
                    <a class="link" href="<?php the_permalink($chatbot_array['project']); ?>">
                        <img class="lozad" data-src="<?php echo $image_640; ?>" alt="<?php echo $chatbot_array['project']->post_title; ?>">
                        <noscript aria-hidden="true"><img src="<?php echo $image_640; ?>" alt="<?php echo $chatbot_array['project']->post_title; ?>"></noscript>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <div class="buttons-block">
            <a href="/portfolio" class="read-more"><?php _e('More', 'moc'); ?></a>
        </div>
    </section>
    <?php
}
?>
