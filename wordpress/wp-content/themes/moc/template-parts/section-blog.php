<section class="blog">

    <h1><?php the_field('blog_title', $post->ID); ?></h1>

    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'post_status' => 'publish',
        'category_name' => 'blog'
    );
    $blog_posts = get_posts( $args );

    if ( !empty( $blog_posts ) ) { ?>
        <ul class="list">

            <?php foreach ( $blog_posts as $blog_post ) { ?>

                <li>

                    <a href="<?php echo $blog_post->guid; ?>">

                        <?php
                        $img_src = get_the_post_thumbnail_url($blog_post->ID, 'blog_min');
                        $date = DateTime::createFromFormat('!Y-m-d H:i:s', $blog_post->post_date);

                        if($blog_post->author_name)
                            $author_name = $blog_post->author_name;
                        else
                            $author_name = $blog_post->display_name != '' ? $blog_post->display_name : $blog_post->user_login;
                        ?>

                        <img src="<?php echo $img_src; ?>" alt="<?php echo $blog_post->post_title; ?>" width="640" height="360">

                        <h3><?php echo $blog_post->post_title; ?></h3>

                        <p><?php echo sprintf( __('By %s', 'moc'), $author_name ) . ', ' . $date->format('F d Y'); ?></p>

                    </a>

                </li>

            <?php } ?>
        </ul>

    <?php } ?>

    <a href="<?php the_field('blog_url'); ?>" class="read-more white" id="blog-main"><?php _e('Blog', 'moc'); ?></a>

</section>