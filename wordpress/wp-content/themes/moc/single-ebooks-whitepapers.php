<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<?php get_template_part('template-parts/webinars/webinars', 'svg'); ?>
<?php
global $post;

//$form = get_field('ebooks_form');
$pdf_link = get_field('ebooks_pdf_link');

?>

<main id="main" class="ebooks-page">

    <div class="hero-ebooks">

        <div class="ebooks-bg-wrapper">

            <?php
            $desktop_image = get_field('ebooks_main_image');
            $desktop_image_url = $desktop_image['url'];
            $desktop_image_webp = get_field('ebooks_main_image_webp');
            $desktop_image_webp_url = $desktop_image_webp['url'];
            ?>

            <picture>
                <source srcset="<?php echo $desktop_image_webp_url; ?>" type="image/webp">
                <source srcset="<?php echo $desktop_image_url; ?>" type="image/png">
                <img class="ebooks-bg-image" src="<?php echo $desktop_image_url; ?>" alt="">
            </picture>
        </div>

        <div class="hero-ebooks__intro">
            <div class="page-container">
                <div class="hero-ebooks__text-part">
                    <span class="hero-ebooks__label">eBook</span>

                    <h1 class="hero-ebooks__title ebooks-title"><?php the_title(); ?></h1>

                    <span class="hero-ebooks__date">
                             <?php echo get_the_date('d M Y'); ?>
                    </span>

                </div>
            </div>

        </div>
    </div>


    <div class="ebooks-block page-container">

            <div class="get-ebook-form" id="get-ebook">
                <div class="contact-form-wrapper">
                    <div class="gform_wrapper" id="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="40887" title="Get the Ebook"]'); ?>
                    </div>

                    <div class="ebook-info">
                        <h2 class="ebook-info__title">Thanks for sending the form!</h2>

                        <div class="ebook-info__image-wrap">
                            <img class="ebook-info__image" src="/wp-content/themes/moc/images/e-books/form-ebook.svg" alt="View the eBook">
                        </div>

                            <a class="ebook-info__link" href="<?php echo $pdf_link?>" target="_blank">
                                View the eBook
                            </a>
                    </div>

                </div>
            </div>

        <div class="ebooks-content content-block">
          <?php the_content(); ?>
        </div>

    </div>

</main>

<?php get_footer(); ?>
