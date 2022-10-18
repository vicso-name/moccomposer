<?php global $flex_block; ?>
<section class="heading-block align-c">
    <div class="">

                <?php if (!empty($flex_block['image']))
                { ?>
                <span class="icon-holder-service">
                    <img src="<?php echo $flex_block['image']; ?>" alt="<?php echo $flex_block['title']; ?>">
                </span>
                <?php } ?>

        <?php if (!empty($flex_block['title']))
        { ?>
            <h1 class="heading-1"><?php echo $flex_block['title']; ?></h1>
        <?php } ?>
    </div>
</section>
<section class="flexible-section details-block align-c">
    <div class="description-holder">
        <div class="description-block align-l">
            <?php if (!empty($flex_block['text']))
            {  echo $flex_block['text']; } ?>

            <?php if (!empty($flex_block['action_text']))
            { ?>
                <div class="buttons-block flexible-buttons-block">
                    <a href="<?php echo get_site_url(null, 'contacts'); ?>" class="get-a-quote-link" data-get-in-touch>
                        <?php echo $flex_block['action_text']; ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</section>
