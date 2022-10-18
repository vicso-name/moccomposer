$(window).on('load resize', function () {

    if ($(window).width() < 1024) {
        $('.ai-use-cases__list').height('auto');

        if (!$('.js-cases-tabs-content.open').length) {
            $('.js-cases-content').slideUp(0);
        }

        $('.js-title-action').off().on('click', function () {
            $(this).siblings('.js-cases-content').slideToggle(400);
            $(this).parents('.ai-use-cases__item').toggleClass('open');

            $(this).parents('.ai-use-cases__item').siblings().find('.js-cases-content').slideUp(400);
            $(this).parents('.ai-use-cases__item').siblings().removeClass('open');

            setTimeout(function () {
                const topOfElement = $(".open").offset().top;
                const topOfScreen = $(window).scrollTop();

                if ((topOfScreen + 50 > topOfElement)) {
                    $('body,html').animate({scrollTop: topOfElement - 65}, 400);
                }

            }, 450);
        });

    } else {

        if (!$('.js-cases-tabs-content.open').length) {
            $('.js-cases-content').slideUp(0);
        } else {
            $('.js-cases-content').slideUp(0);
            $('.ai-use-cases__item.open').removeClass('open');
        }

        if ($('.js-cases-content').is(':hidden')) {
            $('.js-cases-content').slideDown(0);
        }

        let maxHeight = 0;
        $('.ai-use-cases__item-inner').each(function () {
            let thisHeight = $(this).outerHeight();
            if (thisHeight > maxHeight) {
                maxHeight = thisHeight;
            }
        });


        $('.ai-use-cases__list').height(maxHeight);

        if (!$('.ai-use-cases__tabs-caption-item.active').length) {
            $('.js-tabs-caption li:first-child').addClass('active');
            $('.js-cases-tabs-content:first-of-type').addClass('active');
        }

        $('.js-tabs-caption').on('click', 'li:not(.active)', function () {
            $(this)
                .addClass('active')
                .siblings()
                .removeClass('active')
                .closest('.ai-use-cases')
                .find('.js-cases-tabs-content')
                .removeClass('active')
                .eq($(this).index())
                .addClass('active');
        });
    }
    //
    // $('.chatbot-examples__slider').owlCarousel({
    //     items:1,
    //     nav: true,
    //     loop:true,
    //     autoplay: true,
    //     smartSpeed: 1500,
    //     autoplaySpeed: 1500,
    //     autoplayTimeout:4000,
    //     // autoplayHoverPause:true,
    //     mouseDrag: true,
    //     touchDrag: true,
    //     responsive:{
    //         0:{
    //             dots: true,
    //         },
    //         680:{
    //             dots: false,
    //         }
    //     }
    // })
});

jQuery(document).ready(function () {
    function botExampleSlider() {
        var isMobile = false;
        var owlBotExampleSettings = {
            items: 1,
            nav: true,
            loop: true,
            autoplay: true,
            smartSpeed: 1000,
            autoplaySpeed: 1000,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            mouseDrag: true,
            touchDrag: true,
            responsive: {
                0: {
                    dots: true,
                },
                680: {
                    dots: false,
                }
            }
        };

        if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
            owlBotExampleSettings.mouseDrag = false;
            owlBotExampleSettings.touchDrag = true;
            isMobile = true;
        }

        var projectCarousel = jQuery('.chatbot-examples__slider');

        if (projectCarousel.length) {
            var projectowlBotExampleSettings = owlBotExampleSettings;
            projectowlBotExampleSettings ['autoplayTimeout'] = '6000';
            var ProjectOwl = jQuery('.chatbot-examples__slider');
            ProjectOwl.owlCarousel(projectowlBotExampleSettings);
            var currentSlider = projectCarousel;

            // stop on click, touch
            jQuery('.chatbot-examples__slider').on('click touchend', function () {
                currentSlider.trigger('stop.owl.autoplay');
            });

            jQuery('.owl-nav button, .owl-dots button').on('click', function () {
                currentSlider.trigger('stop.owl.autoplay');
            });
        }

        //for slider animation logic
        let projectSlider = $('.chatbot-examples__slider');

        $('.owl-prev').click(function () {
            projectSlider.addClass('move-prev').removeClass('move-next');
        });

        $('.owl-next').click(function () {
            projectSlider.addClass('move-next').removeClass('move-prev');
        });

        $('.owl-dot').click(function () {
            projectSlider.removeClass('move-prev move-next autoplay');
        });

        let owlAutoplay = projectSlider.trigger('play.owl.autoplay');

        if (owlAutoplay) {
            projectSlider.removeClass('move-prev move-next').addClass('autoplay');
        }
    }

    botExampleSlider();
})
