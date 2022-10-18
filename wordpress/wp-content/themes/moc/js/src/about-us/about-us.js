$(document).ready(function () {


        $('.testimonials').owlCarousel({
            center: true,
            items: 3,
            loop: false,
            nav: false,
            dots: false,
            mouseDrag: false,
            touchDrag: true,
            autoplay: true,
            responsiveRefreshRate: 300,
            autoplaySpeed: 700,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    loop: true,
                    center: true,
                    dots: true,
                },
                768: {
                    items: 2,
                    autoplay: true,
                    loop: true,
                    center: true,
                    dots: true,
                },
                989: {
                    items: 3,
                    //autoplay: false,
                    loop: false,
                    center: false,
                    dots: true,
                    autoHeight: true,
                }
            }
        });

    $('.owl-item, .owl-prev, .owl-next, .owl-dot').on('click', function () {
        $('.testimonials').trigger('autoplay.stop.owl');
        var carousel = $('.testimonials').data('owl.carousel');
        carousel.settings.autoplay = false;
        carousel.options.autoplay = false;
        $('.testimonials').trigger('refresh.owl.carousel');
    });
    $('.owl-item, .owl-prev, .owl-next, .owl-dot').on({
        'touchstart': function () {
            $('.testimonials').trigger('autoplay.stop.owl');
            var carousel = $('.testimonials').data('owl.carousel');
            carousel.settings.autoplay = false;
            carousel.options.autoplay = false;
            $('.testimonials').trigger('refresh.owl.carousel');
        },
        'touchmove': function () {
            $('.testimonials').trigger('autoplay.stop.owl');
            var carousel = $('.testimonialsl').data('owl.carousel');
            carousel.settings.autoplay = false;
            carousel.options.autoplay = false;
            $('.owl-bpa-carousel').trigger('refresh.owl.carousel');
        },
    });


    $('.lifecycle-carusel').owlCarousel({
        center: true,
        items: 3,
        loop: false,
        nav: false,
        dots: false,
        mouseDrag: false,
        touchDrag: true,
        autoplay: true,
        responsiveRefreshRate: 300,
        autoplaySpeed: 700,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                loop: true,
                center: true,
                dots: true,
            },
            768: {
                items: 4,
                autoplay: false,
                loop: false,
                center: false,
            }
        }
    });
    $('.owl-item, .owl-prev, .owl-next, .owl-dot').on('click', function () {
        $('.lifecycle-carusel').trigger('autoplay.stop.owl');
        var carousel = $('.lifecycle-carusel').data('owl.carousel');
        carousel.settings.autoplay = false;
        carousel.options.autoplay = false;
        $('.lifecycle-carusel').trigger('refresh.owl.carousel');
    });
    $('.owl-item, .owl-prev, .owl-next, .owl-dot').on({
        'touchstart': function () {
            $('.lifecycle-carusel').trigger('autoplay.stop.owl');
            var carousel = $('.lifecycle-carusel').data('owl.carousel');
            carousel.settings.autoplay = false;
            carousel.options.autoplay = false;
            $('.lifecycle-carusel').trigger('refresh.owl.carousel');
        },
        'touchmove': function () {
            $('.lifecycle-carusel').trigger('autoplay.stop.owl');
            var carousel = $('.lifecycle-carusel').data('owl.carousel');
            carousel.settings.autoplay = false;
            carousel.options.autoplay = false;
            $('.owl-bpa-carousel').trigger('refresh.owl.carousel');
        },
    });
});

$(window).on('load', function () {
    $('video').click(function () {
        if (this.paused) {
            this.play();
            $('#hero-video-start').addClass("playing");
            $('#hero-video-start').removeClass("hovered");
        } else {
            this.pause();
            $('#hero-video-start').removeClass("playing");
            $('#hero-video-start').addClass("hovered");
        }
        // $('#hero-video-start').css('opacity', 0.1);
    })
    // $('#hero-video-start').hover(function(){
    //     $('#hero-video-start').addClass("hovered");
    // });
    $('#hero-video-start').click(function () {
        if ($(this).hasClass('playing')) {
            $('video').trigger('pause');
            $('video').removeClass("playing");
            $('#hero-video-start').removeClass("playing");
            //$('#hero-video-start').removeClass("hovered");
        } else {
            $('video').trigger('play');
            $('video').addClass("playing");
            $('#hero-video-start').addClass("playing");
            //$('#hero-video-start').addClass("hovered");
        }
    });
});

