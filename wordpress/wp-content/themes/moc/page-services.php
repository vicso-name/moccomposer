<?php
/*
 * Template Name: Services
 * */
?>
<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed' ); ?>
<?php get_template_part('template-parts/services-svg'); ?>
<main id="main" class="page-services">
  <section class="services-block align-c">
    <h1 class="heading-1"><?php _e('Services', 'moc'); ?></h1>
    <ul class="services-list">
      <?php $args = array(
        'number'   => 6,
        'orderby' => 'id',
        'order' => 'ASC',
        'hide_empty' => false //remove
      );
      $services = get_terms( 'service', $args );
      foreach ( $services as $service ) { ?>
        <li>
          <a href="<?php echo get_term_link( $service, 'service' ); ?>" class="link">
            <span class="icon-holder-service">
              <svg>
                <use xlink:href="#icon-services__<?php the_field('services_page_li_class', $service); ?>"></use>
              </svg>
            </span>
            <h2 class="caption"><?php the_field('icon_title', $service); ?></h2>
            <p class="text"><?php the_field('icon_text_services_page', $service); ?></p>
          </a>
        </li>
      <?php } ?>
    </ul>
  </section>

  <section class="selected-block align-c">
    <h3 class="caption"><?php _e('Selected projects', 'moc'); ?></h3>

    <ul class="selected-list">
      <?php
      $launch_page = get_page_by_path( 'its-all-about-your-launch' );
      if ( $launch_page ) {
          $frontpage_id =  $launch_page->ID;
      }
      else {
          $frontpage_id = get_option('page_on_front');
      };
      $portfolio_items = get_field('portfolio_items', $frontpage_id);

      usort($portfolio_items, function($a, $b) {
        return $a->menu_order - $b->menu_order;
      }); ?>

      <?php foreach ( $portfolio_items as $portfolio ) { ?>
        <li>
          <?php $portfolio_icon_id = get_field('icon', $portfolio->ID);
          $image_640 = reset( wp_get_attachment_image_src($portfolio_icon_id, 'project_640') );
          ?>
          <a href="<?php the_permalink( $portfolio->ID ); ?>" class="link">

            <img class="lozad" src="image.png" data-src="<?php echo $image_640; ?>" alt="<?php _e('Project', 'moc'); ?>" width="420" height="263">
          </a>
        </li>
      <?php } ?>
    </ul>
    <div class="buttons-block">
      <a href="<?php the_field('portfolio_page'); ?>" class="read-more"><?php _e('More', 'moc'); ?></a>
    </div>
  </section>
</main>

<?php get_footer(); ?>
