<?php global $flex_block;
if (!empty($flex_block['image']))
{ ?>
<section class="flexible-section details-block align-c">
    <div class="description-holder">
        <div class="description-block">
            <?php if (!empty($flex_block['link']))
            { ?>
                <a href="<?php echo $flex_block['link'] ?>" target="_blank">
                    <img class="lozad flexible-image single-image" src="image.svg" data-src="<?php echo $flex_block['image']; ?>" alt="<?php echo $flex_block['title']; ?>">
                    <noscript aria-hidden="true"><img class="flexible-image single-image" src="<?php echo $flex_block['image']; ?>" alt="<?php echo $flex_block['title']; ?>"></noscript>
                </a>
            <?php } else { ?>
                <img class="lozad flexible-image single-image" src="image.svg" data-src="<?php echo $flex_block['image']; ?>" alt="<?php echo $flex_block['title']; ?>">
              <noscript aria-hidden="true"><img class="flexible-image single-image" src="<?php echo $flex_block['image']; ?>" alt="<?php echo $flex_block['title']; ?>"></noscript>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>