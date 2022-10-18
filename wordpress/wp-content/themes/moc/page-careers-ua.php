<?php
/*
 * Template Name: Careers-UA
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300,400,500&subset=cyrillic');
</style>

<main id="main" class="inner-page careers-page hide-estimate">
    <section class="intro wrapped-section">
        <h1><?php _e('Ми шукаємо', 'moc'); ?></h1>
        <p class="section-description align-l"><?php the_field('we_are_hiring_text', $post->ID); ?></p>
    </section>

    <section class="careers-openings wrapped-section">
        <?php $args = array(
            'post_type' => 'career_ua',
            'posts_per_page' => -1,
            'orderby' => 'menu_order, date',
            'order' => 'ASC',
            'post_status' => 'publish'
        );
        $careers = get_posts( $args );

        if ( !empty( $careers ) ) { ?>
            <ul class="grid-list inline-grid flex-grid careers-list">
                <?php foreach( $careers as $career ) { ?>
                    <li class="grid-list__item inline-grid__item flex-grid__item careers-list__item">
                        <a class="careers-item__link" href="<?php the_permalink( $career->ID ); ?>">
                            <?php
                            $career_img = get_field('career_image', $career->ID);
                            $career_img = $career_img ?: get_template_directory_uri() . '/images/careers/default.svg';
                            $career_background = get_field('career_background', $career->ID);
                            $career_background = $career_background ?: get_template_directory_uri() . '/images/careers/default_bg.png';
                            ?>
                            <span class="careers-item__heading" style="background-image: url(<?php echo $career_background; ?>)"></span>
                            <img class="careers-item__image" src="<?php echo $career_img; ?>"
                                 alt="<?php echo $career->post_title; ?>" width="100" height="100">
                            <h2><?php echo $career->post_title; ?></h2>
                            <div class="careers-requirements__wrapper">
                                <?php echo get_list_by_line_break( get_field('from_you', $career->ID) ); ?>
                            </div>
                            <span class="read-more" href="<?php the_permalink( $career->ID ); ?>"><?php _e( 'Детальніше', 'moc' ); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>

        <?php } else { ?>
        <?php } ?>
    </section>

    <section class="apply-job wrapped-section contact-form-wrapper" id="apply-job">
        <h2 class="section-heading js-hide-after-submit"><?php _e( 'Зроби свій відгук', 'moc' ); ?></h2>
        <p class="form-description align-c js-hide-after-submit">
            <?php $apply_job = empty( $careers ) ? 'apply_job_empty' : 'apply_job';
            the_field( $apply_job, $post->ID ); ?>
        </p>
        <div class="gform_wrapper"><?php echo do_shortcode('[contact-form-7 id="5411" title="Careers Ua"]'); ?></div>
    </section>

</main>

<?php get_footer(); ?>
