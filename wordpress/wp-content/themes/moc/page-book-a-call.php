<?php
/**
 * Template Name: Book a call
 **/
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>

<main id="main" class="book-call-page">
    <div class="page-container">
        <div class="page-headline mobile-block">
            <h1 class="page-headline__title"><?php echo get_the_title() ?></h1>
            <p class="page-headline__description"><?php the_field('book_main_description'); ?></p>
        </div>

        <div class="book-call-page__info-wrapper">
            <div class="book-call-page__info">
                <div class="page-headline desktop-block">
                    <h1 class="page-headline__title"><?php echo get_the_title() ?></h1>
                    <p class="page-headline__description"><?php the_field('book_main_description'); ?></p>
                </div>

                <h2 class="explanation-main-title"><?php the_field('explanation_title'); ?></h2>

                <?php
                $rows = get_field('explanation_info');

                if ($rows) {
                    echo '<ul class="explanation-list">';
                    foreach ($rows as $row) { ?>
                        <li class="explanation-item">
                            <h3 class="explanation-title"><?php echo $row['item_title']; ?></h3>
                            <p class="explanation-description"><?php echo $row['item_description']; ?></p>
                        </li>
                    <?php }
                    echo '</ul>';

                } ?>
            </div>

            <div class="calendly-embed">

                <!-- Calendly inline widget begin -->

                    <?php
                        $calendly_configuration = get_field('calendly_configuration');
                        if($calendly_configuration){
                            echo $calendly_configuration;
                        }
                    ?>

                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>

                <!-- Calendly inline widget end -->

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

