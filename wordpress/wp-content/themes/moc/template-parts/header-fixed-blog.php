
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

<header id="top_bar" class="fixed-header single-blog-header">

    <?php get_template_part('template-parts/header/header', 'svg'); ?>
    <?php get_template_part('template-parts/blog/blog', 'svg'); ?>
    <?php get_template_part('template-parts/header/header', 'nav'); ?>
    <ul class="get-in-touch-wrapper">
        <li>
            <a href="<?php echo get_home_url(); ?>/contacts" class="get-in-touch-link subscribe-link">
                <?php _e('Get in touch', 'moc'); ?>
            </a>
        </li>
    </ul>
    </nav>
</header>

<?php get_template_part('template-parts/header/menu', 'blog'); ?>
