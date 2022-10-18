

function popups() {
    jQuery(document).ready(function () {
        // cookie popup and team video popup
        // console.log(getCookie('cookie_notice'))
        if ((getCookie('cookie_notice') != 'true') && (!detectFbWebview())) {
            if ((jQuery('[data-exit-popup]').length) && (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)))) {
                jQuery(document).on('mouseleave', function () {
                    showPopup('cookie')
                })
            } else {
                var cookieTimeout = 500
                if ((jQuery('[data-popup="cookie"]').length)) {
                    setTimeout(function () {
                        showPopup('cookie')
                    }, cookieTimeout)
                }
            }
        }

        jQuery(document).on('click', '[data-open-popup]', function (e) {
            e.preventDefault()
            var popupName = jQuery(this).attr('data-open-popup')

            var $popup = jQuery('[data-popup="' + popupName + '"]')
            if (popupName === 'team-video') {
                document.getElementById('team-video').src = jQuery('.js-iframe-source').attr('data-source')
            }
            $popup.addClass('popup-fixed');
            //jQuery('body').addClass('with-menu-opened');
        })

        jQuery(document).on('click', '[data-close-popup]', function (e) {
            e.preventDefault()
            //jQuery('body').removeClass('with-menu-opened')

            var popupName = jQuery(this).attr('data-close-popup')

            var $popup = jQuery('[data-popup="' + popupName + '"]')
            $popup.removeClass('popup-fixed')
            if (popupName === 'team-video') {
                document.getElementById('team-video').src = ''
            } else if (popupName === 'cookie') {
                jQuery('body').removeClass('has_popup')
                $popup[0].setAttribute('aria-hidden', 'true');
                if ((document.cookie)) {
                    document.cookie = 'cookie_notice=true; expires=Thu, 26 Dec 2028 12:00:00 UTC; path=/'
                }
            }
        })
        // end of popups block
    });
}

//conversation popup
jQuery(document).ready(function ($) {
    //var isshow = localStorage.getItem('isshow');

    if ($('.js-conversation-popup').length) {
        if ($("body").hasClass("page-template-page-chatbots") || $("body").hasClass("page-ai-landing-ecommerce") || $("body").hasClass("page-ai-landing") || $("body").hasClass("single-post")) {

            const popupId = $('.js-conversation-popup').attr('id');

            let isshow = sessionStorage.getItem(`isshow-${popupId}`);

            if (isshow == null) {
                //localStorage.setItem('isshow', 1);

                $('.js-conversation-popup-close-btn, .proposal-link').on('click', function () {
                    sessionStorage.setItem(`isshow-${popupId}`, 1);
                });

                // Show popup
                if ($("body").hasClass("page-ai-landing-ecommerce") || $("body").hasClass("page-ai-landing")) {
                    setTimeout(function(){
                        $('.js-conversation-popup').addClass('visible');
                        $('html, body').addClass('non-scroll');
                    }, 30000);
                } else if ($("body").hasClass("single-post")) {
                    const blogPopup = sessionStorage.getItem('isshow-blog-post-popup');

                    setTimeout(function(){
                        $('.js-conversation-popup').addClass('visible');
                        $('html, body').addClass('non-scroll');
                    }, 15000);
                } else {
                    $('.js-conversation-popup').addClass('visible');
                    $('html, body').addClass('non-scroll');
                }

                if ($(window).width() < 960) {
                    $('.fixed-header').addClass('zero-index');
                }
            }

            $('.js-conversation-popup-close-btn').on('click', function () {
                $('.js-conversation-popup').removeClass('visible');
                $('html, body').removeClass('non-scroll');

                setTimeout(function () {
                    $('#js-lets-chat-btn').removeClass('hide');
                }, 2000);

                if ($(window).width() < 960) {
                    $('.fixed-header').removeClass('zero-index');
                }
            });

            $('#ecommerce-pdf-form').find(':input[type=submit]').attr('disabled', true);
            $('#your-name-2').keyup(function () {
                if ($('#business-email').val() != '' && $('#your-name-2').val() != '') {
                    $('.wpcf7-submit').attr('disabled', false);
                } else {
                    $('.wpcf7-submit').attr('disabled', true);
                }
            });

        } else {
            sessionStorage.setItem(`isshow-${popupId}`, 1);
        }

        $('.js-btn-download').on('click', function (e) {
            e.preventDefault();
            $('.flip-card').addClass('card-action');
        });
    }

    $('.js-zoho-questions-popup-close-btn').on('click', function () {
        $('.js-zoho-questions-popup').removeClass('visible');
        // $('html, body').removeClass('non-scroll');
        freeBodyScroll();

        if ($(window).width() < 960) {
            $('.fixed-header').removeClass('zero-index');
        }
    });
});

$(window).on('load', function () {
    if ($(window).width() < 480 && $(window).height() < 740) {
        //let cookieAttr = $('.cookie_notice').attr('aria-hidden');

        if ((getCookie('cookie_notice') != 'true')) {
            $('.main-popup__inner').css('margin-bottom', '200px');

            $('.accept_cookies').on('click', function () {
                $('.main-popup__inner').css('margin-bottom', '30px');
            });
        }
    }
});


const objectCountRef = { current: 0 };

function freezeBodyScroll() {
    if (objectCountRef.current === 0) {  // trigger the init process when there is no other popup exist
        document.body.style.top = `-${window.scrollY}px`
        document.body.style.position = 'fixed'
    }
    objectCountRef.current += 1
}

function freeBodyScroll() {
    objectCountRef.current -= 1
    if (objectCountRef.current === 0) {  // trigger the reset process when all the popup are closed
        const scrollY = document.body.style.top
        document.body.style.position = ''
        document.body.style.top = ''
        window.scrollTo(0, parseInt(scrollY || '0') * -1)

    }
}
