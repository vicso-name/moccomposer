<?php
add_action('wp_ajax_nopriv_load_blog_post', 'load_blog_post');
add_action('wp_ajax_load_blog_post', 'load_blog_post');

function load_blog_post()
{
    global $wp_query;
    global $post;
    $post_pages = $_POST['currentPage'] ? $_POST['currentPage'] : 1;
    $post_cat = $_POST['catId'];
    $post_type = $_POST['postType'];
    $post_action = $_POST['currentAction'];
    $post_tax = '';

    if ($post_pages == 2) {
        $offset_posts = 7;
    } else {
        $offset_posts = (7 + 6*($post_pages - 2));
    }

    $args = array();
    if ($post_type === 'post') {
        $post_tax = 'industries_blog';
    }

    if ($post_cat !== 'all') {
        $args = array(
            'post_type' => $post_type,
            'paged' => $post_pages,
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => $post_tax,
                    'field' => 'id',
                    'terms' => $post_cat,
                )
            )
        );
    } elseif (($post_cat == 'all') && ($post_action == 'load')) {
        $args = array(
            'post_type' => $post_type,
            'paged' => $post_pages,
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'offset' => $offset_posts
        );
    } else {

        $args = array(
            'post_type' => $post_type,
            'paged' => $post_pages,
            'posts_per_page' => 7,
            'post_status' => 'publish'
        );
    }


    query_posts($args);


    if (have_posts()) {
        $i = 0; ?>


        <?php while (have_posts()) : the_post(); ?>
            <?php if ($post_cat !== 'all') { ?>

                <?php $image_size = 'blog_min'; ?>
            <?php } elseif (($post_cat == 'all') && ($post_action == 'filter')) {
                if (!$i++)
                    $image_size = 'blog_big';
                else
                    $image_size = 'blog_min';
            } else {
                $image_size = 'blog_min';
            } ?>

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
                    <div class="post-item__description"><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></div>
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

    <?php } else { ?>
        <div class="no-post">
            <h2 class="no-post__title">No posts</h2>
        </div>
    <?php }

    wp_reset_query();

    die();
}

add_action('wp_ajax_nopriv_load_ebooks_post', 'load_ebooks_post');
add_action('wp_ajax_load_ebooks_post', 'load_ebooks_post');

function load_ebooks_post()
{
    global $wp_query;
    global $post;
    $post_pages = $_POST['currentPage'] ? $_POST['currentPage'] : 1;
    $post_cat = $_POST['catId'];
    $post_type = $_POST['postType'];
    $post_action = $_POST['currentAction'];
    $post_tax = 'industries';


    if ($post_cat !== 'all') {
        $args = array(
            'post_type' => $post_type,
            'paged' => $post_pages,
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => $post_tax,
                    'field' => 'id',
                    'terms' => $post_cat,
                )
            )
        );
    } elseif (($post_cat == 'all') && ($post_action == 'load')) {
        $args = array(
            'post_type' => $post_type,
            'paged' => $post_pages,
            'posts_per_page' => 6,
            'post_status' => 'publish',
        );
    } else {
        $args = array(
            'post_type' => $post_type,
            'paged' => $post_pages,
            'posts_per_page' => 6,
            'post_status' => 'publish'
        );
    }


    query_posts($args);


    if (have_posts()) { ?>


        <?php while (have_posts()) : the_post(); ?>

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
                        <span>Get The eBook</span>
                        <svg class='arrow-left'>
                            <use xlink:href='#arrow-left-red'></use>
                        </svg>
                    </a>
                </div>
            </div>

        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="load-more-btn-wrap">
                <button id="true_loadmore" class="more-btn js-ebooks-load-more"
                        data-max-page="<?php echo $wp_query->max_num_pages ?>"
                        data-current-page="<?php echo $post_pages; ?>">
                    <span>More</span>
                </button>
            </div>
        <?php endif; ?>

    <?php } else { ?>
        <div class="no-post">
            <h2 class="no-post__title">No posts</h2>
        </div>
    <?php }

    wp_reset_query();

    die();
}



