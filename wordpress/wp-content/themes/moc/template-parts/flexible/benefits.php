<?php global $flex_block; ?>
<?php if (!empty($flex_block['benefits']))
{ ?>
    <section class="flexible-section chatbot-benefits align-c">
        <?php if (!empty($flex_block['title']))
        { ?>
            <h2 class="flexible-caption"><?php echo $flex_block['title']; ?></h2>
        <?php } ?>

        <ul class="chatbots-list chatbot-benefit-list align-c">
            <?php foreach ($flex_block['benefits'] as $benefit)
            { ?>
                <li>
                    <span class="icon-holder">
                    <?php if (!empty($benefit['image']))
                    { ?>
                        <img class="lozad" src="image.svg" data-src="<?php echo $benefit['image']; ?>" alt="<?php echo (!empty($benefit['text'])) ? $benefit['text'] : ''; ?>">
                      <noscript aria-hidden="true"><img src="<?php echo $benefit['image']; ?>" alt="<?php echo (!empty($benefit['text'])) ? $benefit['text'] : ''; ?>"></noscript>
                    <?php }
                    else
                    { ?>
                        <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#benefits-1"></use></svg>
                    <?php } ?>
                    </span>
                    <p><?php echo (!empty($benefit['text'])) ? $benefit['text'] : ''; ?></p>
                </li>
            <?php } ?>
        </ul>
    </section>
<?php } ?>
