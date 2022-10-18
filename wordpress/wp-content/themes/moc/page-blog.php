<?php
/*
 * Template Name: Blog
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/blog/blog', 'svg'); ?>

<?php global $post ?>

<p class="hidden" id="blog-vars"><?php echo admin_url('admin-ajax.php'); ?></p>

<main id="main" class="blog-wrap">

    <div class="top-blog-panel blog-panel-bars" id="top_panel">
        <div class="">

            <div class="blog-search-overlay">

                <form class="search-form" name="form" method="post">

                    <div class="blog-search-input-wrap">
                        <div class="blog-container">
                            <div class="wrapper-blog-search">
                                <span class='close-btn' id='search-close-btn'
                                      data-close-menu="search">
                                    <span class="close-btn-line first"></span>
                                    <span class="close-btn-line second"></span>
                                </span>
                                <svg id='search-icon' class='search-icon'>
                                    <use xlink:href='#search-svg-icon'></use>
                                </svg>
                                <input type="text" autocomplete="off" id="search-field" class="search-field" data-post-search="post"
                                       placeholder="<?php echo esc_attr_x('Search in Blog', 'placeholder', 'moc'); ?>"
                                       value="<?php echo get_search_query(); ?>" name="s"
                                       title="<?php echo esc_attr_x('Search for:', 'label', 'moc'); ?>"/>

                                <div class="displayed-search-phrases" id="displayed-search-phrases">
                                    <div class="popular-searches-block">
                                        <h3 class="title">Most popular searches:</h3>
                                        <ul class="popular-searches-list">
                                            <li class="popular-searches-item js-searches-item">Chatbot examples</li>
                                            <li class="popular-searches-item js-searches-item">Conversational AI</li>
                                            <li class="popular-searches-item js-searches-item">Conversational design</li>
                                            <li class="popular-searches-item js-searches-item">Money bot</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="results-count-wrap">
                                    <div class="results-count-info"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="blog-container">
                <ul class="industries__list">
                    <!--        <li class="industries__item"><span data-cat-id="all"-->
                    <!--                                           class="js-load-post">All</span></li>-->
                    <?php
                    $terms = get_terms('industries_blog', array(
                        'hide_empty' => 0,
                        'orderby' => 'name'
                    ));
                    foreach ($terms as $term):
                        if ($term->count > 0) {
                            ?>

                            <li class="industries__item">
                    <span data-cat-id="<?php echo $term->term_id ?>"
                          class="industries__item-inner js-load-post"><?php echo $term->name; ?>
                        <span class="close-btn-wrap js-remove-active-state">
                        <span class="close-btn">
                            <span class="close-btn-line first"></span>
                            <span class="close-btn-line second"></span>
                        </span>
                        </span>

                    </span>
                            </li>
                        <?php }
                    endforeach; ?>
                </ul>
            </div>

        </div>
    </div>

    <div class="blog-container">

        <h1 class="blog-main-title">Blog</h1>


        <div class="blog-posts">
            <div class="blog-posts__list first-load ajax-container">

                <?php
                $post_pages = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = [
                    'post_type' => 'post',
                    'posts_per_page' => 7,
                    'paged' => $post_pages,
                    'order' => 'DESC',
                    'post_status' => 'publish'
                ];

                $wp_query = new WP_Query($args);

                $i = 0;
                while (have_posts()) : the_post(); ?>

                    <?php if (!$i++)
                        $image_size = 'blog_big';
                    else
                        $image_size = 'blog_min'; ?>

                    <div class="post-item">

                        <a href="<?php echo get_permalink(); ?>" class="post-item__link"></a>

                        <div class="post-item__image-wrap">
                            <img class="post-item__image" src="<?php the_post_thumbnail_url($image_size); ?>"
                                 alt="Read blogpost by">
                        </div>

                        <ul class="post-item__meta-info">
                            <li class="post-item__meta-info-item">
                                <?php if ( get_the_modified_time() != get_the_time() && get_the_modified_time("Y") > 2021): ?>
                                   Updated <?php the_modified_time('F d, Y'); ?>
                                <?php else: ?>
                                    <?php echo get_the_time('F d, Y'); ?>
                                <?php endif; ?>

                            </li>
                            <li class="post-item__meta-info-item">
                                <?php if (get_field('author', $post->ID)) {
                                    $author_id = get_field('author', $post->ID);
                                    the_field('author_name', $author_id);
                                } ?>
                            </li>
                        </ul>

                        <div class="post-item__text-wrap">
                            <a href="<?php echo get_permalink(); ?>" class="post-item__permalink">
                                <h2 class="post-item__title"><?php the_title(); ?></h2>
                            </a>
                            <div class="post-item__description">
                                <?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
                            </div>
                        </div>

                        <a href="<?php echo get_permalink(); ?>" class="post-item__read-link">
                            <span>Read the article</span>
                            <svg class='arrow-left'>
                                <use xlink:href='#arrow-left-red'></use>
                            </svg>
                        </a>

                    </div>

                <?php endwhile; ?>

                <?php if ($wp_query->max_num_pages > 1) : ?>

                    <div class="load-more-btn-wrap">
               <button id="true_loadmore" class="more-btn js-load-more"
                     data-max-page="<?php echo $wp_query->max_num_pages ?>"
                     data-current-page="<?php echo $post_pages; ?>">
                <span>More</span>
              </button>
                    </div>

                <?php endif; ?>

                <?php
                wp_reset_query();
                ?>

            </div>

        </div>

    </div>

    <div class="search-results-wrap">

        <div class="search-spinner">
            <img class="lozad search-spinner-gif"
                 src="Loader.gif"
                 data-src="<?php echo get_template_directory_uri(); ?>/images/blog/Loader.gif"
                 alt="Blog spinner">
            <noscript aria-hidden="true"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/blog/Loader.gif"
                        alt="Blog spinner"></noscript>
        </div>

        <?php if (!is_search()) { ?>
            <div class="search-results hidden-state">
                <div class="displayed-ajax-search blog-container" id="displayed-ajax-search"></div>
            </div>
        <?php } ?>
    </div>
</main>

<?php get_footer(); ?>
