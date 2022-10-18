<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>

<main id="main" class="hide-estimate kb-post">
    <header>
        <div class="kb-single-banner blog-post-content">
            <div class="text-wrap">
                <span class="kb-post-info date"><?php the_date('d M Y'); ?></span>
                <h1 class="single-post-title"><?php the_title(); ?></h1>
            </div>

            <div class="image-wrap">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </div>
            <span class="kb-post-info read-info"><?php the_field('kb_reading_duration'); ?> to read</span>
        </div>
    </header>
    <div class="single-post-wrapper">
        <div class="kb-post-wrapper blog-post-content">
            <?php the_content(); ?>
        </div>


        <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper">
            <h2 class="js-hide-after-submit section-heading"><?php the_field('kb_form_section_title'); ?></h2>
            <p class="section-description centered-description js-hide-after-submit">
                <?php the_field('kb_form_section_descr'); ?>
            </p>

            <div class="moc-inner gform_wrapper" id="kb-page-form">
                <?php echo do_shortcode('[contact-form-7 id="35369" title="Knowledge Base Form"]'); ?>
            </div>
        </section>

        <?php get_template_part('template-parts/zoho-questions-popup'); ?>

        <div class="kb-post-wrapper bottom-wrapper">

            <div class="share-sidebar" id="post-social">
                <?php echo do_shortcode("[ssba]"); ?>
            </div>


            <div class="related-posts">
                <div class="related-posts__headline">
                    <h2 class="related-posts__section-title"><?php the_field('kb_related_section_title'); ?></h2>
                    <p class="related-posts__section-description"><?php the_field('kb_related_section_descr'); ?></p>
                </div>


                <?php
                $featured_posts = get_field('kb_related_posts');
                if ($featured_posts): ?>
                    <ul class="related-posts__list">
                        <?php foreach ($featured_posts as $post):

                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>
                            <li class="related-posts__list-item">
                                <div class="related-posts__list-item-inner">
                                    <a class="related-posts__link" href="<?php the_permalink(); ?>"></a>
                                    <div class="related-posts__image-wrap">
                                        <img src="<?php the_post_thumbnail_url('blog_min'); ?>"
                                             alt="<?php the_title(); ?>">
                                    </div>


                                    <div class="related-posts__text-wrap">
                                        <div class="related-posts__info">
                                            <span><?php echo get_the_date('d M Y'); ?></span><?php
                                            foreach (get_the_terms(get_the_ID(), 'industries_blog') as $tax) {
                                                echo '<span>' . __($tax->name) . '</span>';
                                            }
                                            ?>
                                        </div>

                                        <h3 class="related-posts__post-title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

            <div class="articles-button-wrap">
                <a href="<?php echo get_site_url(null, '/blog'); ?>" class="read-more">
                    <?php _e('All articles', 'moc'); ?>
                </a>
            </div>
        </div>

</main>

<?php get_footer(); ?>
