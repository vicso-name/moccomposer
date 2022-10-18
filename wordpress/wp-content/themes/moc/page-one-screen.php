<?php
/*
 * Template Name: One Screen Landing
 * */
?>
<?php get_template_part('template-parts/head'); ?>
<?php
function ak_convert_hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';

    if (empty($color))
        return $default;

    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);

    elseif (strlen($color) == 3)
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);

    else
        return $default;

    $rgb = array_map('hexdec', $hex);

    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;

        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }
    return $output;
}
?>
<style>
    <?php
        $flex_content = get_field('one_screen_landing_projects');
            if(!empty($flex_content)){
                foreach($flex_content as $flex_block) { ?>
    .<?php echo $flex_block['block_class']; ?> .tooltip-block {
        background-color: <?php echo $flex_block['background']; ?>;
    <?php
    $hex = $flex_block['background'];
    $rgba = ak_convert_hex2rgba($hex, 0.4); ?>
        box-shadow: 0 30px 62px <?php echo $rgba; ?>;
    }
    .<?php echo $flex_block['block_class']; ?>  .tooltip-block::after {
        border-top-color:<?php echo $flex_block['background']; ?>;
    }
    <?php       }
            }?>
</style>

<main id="main" class="page-one-screen">
    <header class="one-screen-header">
        <?php get_template_part('template-parts/page', 'one-screen-svg'); ?>
        <a class="logo one-page-logo" href="<?php echo get_site_url(); ?>">
            <svg class="fixed-logo"><use xlink:href="#main-logo"></use></svg>
            <svg class="text-logo"><use xlink:href="#text-logo"></use></svg>
        </a>
    </header>
    <section class="one-screen-section one-screen-top">

        <h1 class="one-screen-heading"><?php  the_field('main_heading'); ?></h1>
        <div><p class="one-screen-description"><?php  the_field('main_description'); ?></p></div>
        <?php
        $flex_content = get_field('one_screen_landing_projects');
        if(!empty($flex_content)){ ?>
            <ul class="one-screen-project-list">

                <?php foreach($flex_content as $flex_block) { ?>


                    <li class="one-screen-item <?php echo $flex_block['block_class']; ?>">
                        <div class="tooltip-hover">
                            <img class="tooltip-hover-img" src="<?php echo $flex_block['logo']; ?>" alt="<?php echo $flex_block['block_class']; ?>" />

                            <div class="tooltip-block">
                                <?php
                                $image_id =  $flex_block['image'];
                                $image = reset( wp_get_attachment_image_src($image_id, '') );
                                ?>
                                <picture>
                                    <source media="(min-width: 768px)"
                                            srcset="<?php echo $image; ?> 2x">
                                    <img class="tooltip-image" src="<?php echo $image; ?>" alt="<?php echo $flex_block['img_alt']; ?>" />
                                </picture>

                                <p class="tooltip-description"><?php echo $flex_block['description']; ?></p>
                            </div>

                        </div>
                    </li>

                <?php } ?>
            </ul>
        <?php } ?>
    </section>
    <section class="contact-form-wrapper one-screen-section form-<?php the_field('form_id') ?>">
        <?php echo   do_shortcode('[gravityform id=' . get_field('form_id') . ' title=false description=false ajax=true]'); ?>
    </section>
</main>
<?php get_footer('one-screen'); ?>
