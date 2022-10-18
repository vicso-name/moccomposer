<section class="airports-information moc-section">
    <div class="moc-inner">
        <?php if (have_rows('section_info_airports')): ?>
            <?php while (have_rows('section_info_airports')) : the_row(); ?>

                <div class="airports-information__row">
                    <h3 class="airports-information__item-title mobile-title"><?php the_sub_field('item_title'); ?></h3>
                    <div class="airports-information__image-wrap">
                        <img src="<?php the_sub_field('item_image'); ?>" alt=""
                             class="airports-information__item-image">
                    </div>
                    <div class="airports-information__text-part">
                        <h3 class="airports-information__item-title desktop-title"><?php the_sub_field('item_title'); ?></h3>
                        <div class="airports-information__item-text"><?php the_sub_field('item_text'); ?></div>


                        <?php if (get_sub_field('item_source')) { ?>
                            <div class="airports-information__item-source">
                                <span>*Source:</span>
                                <span class="source-name"><?php the_sub_field('item_source'); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>