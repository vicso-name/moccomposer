<?php global $priority_service; ?>
<section class="services" >
<!--    --><?php //get_template_part('template-parts/services/services-svg'); global $priority_service;?>
    <h1 class="responsive-header"><?php the_field('services_title'); ?></h1>
    <ul class="services-list">

        <?php
        $flex_content = get_field('homepage_service');
        if(!empty($flex_content)){ ?>

            <?php foreach($flex_content as $flex_block) { ?>
                <?php if ($priority_service == $flex_block['link']) {
                ?>
                <li class="<?php echo $flex_block['icon_class']; ?>">
                    <a class="info" id="<?php echo $flex_block['icon_class']; ?>-main" href="<?php echo $flex_block['link']; ?>">
                        <span class="icon-holder-service">
                            <svg>
                                <use xlink:href="<?php echo get_stylesheet_directory_uri() ?>/images/services/services.svg#icon-services__<?php echo $flex_block['icon_class']; ?>"></use>
                            </svg>
                        </span>
                        <h3 class="service-caption"><?php echo $flex_block['title']; ?></h3>
                        <p><?php echo $flex_block['text']; ?></p>
                    </a>
                </li>
            <?php  }} ?>

            <?php foreach($flex_content as $flex_block){
                if ($priority_service != $flex_block['link']) {?>
                <li class="<?php echo $flex_block['icon_class']; ?>">
                    <a class="info" id="<?php echo $flex_block['icon_class']; ?>-main" href="<?php echo $flex_block['link']; ?>">
                            <span class="icon-holder-service">
                                <svg>
                                    <use xlink:href="<?php echo get_stylesheet_directory_uri() ?>/images/services/services.svg#icon-services__<?php echo $flex_block['icon_class']; ?>"></use>
                                </svg>
                            </span>
                        <h3 class="service-caption"><?php echo $flex_block['title']; ?></h3>
                        <p><?php echo $flex_block['text']; ?></p>
                    </a>
                </li>

            <?php } } ?>
        <?php }?>
    </ul>

</section>