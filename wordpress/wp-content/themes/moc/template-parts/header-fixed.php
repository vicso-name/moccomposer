
<?php if ( is_page_template( 'page-blog.php' ) ): ?>


    <?php

    session_start();

    $_SESSION['visitCount']++;
    add_option( 'banner_counter', $_SESSION['visitCount'] );

    $sessionValue = get_option('banner_counter');
    $TotalSession = $sessionValue + 1;

    update_option( 'banner_counter', $TotalSession  );

    ?>

    <?php if($TotalSession % 2): ?>

        <div id="banner_v_one" class="top-dvert-banner">
            <div class="top-dvert-banner__inner">
                <span>Exploring how intelligent bots and automations are applied in higher education?</span>
                <a id="banner_v_one-btn" class="top-dvert-banner__btn" href="https://masterofcode.com/book-a-call-15?utm_source=site&utm_medium=bar&utm_campaign=edu">Speak to AI Consultant</a>
                <button id="close_adverb_banner_one" class="bar-closer-btn"></button>
            </div>
        </div>

    <?php else: ?>

        <div id="banner_v_two" class="top-dvert-banner">
            <div class="top-dvert-banner__inner">
                <span>Streamline enrollment processes, improve retention, and support students with Conversational AI</span>
                <a id="banner_v_two-btn" class="top-dvert-banner__btn" href="https://masterofcode.com/book-a-call-15?utm_source=site&utm_medium=bar&utm_campaign=edu">Speak to AI Consultant</a>
                <button id="close_adverb_banner_two" class="bar-closer-btn"></button>
            </div>
        </div>

    <?php endif; ?>

    <header id="top_bar" class="fixed-header extra-classes-for-blog">

        <?php get_template_part('template-parts/header/header', 'svg'); ?>
        <?php get_template_part('template-parts/header/header', 'nav'); ?>
        <?php get_template_part( 'template-parts/header/get-in-touch' ); ?>
        </nav>
    </header>

    <?php get_template_part('template-parts/header/mobile-menu', ''); ?>

<?php elseif(!is_page_template( 'page-blog.php' ) && !is_single('post')): ?>

    <div id="changeable-bar" class="top-dvert-banner changeable-bar">

        <div class="top-dvert-banner__inner">

            <div id="bar_content-wrapper">

                <div style="display: block" id="content_bar_one" class="inner_bar-content">
                    <span>Transform your organization with machine learning on AWS</span>
                    <a id="changeable-option-one"  class="top-dvert-banner__btn" target="_blank" href="https://drive.google.com/file/d/1QyTekyHUmXx_Z3t0tN2dfjKJeqYfhXss/view">Download our solution brief</a>
                </div>

            </div>

            <button id="close_changeable-bar" class="bar-closer-btn"></button>

        </div>

    </div>

    <header id="top_bar" class="fixed-header <?php if(!is_page_template( 'page-blog.php' ) && !is_single('post')){echo 'changeable-bar';} ?>">

        <?php get_template_part('template-parts/header/header', 'svg'); ?>
        <?php get_template_part('template-parts/header/header', 'nav'); ?>
        <?php get_template_part( 'template-parts/header/get-in-touch' ); ?>
        </nav>
    </header>

    <?php get_template_part('template-parts/header/mobile-menu', ''); ?>


<?php else: ?>

<header id="top_bar" class="fixed-header">

    <?php get_template_part('template-parts/header/header', 'svg'); ?>
    <?php get_template_part('template-parts/header/header', 'nav'); ?>
    <?php get_template_part( 'template-parts/header/get-in-touch' ); ?>
    </nav>
</header>
<?php get_template_part('template-parts/header/mobile-menu', ''); ?>

<?php endif; ?>