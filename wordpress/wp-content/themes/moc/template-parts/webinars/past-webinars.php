<?php
global $post;
$date = get_field('webinar_date', false, false);
$date = new DateTime($date);
$newDate = $date->format('F d, Y');

$image = get_field('webinar_main_image');
$size = 'webinars-preview-img';
$thumbnail = $image['sizes'][$size];
?>

<div class="post-item past-webinar">

    <div class="past-webinar__img-wrap"
         style="background-image: linear-gradient(rgba(0,0,0, .3), rgba(0,0,0, .3)), url('<?php echo $thumbnail; ?>')">

        <div class="past-webinar__icon-wrap">
            <svg class='webinar-play-icon'>
                <use xlink:href='#webinar-play-icon'></use>
            </svg>
        </div>
        <a href="<?php echo get_permalink(); ?>" class="past-webinar__link"></a>
    </div>

    <div class="post-info">
        <div class="webinar-post-meta">
            <a href="<?php echo get_permalink(); ?>" class="webinar-link"></a>
            <span class="webinar-post-meta__info-item">
                <?php echo $newDate; ?>
            </span>
            <span class="webinar-post-meta__info-item">On Demand</span>
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

        <h3 class="post-title"><?php the_title(); ?></h3>
        <div class="post-description"><?php echo get_field("webinar_short_description"); ?></div>

        <a href="<?php echo get_permalink(); ?>" class="post-link">
            <span>Watch the Webinar</span>
            <svg class='arrow-left'>
                <use xlink:href='#arrow-left-red'></use>
            </svg>
        </a>

    </div>
</div>
