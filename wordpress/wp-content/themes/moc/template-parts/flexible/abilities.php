<?php global $flex_block; ?>
<?php if (!empty($flex_block['abilities'])) { ?>
    <section class="flexible-section abilities">
        <?php if (!empty($flex_block['title'])) { ?>
            <h2 class="flexible-caption"><?php echo $flex_block['title']; ?></h2>
        <?php } ?>
        <ul class="flexible-list abilities-list">
            <?php foreach ($flex_block['abilities'] as $ability) { ?>
                <li class="ability">
                    <?php
                    $background_img = (!empty($ability['background'])) ? 'background-image: url(' . $ability['background'] . ')' : '';
                    ?>
                    <div class="item-container">
                        <?php if (!empty($ability['background'])) { ?>
                            <img class="lozad icon-bg" src="background.svg" data-src="<?php echo $ability['background']; ?>" alt="ability"/>
                          <noscript aria-hidden="true"><img class="icon-bg" src="<?php echo $ability['background']; ?>" alt="ability"/></noscript>
                        <?php } ?>
                        <span class="icon-holder ecommerce-chatbot">
                          <?php if (!empty($ability['icon'])) { ?>
                              <img class="lozad" src="icon.svg" data-src="<?php echo $ability['icon']; ?>" alt="<?php echo (!empty($ability['title'])) ? $ability['title'] : ''; ?>">
                            <noscrpt><img src="<?php echo $ability['icon']; ?>" alt="<?php echo (!empty($ability['title'])) ? $ability['title'] : ''; ?>"></noscrpt>
                          <?php } else { ?>
                              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xlink:href="#ecommerce-chatbot"></use></svg>
                          <?php } ?>
                      </span>
                    </div>
                    <p class="ability-text"><b><?php echo (!empty($ability['title'])) ? $ability['title'] : ''; ?></b>
                        <?php echo (!empty($ability['description'])) ? $ability['description'] : ''; ?>
                    </p>

                </li>
            <?php } ?>
        </ul>
    </section>
<?php } ?>
