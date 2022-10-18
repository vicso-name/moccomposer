<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed-blog');
global $post;
$current_post_id = $post->ID;?>

<main id="main" class="single-blogpost-wrap hide-estimate">

<header>
    <div class="post-thumbnail-single">
        <div class="image-wrap">
            <img src="<?php the_post_thumbnail_url( 'blog_big' ); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="author-profile-image-single"><?php
            if ( get_field('author', $post->ID) ) {
            $author_id = get_field('author', $post->ID);
            $img = get_field('author_image', $author_id);
            $img_thumbnail = $img['sizes']['avatar']; ?>
            <img src="<?php echo $img_thumbnail; ?>" alt="<?php the_field('author_name', $author_id); ?>">
            <?php } else echo get_avatar(); ?>
        </div>
    </div>

    <div class="single-post-info">
        <div class="single-post-date">

            <?php
                $author_link = get_field('author_link', $author_id);
                if(get_field('author', $post->ID)):
            ?>

                <?php  if($author_link ): ?>

                    <a class="post_author-link" target="_blank" href="<?php echo get_field('author_link', $author_id); ?>">
                        <?php the_field('author_name', $author_id); ?>
                    </a>
                    <span class="author-position"><?php the_field('author_position', $author_id);; ?></span>

                <?php else: ?>

                    <?php the_field('author_name', $author_id); ?>
                    <span class="author-position"><?php the_field('author_position', $author_id);; ?></span>

                <?php endif; ?>

            <?php else: ?>

                    <?php echo get_the_author(); ?>

            <?php endif; ?>

            <span>

                <?php if ( get_the_modified_time() != get_the_time() && get_the_modified_time("Y") > 2021): ?>
                   <span class="date">Updated <?php the_modified_time('F d, Y'); ?></span>
                <?php else: ?>
                    <span class="date"><?php echo get_the_time('F d, Y'); ?></span>
                <?php endif; ?>

            </span>

            <div class="share-sidebar" id="post-social">
                <?php echo do_shortcode("[ssba]"); ?>
            </div>
        </div>
        <h1 class="single-post-title"><?php the_title(); ?></h1>
    </div>
</header>
<section class="single-post-wrapper">
    <div class="blog-post-content">

        <?php the_content(); ?>

        <?php get_template_part('template-parts/blog/blogpost', 'contact'); ?>

        <?php get_template_part('template-parts/blog/blogpost', 'feedback'); ?>

        <?php
        function url_origin( $s, $use_forwarded_host = false )
        {
            $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
            $sp       = strtolower( $s['SERVER_PROTOCOL'] );
            $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
            $port     = $s['SERVER_PORT'];
            $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
            $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
            $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
            return $protocol . '://' . $host;
        }

        function full_url( $s, $use_forwarded_host = false )
        {
            return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
        }

        $absolute_url = full_url( $_SERVER );
        ?>

        <?php // echo do_shortcode('[wpdevart_facebook_comment curent_url="'.$absolute_url.'" order_type="social" title_text="Facebook Comment" title_text_color="#333333" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]'); ?>

    </div>

    <?php get_template_part('template-parts/blog/blogpost', 'tag-footer'); ?>

<!--    <div class="info-div">--><?php //var_dump($current_post_id);?><!--</div>-->
<!--    <div class="info-div">--><?php //var_dump(get_field('post_popup_displayed', $current_post_id));?><!--</div>-->
<!--    <div class="info-div">--><?php //var_dump(get_field('should_the_popup_be_displayed', $current_post_id));?><!--</div>-->

    <?php if (get_field('post_popup_displayed', $current_post_id)) { ?>
        <div class="main-popup ecommerce-popup blog-post-popup js-conversation-popup" id="blog-post-popup">

            <div class="main-popup__inner">
                <button class="main-popup__close-btn js-conversation-popup-close-btn" id="conversation-popup-close"></button>

                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="ecommerce-popup__text-part">
                                <h2 class="ecommerce-popup__title">We build enterprise grade voice solutions to take your customer's experience to the next level.</h2>
                                <p class="ecommerce-popup__description">
                                    Be the first to find out about next cool set of voice use cases!
                                </p>

                                <a id="join_waiting_list" href="#" class="cta-btn js-btn-download">Join Waiting List</a>
                            </div>
                        </div>

                        <div class="flip-card-back">
                            <div class="ecommerce-popup__form-part">
                                <div class="contact-form-wrapper">
                                    <div class="gform_wrapper" id="post-voice-form"
                                         data-tag="PopUp"
                                         data-title="Pop-up for blog posts about Voice">
                                        <?php echo do_shortcode('[contact-form-7 id="39133" title="Blog post Voice form"]'); ?>

                                        <div class="success-block">
                                            <div class="icon icon--order-success svg show-on-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" fill="none">
                                                    <circle cx="60" cy="60" r="58" stroke="#F1563C" stroke-width="4" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                                    <path d="M30 62.5L48 80.5L90 38.5" stroke="#F1563C" stroke-width="5" style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"><path>
                                                </svg>
                                            </div>
                                            <div class="response success-response">
                                                Thank you for subscribing!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


</section>

</main>

<?php get_footer(); ?>
