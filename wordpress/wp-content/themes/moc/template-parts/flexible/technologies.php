<?php global $flex_block; ?>
<?php if (!empty($flex_block['technologies']))
{ ?>
<section class="flexible-section details-block align-c <?php the_field('services_page_li_class', $service); ?>">
    <div class="tech-holder">
        <div class="align-l">
            <?php if (!empty($flex_block['title']))
            { ?>
            <h3 class="tech-caption"><?php echo $flex_block['title']; ?></h3>
            <?php } ?>

            <ul class="technologies-list">
                <?php
                foreach ($flex_block['technologies'] as $technology)
                { ?>

                    <li>
                        <span class="icon-holder">
                            <img class="lozad" src="image.svg" data-src="<?php the_field('image', $technology['technology']); ?>" alt="<?php echo $technology['technology']->name; ?>">
                            <noscript aria-hidden="true"><img src="<?php the_field('image', $technology['technology']); ?>" alt="<?php echo $technology['technology']->name; ?>"></noscript>
                        </span>
                        <span class="tech-name"><?php echo $technology['technology']->name; ?></span>
                    </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</section>
<?php } ?>
