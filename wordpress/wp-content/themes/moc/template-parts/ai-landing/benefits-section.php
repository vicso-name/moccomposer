<section class="use-cases-benefits moc-section">
    <div class="moc-inner">
        <h2 class="use-cases-benefits__title section-title"><?php the_field('why_use_case_section_title'); ?></h2>
        <?php if (have_rows('use_cases_benefits_list')): ?>
            <div class="use-cases-benefits__list">
                <?php while (have_rows('use_cases_benefits_list')) : the_row(); ?>

                    <div class="use-cases-benefits__item">
                        <div class="use-cases-benefits__icon-wrap">
                            <img src="<?php the_sub_field('item_icon'); ?>" alt="" class="use-cases-benefits__icon">
                        </div>
                        <h3 class="use-cases-benefits__item-title"><?php the_sub_field('item_title'); ?></h3>
                        <p class="use-cases-benefits__item-description"><?php the_sub_field('item_info'); ?></p>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>