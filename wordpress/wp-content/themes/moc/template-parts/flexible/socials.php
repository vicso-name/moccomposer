<?php global $flex_block; ?>
<?php if (!empty($flex_block['socials']))
{ ?>
    <section class="flexible-section flexible-social align-c">
        <?php if (!empty($flex_block['title']))
        { ?>
            <h2 class="flexible-caption small-font-caption"><?php echo $flex_block['title']; ?></h2>
        <?php } ?>
        <ul class="flexible-list flexible-social-list">
            <?php foreach ($flex_block['socials'] as $social)
            { ?>
                <li>
                <span class="icon-holder"><?php if (!empty($social['image']))
                    { ?>
                        <img class="lozad" src="image.svg" data-src="<?php echo $social['image']; ?>" alt="<?php echo (!empty($social['text'])) ? $social['text'] : ''; ?>">
                        <img src="<?php echo $social['image']; ?>" alt="<?php echo (!empty($social['text'])) ? $social['text'] : ''; ?>">
                    <?php } ?></span>
                    <p><?php echo (!empty($social['text'])) ? $social['text'] : ''; ?></p>
                </li>
            <?php } ?>

        </ul>
    </section>
<?php } ?>
