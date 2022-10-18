$(document).ready(function () {
    $('.owl-bpa-carousel').owlCarousel({
        center: true,
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        mouseDrag: false,
        touchDrag: true,
        autoplay: true,
        responsiveRefreshRate: 300,
        autoplaySpeed: 700,
        lazyLoad: true,        
        navText : ["<i class='arrow left'></i>","<i class='arrow right'></i>"],
        responsive: {
            0 : {
                autoHeight:true,
            },
            767 : {
                autoHeight: true,
            }
        }
    });
    $('.owl-item, .owl-prev, .owl-next, .owl-dot').on('click',function(){
        $('.owl-bpa-carousel').trigger('autoplay.stop.owl');
        var carousel = $('.owl-bpa-carousel').data('owl.carousel');
        carousel.settings.autoplay = false;
        carousel.options.autoplay = false;
        $('.owl-bpa-carousel').trigger('refresh.owl.carousel');
    });
    $('.owl-item, .owl-prev, .owl-next, .owl-dot').on({ 
        'touchstart' : function(){
            $('.owl-bpa-carousel').trigger('autoplay.stop.owl');
            var carousel = $('.owl-bpa-carousel').data('owl.carousel');
            carousel.settings.autoplay = false;
            carousel.options.autoplay = false;
            $('.owl-bpa-carousel').trigger('refresh.owl.carousel');
        },
        'touchmove' : function(){
            $('.owl-bpa-carousel').trigger('autoplay.stop.owl');
            var carousel = $('.owl-bpa-carousel').data('owl.carousel');
            carousel.settings.autoplay = false;
            carousel.options.autoplay = false;
            $('.owl-bpa-carousel').trigger('refresh.owl.carousel');
        },
    });

    $('.send_nda input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){

            setTimeout(function(){
                $('div[data-class="wpcf7cf_group"]').css({ display: "block" });
            }, 200);
        }
        else if($(this).prop("checked") == false){

            setTimeout(function(){
                $('div[data-class="wpcf7cf_group"]').css({ display: "none" });
            }, 300);
        }
    });
});