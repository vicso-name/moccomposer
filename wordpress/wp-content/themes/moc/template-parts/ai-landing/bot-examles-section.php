<section class="chatbot-examples moc-section">
    <div class="chatbot-examples__inner moc-inner">
        <h2 class="section-title">Real Life Airport Chatbot Examples</h2>
        <div class="chatbot-examples__slider owl-carousel owl-theme">
        <?php if (have_rows('chatbot_examples')): ?>
            <?php while (have_rows('chatbot_examples')) : the_row(); ?>
                <div class="chatbot-examples__item">
                    <div class="chatbot-examples__image-wrap">
                        <img src="<?php the_sub_field('item_image'); ?>" alt=""
                             class="chatbot-examples__item-image">
                    </div>
                    <div class="chatbot-examples__right-part">
                        <img src="<?php the_sub_field('item_logo'); ?>" alt=""
                             class="chatbot-examples__item-logo">
                        <a class="chatbot-examples__item-button" href="<?php the_sub_field('item_link'); ?>" target="_blank">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="ic-FB Messenger" fill-rule="evenodd" clip-rule="evenodd" d="M13.2634 15L10.1245 11.7239L4 15L10.7366 8L13.9522 11.2761L20 8L13.2634 15ZM12 0C5.37333 0 0 4.97467 0 11.1107C0 14.6067 1.74533 17.7267 4.472 19.764V24L8.55867 21.7573C9.64933 22.0587 10.804 22.2213 12 22.2213C18.628 22.2213 24 17.2467 24 11.1107C24 4.97467 18.628 0 12 0V0Z" fill="#0085FF"/>
                            </svg>
                            <span class="chatbot-examples__item-button-text">Experience the Chatbot</span>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</section>