<?php global $flex_block; ?>
<?php if (!empty($flex_block['advantages']))
{ ?>
    <section class="flexible-section flexible-advantages align-c">
        <?php if (!empty($flex_block['title']))
        { ?>
            <h2 class="flexible-caption"><?php echo $flex_block['title']; ?></h2>
        <?php } ?>
        <ul class="flexible-list flexible-advantage-list align-c">
            <?php foreach ($flex_block['advantages'] as $advantage)
            { ?>
                <li>
                    <div class="heading-wrapper">
                        <span class="icon-holder">
                            <?php if (!empty($advantage['image']))
                            { ?>
                                <img class="lozad" src="image.svg" data-src="<?php echo $advantage['image']; ?>" alt="<?php echo (!empty($advantage['subtitle'])) ? $advantage['subtitle'] : ''; ?>">
                              <noscript aria-hidden="true"><img src="<?php echo $advantage['image']; ?>" alt="<?php echo (!empty($advantage['subtitle'])) ? $advantage['subtitle'] : ''; ?>"></noscript>
                            <?php }
                            else
                            { ?>
                                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#advantages-1"></use></svg>
                            <?php } ?>
                        </span>
                        <h4 class="advantage-header"><?php echo (!empty($advantage['subtitle'])) ? $advantage['subtitle'] : ''; ?></h4>
                    </div>
                    <p><?php echo (!empty($advantage['text'])) ? $advantage['text'] : ''; ?></p>
                </li>
            <?php } ?>
        </ul>
    </section>
<?php } ?>

