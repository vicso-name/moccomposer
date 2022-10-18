<?php
/*
 * Template Name: Support
 * */

get_template_part('template-parts/head');
get_template_part('template-parts/header', 'support'); ?>

<main id="main" class="inner-page contacts-page">
    <section class="contact-form-wrapper">
        <h1>Have a question? <br /><span style="font-size: 0.5em;">Please <a style="font-size:inherit;" href="mailto:us.sales@masterofcode.com" target="_blank">contact us</a></span></h1>
<!--        <h1 class="js-hide-after-submit">Leave feedback</h1>-->
<!--        --><?php //echo   do_shortcode('[gravityform id=9 title=false description=false ajax=true]'); ?>
    </section>

</main>

<?php get_footer('blog'); ?>
<?php
//$ID = get_the_ID();
//$page_path = get_permalink( $ID );
//$stage_link = "https://games.mocstage.com/support";
//$prod_link = "https://games.masterofcode.com/support";
//echo  "<script>if ((window.location.href === \"$page_path\" || window.location.href === \"$stage_link\" || window.location.href === \"$prod_link\")) {
//        window.intercomSettings.hide_default_launcher = true;
//      }  </script>"?>

