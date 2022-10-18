<?php
/*
 * Template Name: Processes
 * */
?>

<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed'); ?>
<main id="main" class="inner-page page-processes">
  <?php get_template_part( 'template-parts/processes/section', 'processes' ); ?>
  <section class="approach-section">
    <h2 class="section-heading"><?php _e('Approach', 'moc'); ?></h2>
    <p class="section-description processes-description approach-description"><?php _e('We love Agile because it simply works best in current fast paced and highly demanding business context.', 'moc'); ?></p>
    <ul class="approach-list">
      <li class="double-width mobile-full-width approach-list__item ap-communication">
        <p>Effective <span class="ap-red">communication</span> between the team and the customer</p>
      </li>
      <li class="approach-list__item ap-deployment">
        <p>Seamless production <span class="ap-yellow">deployments</span></p>
      </li>
      <li class="approach-list__item ap-requirement">
        <p><span class="ap-blue">Effective capture</span> of requirements</p>
      </li>
      <li class="approach-list__item mobile-full-width ap-quality">
        <p>Integrated <span class="ap-green">quality assurance</span> at all stages of the project</p>
      </li>
      <li class="approach-list__item mobile-full-width ap-demo">
        <p>Regular <span class="ap-violet-bg">reports and demos</span> to show the status of  work accomplished</p>
      </li>
      <li class="full-width approach-list__item ap-team">
        <p class="ap-team-description"><span class="ap-red">Team of professionals</span> that has a good<br /> understanding of client’s business</p>
        <picture>
<!--          <source media="(min-width: 768px)"-->
<!--                  srcset="--><?php //echo get_stylesheet_directory_uri() ?><!--/images/processes/team.jpg">-->
          <source media="(max-width: 767px)"
                  srcset="<?php echo get_stylesheet_directory_uri() ?>/images/processes/teams_2x768.jpg 2x,
                        <?php echo get_stylesheet_directory_uri() ?>/images/processes/teams_768.jpg">
          <img class="lozad ap-team__image" data-src="<?php echo get_stylesheet_directory_uri() ?>/images/processes/teams.jpg" alt="Team of professionals that has a good understanding of client’s business" />
        </picture>


      </li>
    </ul>
    <p class="ap-banner"><?php _e('This helps us to reach what we and you want most — successful launch of a solid project.', 'moc'); ?></p>
  </section>


</main>

<?php get_footer(); ?>
