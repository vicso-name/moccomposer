<?php
/*
 * Template Name: Ebooks & Whitepapers
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/webinars/webinars', 'svg'); ?>
<?php get_template_part('template-parts/blog/blog', 'svg'); ?>


<?php
$post_pages = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'ebooks-whitepapers',
    'order' => 'DESC',
    'posts_per_page' => 6
);
$ebooks = new WP_Query($args); ?>

<?php if ($ebooks->max_num_pages > 1) { ?>
<main id="main" class="ebooks-page-content with-top-panel">
    <div class="top-blog-panel" id="top_panel">
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
                                <input type="text" autocomplete="off" id="search-field" class="search-field"
                                       data-post-search="ebooks-whitepapers"
                                       placeholder="<?php echo esc_attr_x('Search in eBooks & Whitepapers', 'placeholder', 'moc'); ?>"
                                       value="<?php echo get_search_query(); ?>" name="s"
                                       title="<?php echo esc_attr_x('Search for:', 'label', 'moc'); ?>"/>

                                <div class="displayed-search-phrases" id="displayed-search-phrases">
                                    <div class="popular-searches-block">
                                        <h3 class="title">Most popular searches:</h3>
                                        <ul class="popular-searches-list">
                                            <li class="popular-searches-item js-searches-item">Conversational AI</li>
                                            <li class="popular-searches-item js-searches-item">Conversation Design</li>
                                            <li class="popular-searches-item js-searches-item">Customer Experience</li>
                                            <li class="popular-searches-item js-searches-item">Chatbot</li>
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
                    $terms = get_terms('industries', array(
                        'hide_empty' => 0,
                        'orderby' => 'name'
                    ));
                    foreach ($terms as $term):
                        if ($term->count > 0) {
                            ?>

                            <li class="industries__item">
                    <span data-cat-id="<?php echo $term->term_id ?>"
                          class="industries__item-inner js-load-ebook-post"><?php echo $term->name; ?>
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
    <?php } else { ?>
        <main id="main" class="ebooks-page-content">
    <?php } ?>

        <div class="page-container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>

        <div class="ebooks-container page-container">

            <?php if ($ebooks->have_posts()): ?>
            <div class="ebooks-list ajax-container">
                <?php while ($ebooks->have_posts()) :
                    $ebooks->the_post(); ?>

                    <div class="ebooks-item">
                        <a href="<?php echo get_permalink(); ?>" class="ebooks-item__link"></a>

                        <div class="ebooks-item__image-wrap">
                            <?php the_post_thumbnail(); ?>
                        </div>

                        <div class="ebooks-item__text-wrap">
                         <span class="ebooks-item__date">
                             <?php echo get_the_date('d M Y'); ?>
                         </span>

                            <h2 class="ebooks-item__title"><?php the_title(); ?></h2>

                            <div class="ebooks-item__description"><?php the_excerpt(); ?></div>

                            <a href="<?php echo get_permalink(); ?>" class="ebooks-item__post-link">
                                <span>Get The eBbook</span>
                                <svg class='arrow-left'>
                                    <use xlink:href='#arrow-left-red'></use>
                                </svg>
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>

                <?php if ($ebooks->max_num_pages > 1) : ?>

                    <div class="load-more-btn-wrap">
                        <button id="true_loadmore" class="more-btn js-ebooks-load-more"
                                data-max-page="<?php echo $ebooks->max_num_pages ?>"
                                data-current-page="<?php echo $post_pages; ?>">
                            <span>More</span>
                        </button>
                    </div>

                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    <?php endif; ?>

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
