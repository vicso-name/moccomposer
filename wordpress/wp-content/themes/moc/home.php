
  <main id="main" class="page-main news" role="main"
        style="background-image: url('<?php the_field('news_bg_image', 'option'); ?>');">
    <div class="news-container">

      <div class="news__headline">
        <h2 class="news__title"><?php the_field('news_main_title', 'option'); ?></h2>

        <ul class="news__category-list">
          <li class="news__category-item">
            <span data-cat-id="<?php echo $term->term_id ?>" class="js-sort-news">All</span>
          </li>
            <?php
            $category = get_categories('hide_empty=0&exclude=1');
            foreach ($category as $cat): ?>
              <li class="news__category-item">
                <span data-cat-id="<?php echo $cat->cat_ID ?>" class="js-sort-news"><?php echo $cat->cat_name; ?></span>
              </li>
            <?php endforeach; ?>
        </ul>

        <select class="news__category-select">
          <option class="news__category-item js-select-post" value=" ">
            All
          </option>
            <?php
            $category = get_categories('hide_empty=0&exclude=1');
            foreach ($category as $cat): ?>
              <option class="news__category-item js-select-post" value="<?php echo $cat->cat_ID; ?>">
                  <?php echo $cat->cat_name; ?>
              </option>
            <?php endforeach; ?>
        </select>
      </div>

        <?php $post_pages = $_POST['currentPage'] ? $_POST['currentPage'] : 1;

        if (have_posts()) : ?>

          <div class="news-posts ajax-container">

              <?php while (have_posts()) : the_post(); ?>

                  <?php if (get_field('post_template') == 'with-image') {

                      get_template_part('template-parts/content', get_post_format());
                  } else if (get_field('post_template') == 'no-image') {

                      get_template_part('template-parts/content-without-image', get_post_format());

                  } else if (get_field('post_template') == 'quote') {

                      get_template_part('template-parts/content-quote', get_post_format());
                  }; ?>

              <?php endwhile; ?>

              <?php if ($wp_query->max_num_pages > 1) : ?>

                <div class="load-more-btn load-btn-wrp">
              <span id="news_loadmore" class="more-btn js-load-news"
                    data-max-page="<?php echo $wp_query->max_num_pages ?>"
                    data-current-page="<?php echo $post_pages; ?>">
                <span class="circle-btn"><span></span><span></span></span>
                <span>Load more news</span>
              </span>
                </div>

              <?php endif; ?>

          </div>

        <?php endif; ?>

    </div>
  </main>

<?php get_template_part('template-parts/subscribe') ?>
<?php get_footer('inner');
