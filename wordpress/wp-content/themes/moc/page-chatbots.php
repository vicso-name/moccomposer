<?php
/**
 * Template Name: Chatbots Development Page
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed' ); ?>

<main id="main" class="page-chatbots page-no-lazy template" >



        <?php if( is_front_page() ) {; ?>

            <?php $showhide_popup = get_field('showhide_popup'); if($showhide_popup): ?>

                <?php get_template_part('template-parts/conversation-popup'); ?>

            <?php endif; ?>

        <?php } ; ?>



    <?php get_template_part( 'template-parts/chatbots/section', 'hero' ); ?>
    <?php get_template_part( 'template-parts/chatbots/usecases', 'section' ); ?>
    <?php get_template_part( 'template-parts/chatbots/industries', 'section' ); ?>
    <?php get_template_part( 'template-parts/section', 'projects-slider' ); ?>
    <?php get_template_part( 'template-parts/chatbots/testimonials', 'section' ); ?>
    <?php get_template_part('template-parts/chatbots/trusted', 'section'); ?>
    <?php get_template_part('template-parts/chatbots/experience', 'section'); ?>
    <?php get_template_part('template-parts/chatbots/channels', 'section'); ?>
    <?php get_template_part('template-parts/chatbots/partners', 'section'); ?>
    <?php get_template_part('template-parts/chatbots/platforms', 'section'); ?>

    <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="estimate-project-form">
        <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
        <p class="section-description centered-description js-hide-after-submit">
                <span class="desktop-only">Want to discuss a project or simply ask a question?<br/>
                </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

        <?php if (is_front_page()) { ?>
            <div class="moc-inner gform_wrapper" id="home-page-form">
                <?php echo do_shortcode('[contact-form-7 id="26198" title="Home Page Form"]'); ?>
            </div>
        <?php } else { ?>
            <div class="moc-inner gform_wrapper" id="bot-page-form">
                <?php echo do_shortcode('[contact-form-7 id="26197" title="Chatbot Page Form"]'); ?>
            </div>
        <?php } ?>

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

