<section class="use-cases-values moc-section">
    <?php if (have_rows('use_cases_values_list')): ?>
        <div class="use-cases-values__list page-container moc-inner">
            <?php while (have_rows('use_cases_values_list')) : the_row(); ?>
                <div class="use-cases-values__item">
                    <span class="use-cases-values__value-title"><?php the_sub_field('item_value'); ?></span>
                    <p class="use-cases-values__value-description"><?php the_sub_field('item_descr'); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>