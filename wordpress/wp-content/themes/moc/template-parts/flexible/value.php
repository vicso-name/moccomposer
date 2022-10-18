<?php global $flex_block; ?>
<?php
$background_img = (!empty($flex_block['background_image'])) ? 'background-image: url('.$flex_block['background_image'].')' : '';
$background_color = (!empty($flex_block['background_color'])) ? 'background-color: ' . $flex_block['background_color'] : '';
$btn_color = (!empty($flex_block['background_color'])) ? 'color: ' . $flex_block['background_color'] : '';
?>
<section class="flexible-section flexible-invite align-c">
    <div class="inner-wrapper" style="<?php echo $background_img; ?>">
        <h2 class="white-text caption"><?php echo $flex_block['text']?></h2>
        <a href="<?php echo $flex_block['action_link']?>"
           target="_blank" class="messenger-btn" style="<?php echo $btn_color; ?>">
            <svg class="messenger-btn-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-messenger"></use></svg>
            <?php echo $flex_block['action_text']?>
        </a>
    </div>
</section>
