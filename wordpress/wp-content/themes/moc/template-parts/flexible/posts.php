<?php global $flex_block; ?>
<?php if (!empty($flex_block['posts']))
{ ?>
    <section class="flexible-section chatbot-blog">
        <?php if (!empty($flex_block['title']))
        { ?>
            <h3 class="blog-list-caption"><?php echo $flex_block['title']; ?></h3>
        <?php } ?>
        <ul class="flexible-list flexible-blog-list">
            <?php
            foreach ($flex_block['posts'] as $blog_post)
            {
                ?>
                <li>
                    <a class="flexible-blogpost-link" href="<?php the_permalink($blog_post['blog_post']->ID) ?>"target="_blank">
                        <h4 class="flexible-blogpost-title"><?php echo (!empty($blog_post['title'])) ? $blog_post['title'] : ''; ?></h4>
                        <p class="blogpost-short-content"><?php echo (!empty($blog_post['text'])) ? $blog_post['text'] : ''; ?></p>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </section>
<?php } ?>
