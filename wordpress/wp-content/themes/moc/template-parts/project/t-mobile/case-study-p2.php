<section class="case-study-content">
    <section class="t-mobile-cs-wrapper client-comment-wrapper mobile-400">
        <blockquote>
            <p>We’ve loved T-Mobile’s willingness to explore innovation in a conversational platform. This project required flexibility and deep domain expertise to achieve the level of complex integrations and functionalities.</p>
        </blockquote>
        <cite class="t-mobile-comment-cite"> — Oksana Oboishchyk, Project Manager</cite>
    </section>
</section>

<section class="case-study-content t-mobile-outcomes">
    <div class="t-mobile-cs-wrapper wide-wrapper">
        <h2 class="case-section-title case-section-title-estimate mobile-400">Results</h2>
        <p class="case-section-text t-mobile-small-text-wrapper mobile-400">The T-Mobile bot has been mentioned at both the 2017 and 2018 F8 Facebook Developer Conference as one of the most successful chatbot experiences on Messenger with live chat integration and a post-purchase follow-up cycle. The bot regularly sends out broadcasts to its ever-growing audience to ensure they are always up to date with the latest promos and news. </p>
        <ul class="results-list t-mobile-results-list mobile-400">
            <li>
                <span class="t-mobile-numbers"><span class="desktop-only">Over 600K</span><span class="mobile-only">600K+</span></span>
                <span class="t-mobile-description no-br-mobile">Total Users</span>
            </li>
            <li>
                <span class="t-mobile-numbers">2,500+</span>
                <span class="t-mobile-description">Active Daily Users</span>
            </li>
            <li>
                <span class="t-mobile-numbers">170K+</span>
                <span class="t-mobile-description">Users in First Year Since Launch</span>
            </li>
            <li>
                <span class="t-mobile-numbers">50K</span>
                <span class="t-mobile-description">Average Number <br />of Broadcasts Sent Per Month</span>
            </li>
            <li>
                <span class="t-mobile-numbers">~61%</span>
                <span class="t-mobile-description">Next-Day Retention Rate</span>
            </li>
            <li>
                <span class="t-mobile-numbers">85%</span>
                <span class="t-mobile-description">Decrease in Active Live Agents <br />due to Chatbot Automation</span>
            </li>
        </ul>
        <p>
            <a href="https://www.facebook.com/TMobile/" class="t-mobile-btn" target="_blank"><span class="cta-btn-content">Experience the Chatbot</span></a>
        </p>
    </div>
</section>
<!--<section class="t-mobile-moc-bot">-->
<!--    <div>-->
<!--        --><?php
//            $form_name = '[moc_bot]';
//            echo do_shortcode($form_name);
//        ?>
<!--    </div>-->
<!--</section>-->
<section class="page-chatbots__section contact-form-wrapper wide-form-wrapper" id="estimate-project-form">

    <h2 class="js-hide-after-submit section-heading">Time to Start the Conversation</h2>
    <p class="section-description case-section-text-centered js-hide-after-submit">Want to discuss a project or simply ask a question?<br /> Fill out the form below and we’ll be in touch within 24 hours.</p>
    <div class="gform_wrapper" id="chatbotspage-form">
        <?php echo do_shortcode('[contact-form-7 id="5408" title="Estimate Form"]'); ?>
    </div>
</section>
<script>
  document.addEventListener("DOMContentLoaded", videoControl);

  function videoControl(){
    var triggerStart = document.getElementById("t-mobile-video-start");
    triggerStart.addEventListener("click", function(){
      playVideo("video-in-frame");
    });
    function playVideo (videoId) {
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
  };

</script>

