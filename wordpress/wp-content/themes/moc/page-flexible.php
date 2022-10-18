<?php
/*
 * Template Name: Flexible Content
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php //get_template_part('template-parts/chatbots-svg'); ?>
<main id="main" class="page-services">
    <?php
    $flex_content = get_field('flex_content');
    $flex_content_2 = get_field('flex_content_2');
    $flex_content = array_merge(
        ((!empty($flex_content) && is_array($flex_content)) ? $flex_content : []),
        ((!empty($flex_content_2) && is_array($flex_content_2)) ? $flex_content_2 : [])
    );
    $presented_types = [];
    if (!empty($flex_content)) {
        foreach ($flex_content as $flex_block) {

            $type = $flex_block['acf_fc_layout'];
            get_template_part('template-parts/flexible/' . $type);
            $presented_types[] = $type;

        }
    }
    ?>
    <?php if (is_page(1562)): ?>
    <section class="moc-section moc-contact-section contact-form-wrapper wide-form-wrapper" id="web-form-wrapper">
        <h2 class="js-hide-after-submit section-heading">Time to start the conversation</h2>
        <p class="section-description centered-description js-hide-after-submit">
                    <span class="desktop-only">Want to discuss a project or simply ask a question?<br/>
                    </span> Fill out the form below and we’ll be in touch within 24 hours.</p>

        <div class="moc-inner gform_wrapper" id="web-page-form">
            <?php echo do_shortcode('[contact-form-7 id="26525" title="Web Page Form"]'); ?>
        </div>
    </section>
    <?php get_template_part('template-parts/zoho-questions-popup'); ?>
</main>
<?php endif; ?>

<?php get_footer(''); ?>
