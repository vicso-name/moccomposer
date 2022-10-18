<?php
global $post;
$date = get_field('webinar_date', false, false);
$date = new DateTime($date);
$newDate = $date->format('j M Y');

$image = get_field('webinar_main_image');
$image_url = $image['url'];

?>

<div class="upcoming-webinar"
     style="background-image: linear-gradient(rgba(0,0,0, .2), rgba(0,0,0, .2));">

    <div class="webinar-bg-wrapper">

        <?php
        $desktop_image = get_field('webinar_main_image');
        $desktop_image_url = $desktop_image['url'];
        $desktop_image_webp = get_field('webinar_main_image_webp');
        $desktop_image_webp_url = $desktop_image_webp['url'];

        $tablet_image = get_field('webinar_main_image_tablet');
        $tablet_image_url = $tablet_image['url'];
        $tablet_image_webp = get_field('webinar_main_image_tablet_webp');
        $tablet_image_webp_url = $tablet_image_webp['url'];

        $mobile_image = get_field('webinar_main_image_mobile');
        $mobile_image_url = $mobile_image['url'];
        $mobile_image_webp = get_field('webinar_main_image_mobile_webp');
        $mobile_image_webp_url = $mobile_image_webp['url'];
        ?>

        <picture>
            <source media="(min-width: 1025px)" srcset="<?php echo $desktop_image_webp_url; ?>" type="image/webp">
            <source media="(min-width: 1025px)" srcset="<?php echo $desktop_image_url; ?>" type="image/png">

            <source media="(max-width: 500px)" srcset="<?php echo $mobile_image_webp_url; ?>"  type="image/webp">
            <?php if ($mobile_image) { ?>
                <source media="(max-width: 500px)" srcset="<?php echo $mobile_image_url; ?>"  type="image/jpeg">
            <?php } ?>

            <source media="(max-width: 1024px)" srcset="<?php echo $tablet_image_webp_url; ?>" type="image/webp">
            <?php if ($tablet_image) { ?>
                <source media="(max-width: 1024px)" srcset="<?php echo $tablet_image_url; ?>" type="image/jpeg">
            <?php } ?>

            <img class="webinar-bg-image" src="<?php echo $desktop_image_url; ?>" alt="">
        </picture>
    </div>

    <a href="<?php echo get_permalink(); ?>" class="webinar-link"></a>

    <div class="upcoming-webinar__info">
            <span class="upcoming-webinar__info-item">
                <?php echo $newDate; ?>
            </span>
        <span class="upcoming-webinar__info-item">Upcoming</span>
        <?php
        $terms = get_the_terms($post->ID, 'industries');

        if ($terms) {
            echo '<ul class="category-list">';

            foreach ($terms as $term) {
                echo '<li class="category-item upcoming-webinar__info-item">' . $term->name . '</li>';
            }

            echo "</ul>";
        }

        ?>
    </div>

    <div class="post-info">
        <span class="upcoming-webinar__label">Upcoming live Webinar</span>

        <a href="<?php echo get_permalink(); ?>" class="webinar-permalink">
            <h3 class="upcoming-webinar__title"><?php the_title(); ?></h3>
        </a>


        <a href="<?php echo get_permalink(); ?>" class="post-link">
            <span>Watch the Webinar</span>

            <svg class='arrow-left'>
                <use xlink:href='#arrow-left-white'></use>
            </svg>
        </a>
    </div>

</div>
