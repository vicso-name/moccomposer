<section class="team">
    <h1>
        Meet our <a class="orange-color" href="<?php the_field('team_page', $post->ID); ?>">team</a>, experience mastery in each one
    </h1>
    <a href="#" class="team-video__link js-play-video" aria-label="Video About Master Of Code Team" data-open-popup="team-video"><span class="screen-reader-text">Play Team Video</span></a>
    <picture>
        <source type="image/webp"  srcset=" <?php  echo get_stylesheet_directory_uri() ?>/images/home/team_left.webp">
        <img class="lozad team-section__photo left" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/home/team_left.jpg" height="1080" width="2040" alt="Master Of Code Team.">
    </picture>
    <picture>
        <source type="image/webp"  srcset=" <?php  echo get_stylesheet_directory_uri() ?>/images/home/team_right.webp">
        <img class="lozad team-section__photo right" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/home/team_right.jpg" height="1080" width="1680" alt="Master Of Code Team.">
    </picture>
</section>
