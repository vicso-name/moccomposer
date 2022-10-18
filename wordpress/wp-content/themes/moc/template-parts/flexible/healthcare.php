<?php global $flex_block; ?>
<?php if (!empty($flex_block['healthcare']))
{ ?>
    <section class="flexible-section abilities healthcare">
        <?php if (!empty($flex_block['title']))
        { ?>
            <h2 class="flexible-caption"><?php echo $flex_block['title']; ?></h2>
        <?php } ?>
        <ul class="flexible-list abilities-list healthcare-list">
            <?php foreach ($flex_block['healthcare'] as $healthcare_item)
            { ?>
                <li class="healthcare-item">
                    <?php
                    $background_img = (!empty($healthcare_item['background'])) ? 'background-image: url('.$healthcare_item['background'].')' : '';
                    ?>
                    <div class="item-container">
                        <span class="icon-holder ecommerce-chatbot">
                          <?php if (!empty($healthcare_item['icon']))
                          { ?>
                              <img src="<?php echo $healthcare_item['icon']; ?>" alt="<?php echo (!empty($healthcare_item['title'])) ? $healthcare_item['title'] : ''; ?>">
                          <?php } ?>
                        </span>
                    </div>
                    <p class="ability-text"><b><?php echo (!empty($healthcare_item['title'])) ? $healthcare_item['title'] : ''; ?></b>
                        <?php echo (!empty($healthcare_item['description'])) ? $healthcare_item['description'] : ''; ?>
                    </p>

                </li>
            <?php } ?>
        </ul>
    </section>
<?php } ?>
