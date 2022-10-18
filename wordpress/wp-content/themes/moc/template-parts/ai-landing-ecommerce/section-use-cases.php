<section class="moc-section grey-section ai-use-cases" id="use-cases">
    <div class="moc-inner">

        <h2 class="ai-use-cases__title"><?php the_field('ai_use_cases_title'); ?></h2>

        <div class="ai-use-cases__info">

            <?php
            $rows = get_field('use_cases_list');

            if ($rows) {
                echo '<ul class="ai-use-cases__tabs-caption js-tabs-caption">';
                foreach ($rows as $row) { ?>
                    <li class="ai-use-cases__tabs-caption-item">
                        <div class="ai-use-cases__tabs-caption-title js-title-action"><?php echo $row['tab_name']; ?></div>
                    </li>
                <?php }
                echo '</ul>';
            }

            if ($rows) {
                echo '<ul class="ai-use-cases__list js-cases-tabs">';
                foreach ($rows as $row) { ?>
                    <li class="ai-use-cases__item js-cases-tabs-content">
                        <div class="ai-use-cases__item-title js-title-action">
                            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3635 12.0541L9.42782 18.5455L7.79793 17.02L13.0922 12.0541L7.79793 7.08822L9.42782 5.56275L16.3635 12.0541Z" fill="#333333"/>
                                <mask id="mask0_816_4230" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="7" y="5" width="10" height="14">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3635 12.0541L9.42782 18.5455L7.79793 17.02L13.0922 12.0541L7.79793 7.08822L9.42782 5.56275L16.3635 12.0541Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_816_4230)">
                                    <rect width="24" height="24" transform="matrix(1 0 0 -1 0 24)" fill="#333333"/>
                                </g>
                            </svg>
                            <?php echo $row['tab_name']; ?>
                        </div>


                        <div class="ai-use-cases__item-inner <?php echo $row['item_css_class'] ?>">

                            <div class="ai-use-cases__content js-cases-content">
                                <div class="ai-use-cases__item-image">
                                    <img class="lozad" data-src="<?php echo $row['item_image']; ?>" alt="">
                                </div>

                                <div class="ai-use-cases__text-part">
                                    <div class="ai-use-cases__inner-item-title">
                                        <?php echo $row['item_title']; ?>
                                    </div>

                                    <div class="ai-use-cases__main-info">
                                        <?php echo $row['item_description']; ?>
                                    </div>

                                    <div class="ai-use-cases__additional-info">
                                        <?php if ($row['ai_info_value']) : ?>
                                            <span class="ai-use-cases__additional-info-value"><?php echo $row['ai_info_value']; ?></span>
                                        <?php endif; ?>
                                        <p class="ai-use-cases__additional-info-description"><?php echo $row['info_description']; ?></p>
                                    </div>

                                    <?php if ($row['ai_item_source']) : ?>

                                        <div class="ai-use-cases__source-info">
                                            <span class="ai-use-cases__source-title">Source: </span>
                                            <a class="ai-use-cases__source-name"
                                               href="<?php echo $row['ai_item_source']['url']; ?>"
                                               target="_blank"><?php echo $row['ai_item_source']['title']; ?></a>
                                        </div>

                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </li>
                <?php }
                echo '</ul>';
            } ?>

        </div>

    </div>
</section>