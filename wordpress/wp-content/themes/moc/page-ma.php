<?php
/*
 * Template Name: Masters Academy
 * */
?>
<?php get_template_part('template-parts/ma/head'); ?>

<main id="main" class="page-ma-landing">

    <section class="ma-heading-section">
        <a href="https://www.facebook.com/cherkasy.masters/" class="ma-logo" >
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/masters-academy/ma_logo.png" alt="Masters Academy">
        </a>
        <h1 class="heading__top-text">
            <span class="screen-reader-text ">Сезон курсів 2018-2019</span>
        </h1>
        <p class="btn-wrapper">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScLTyy3_Mgr3Z32SgoY86b4pldt40NGPpBVemujYiKfK9cNLg/viewform"
               class="registration-button" target="_blank" id="register_ma">Зареєструватись</a>
        </p>

    </section>
    <section class="courses-list__section">
        <h2>У цьому році ми відкриваємо такі напрямки:</h2>
        <ul class="courses-list">
            <li class="courses-list__item">
                <img class="courses-list__item__icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/masters-academy/ruby.png" alt="Ruby">
                <h3 class="courses-list__item__title">Ruby</h3>
                <p class="courses-list__item__desription">Курс з вивчення мови програмування Ruby та її застосування при створенні додатків на реальних проектах</p>
            </li>
            <li class="courses-list__item">
                <img class="courses-list__item__icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/masters-academy/nodejs.png" alt="NodeJS">
                <h3 class="courses-list__item__title">Backend JS</h3>
                <p class="courses-list__item__desription">Курс з вивчення JavaScript та програмного додатка NodeJS для створення бекендової частини веб-додатків</p>
            </li>
            <li class="courses-list__item">
                <img class="courses-list__item__icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/masters-academy/python.png" alt="Python">
                <h3 class="courses-list__item__title">Python</h3>
                <p class="courses-list__item__desription">Курс з вивчення мови програмування Python та основ машинного навчання на базі спеціалізованих бібліотек для неї</p>
            </li>
            <li class="courses-list__item">
                <img class="courses-list__item__icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/masters-academy/ios.png" alt="iOS">
                <h3 class="courses-list__item__title">Mobile iOS</h3>
                <p class="courses-list__item__desription">Курс з поглибленого вивчення мови програмування Swift, методів, практик та інструментів для створення мобільних додатків для iOS платформи</p>
            </li>
            <li class="courses-list__item">
                <img class="courses-list__item__icon" src="<?php echo get_stylesheet_directory_uri() ?>/images/masters-academy/frontend.png" alt="Frontend">
                <h3 class="courses-list__item__title">Front-end</h3>
                <p class="courses-list__item__desription">Курс з вивчення HTML/CSS/JavaScript та Angular фреймворку, який дасть теоретичні та практичні знання для написання фронтенд частини веб-додатків</p>
            </li>
        </ul>
    </section>
    <section class="footer__section">
        <h2 class="heading__bottom-text">
            <span class="screen-reader-text ">Твій старт в ІТ</span>
        </h2>
        <p class="btn-wrapper">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScLTyy3_Mgr3Z32SgoY86b4pldt40NGPpBVemujYiKfK9cNLg/viewform"
               class="registration-button" target="_blank" id="register_ma_footer">Зареєструватись</a>
        </p>

    </section>
</main>
<?php get_footer('ma'); ?>
