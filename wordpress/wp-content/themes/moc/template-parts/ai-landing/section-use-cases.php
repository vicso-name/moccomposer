<section class="moc-section grey-section ai-use-cases">
    <div class="moc-inner">

        <h2 class="ai-use-cases__title"><?php the_field('ai_use_cases_title'); ?></h2>

        <div class="ai-use-cases__info">

            <?php
            $rows = get_field('use_cases_list');

            if ($rows) {
                echo '<ul class="ai-use-cases__tabs-caption js-tabs-caption">';
                foreach ($rows as $row) { ?>
                    <li class="ai-use-cases__tabs-caption-item">
                        <div class="ai-use-cases__tabs-caption-title js-title-action"><?php echo $row['item_title']; ?></div>
                    </li>
                <?php }
                echo '</ul>';
            }

            if ($rows) {
                echo '<ul class="ai-use-cases__list js-cases-tabs">';
                foreach ($rows as $row) { ?>
                    <li class="ai-use-cases__item js-cases-tabs-content">
                        <div class="ai-use-cases__item-inner">
                            <div class="ai-use-cases__item-title js-title-action"><?php echo $row['item_title']; ?></div>

                            <div class="ai-use-cases__content js-cases-content">
                                <div class="ai-use-cases__additional-info">
                                    <?php if ($row['ai_info_value']) : ?>
                                        <span class="ai-use-cases__additional-info-value"><?php echo $row['ai_info_value']; ?></span>
                                    <?php endif; ?>
                                    <p class="ai-use-cases__additional-info-description"><?php echo $row['info_description']; ?>
                                        <span class="ai-use-cases__accent-element">*</span></p>
                                </div>

                                <div class="ai-use-cases__main-info">
                                    <?php echo $row['item_description']; ?>
                                </div>

                                <?php if ($row['ai_item_source']) : ?>

                                    <div class="ai-use-cases__source-info">
                                        <span class="ai-use-cases__source-title">*Source: </span>
                                        <a class="ai-use-cases__source-name"
                                           href="<?php echo $row['ai_item_source']['url']; ?>"
                                           target="_blank"><?php echo $row['ai_item_source']['title']; ?></a>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php }
                echo '</ul>';
            } ?>

        </div>

    </div>
</section>