<?php global $flex_block; ?>
<section class="flexible-section details-block align-l">
    <?php if (!empty($flex_block['text']))
    { ?>
        <div class="description-block align-l">
            <div>
                <?php echo $flex_block['text']; ?>
            </div>
        </div>
    <?php } ?>
</section>
