<section class="resources-block align-c">

    <?php get_template_part('template-parts/project/project-parts/project-resources-list'); ?>
        <h3 class="caption"><?php _e('Technology', 'moc'); ?></h3>
        <?php $args = array("fields" => "all");
        $technologies = wp_get_post_terms( $post->ID, 'technology', $args );
        if ( !empty( $technologies ) ) { ?>
            <ul class="tech-list">
                <?php foreach ( $technologies as $technology ) {
                    if ( isset( $technologies_string ) )
                        $technologies_string .= ' <span class="delimiter"></span> ' . $technology->name;
                    else
                        $technologies_string .= $technology->name; ?>
                    <li class="icon-holder">
                        <img class="lozad" src="<?php the_field('image', $technology); ?>" data-src="<?php the_field('image', $technology); ?>" alt="<?php echo $technology->name; ?>">
                        <span class="tooltip-holder">
                        <span class="tooltip"><?php echo $technology->name; ?></span>
                    </span>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>

    <?php if($technologies_string){ ?><p class="tech-names"><?php echo $technologies_string; ?></p> <?php } ?>
    <span class="tech-divider"></span>
</section>