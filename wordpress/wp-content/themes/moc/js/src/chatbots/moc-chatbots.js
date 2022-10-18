/* eslint-disable semi,no-undef */
function chatbots() {
    if (document.querySelector('.page-chatbots') === null) return

    $(document).ready(function () {

        var isIe = false;
        if ((window.navigator.userAgent.indexOf('rv:11') > -1) || (window.navigator.userAgent.indexOf('Edge') > -1)) {
            $('body').addClass('ie11')
            // if (window.navigator.userAgent.indexOf('rv:11') > -1) {
            //   isIe = true;
            // };
        }
        ;
        if (!isIe) {
            var testimonialsOwlSettings = {
                center: true,
                items: 2,
                loop: true,
                nav: false,
                dots: true,
                mouseDrag: false,
                touchDrag: true,
                autoplay: true,
                responsiveRefreshRate: 300,
                lazyLoad: true,
                lazyLoadEager: 1,
                margin: 0,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1200: {
                        center: false,
                        items: 3
                    }
                }
            };

            var experienceOwlSettings = {
                center: true,
                items: 2,
                loop: true,
                nav: false,
                dots: true,
                mouseDrag: false,
                touchDrag: true,
                autoplay: false,
                responsiveRefreshRate: 300,
                lazyLoad: true,
                lazyLoadEager: 1,
                margin: 29,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1200: {
                        center: false,
                        items: 3
                    }
                }
            };

            var usecasesOwlSettings = {
                margin: 40,
                loop: true,
                nav: false,
                dots: true,
                items: 1,
                smartSpeed: 100,
                mouseDrag: false,
                touchDrag: true,
                autoplay: true,
                responsiveRefreshRate: 300,
                lazyLoad: true,
                lazyLoadEager: 1
            }

            // page loading animation

            var isMobile = false;

            var $w = jQuery(window);

            var notScroll = true;
            var startHintAnimation = false;

            var frameHeight = window.innerHeight;

            var frameWidth = window.innerWidth;

            var isRetina = ((window.devicePixelRatio > 1.5) || (frameWidth > 1400))

            var needParallaxEffect = false;

            if (jQuery('#parallax-section').length) {
                needParallaxEffect = true
            }

            if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) || (window.innerWidth < 800)) {
                isMobile = true;

                jQuery('body').addClass('chatbots-mobile');
            }

            // var scrollTop = $w.scrollTop();
            //
            // var animatedTop = false;
            //
            // jQuery('[data-get-in-touch]').on('click', function (evt) {
            //   //evt.preventDefault();
            //   // close mobile menu if opened
            //   jQuery('[data-menu]').removeClass('menu-opened');
            //   jQuery('body').removeClass('with-menu-opened');
            //   // prevent parallax
            //   notScroll = true;
            //   var offset = parseInt(jQuery('#estimate-project-form').offset().top);
            //   // var parallaxPadding = parseInt(jQuery('#parallax-end').css('padding-top'))
            //   jQuery('html, body').animate({
            //     scrollTop: (offset - 60)
            //   }, 800);
            //   setTimeout(function () { notScroll = true }, 810)
            // });

            var resizeTimer;
            var usecasesSliderSettings =
                {
                    limit: 768,
                    isStarted: false,
                    wrapperId: "usecases-mobile-slider",
                    preferences: usecasesOwlSettings
                };
            var testimonialsSliderSettings =
                {
                    limit: 1200,
                    isStarted: false,
                    wrapperId: "testimonials-carousel",
                    preferences: testimonialsOwlSettings
                };
            var experiencSliderSettings =
                {
                    limit: 1200,
                    isStarted: false,
                    wrapperId: "experience-carousel",
                    preferences: experienceOwlSettings
                };

            changeCarousel(usecasesSliderSettings);
            changeCarousel(testimonialsSliderSettings);
            changeCarousel(experiencSliderSettings);

            window.addEventListener('resize', function (e) {
                var that = this;
                debugger;
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    changeCarousel(usecasesSliderSettings);
                    changeCarousel(testimonialsSliderSettings);
                    changeCarousel(experiencSliderSettings);
                }, 250);
            });

            function changeCarousel(settingsSet) {
                if (window.innerWidth < settingsSet.limit) {
                    if (!settingsSet.isStarted) {
                        startCarousel(settingsSet.wrapperId, settingsSet.preferences);
                        //hide desktop version
                        settingsSet.isStarted = true;
                    }
                } else {
                    if (settingsSet.isStarted) {
                        stopCarousel(settingsSet.wrapperId);
                        settingsSet.isStarted = false;
                    }
                }
            }

            function stopCarousel(wrapperId) {
                var wrapper = jQuery("#" + wrapperId);
                wrapper.trigger('destroy.owl.carousel');
            }


            function startCarousel(wrapperId, settings) {
                var wrapper = jQuery("#" + wrapperId);
                wrapper.owlCarousel(settings);
                wrapper.on('touchend', function () {
                    wrapper.trigger('stop.owl.autoplay');
                });
                jQuery("#" + wrapperId + ".owl-dots button").on('click', function () {
                    wrapper.trigger('stop.owl.autoplay');
                });
            }
        }
        ;

    })

    // usecases slider - desktop

    var tabWrapper = document.getElementById("usecases-tabs");
    var tabLinks = tabWrapper.querySelectorAll(".tab-link");
    var tabs = tabWrapper.querySelectorAll(".tab");
    [].forEach.call(tabLinks, function (link) {
        link.addEventListener("click", setupClick);
    });

    function setupIndices() {
        [].forEach.call(tabLinks, function (link, index) {
            link.setAttribute("data-index", index);
        });
        document.querySelector(".tab-link[data-index='0']").classList.add("active");
        var leftTabs = tabWrapper.querySelectorAll('.image-tab');
        var rightTabs = tabWrapper.querySelectorAll('.text-tab');
        leftTabs[0].classList.add("active");
        rightTabs[0].classList.add("active");
    }

    function setupChange() {
        var nextIndex;
        [].forEach.call(tabLinks, function switchLinks(link) {

            if (link.classList.contains("active")) {
                link.classList.remove('active');
                nextIndex = (parseInt(link.getAttribute("data-index")) + 1) % 3;
            }
        });
        var activeLink = document.querySelector("a[data-index='" + nextIndex + "']");
        activeLink.classList.add("active");
        var tabToActivate = activeLink.getAttribute("data-link");
        [].forEach.call(tabs, function switchTabs(tab) {
            var tabAttribute = tab.getAttribute("data-tab");
            if (tabAttribute === tabToActivate) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        })
    }

    var usecasesTimer;

    function setupClick() {
        clearInterval(usecasesTimer);
        event.preventDefault();
        [].forEach.call(tabLinks, function switchLinks(link) {
            link.classList.remove('active');
        });
        this.classList.add("active");
        this.classList.add("clicked");
        var tabToActivate = this.getAttribute("data-link");
        [].forEach.call(tabs, function switchTabs(tab) {
            var tabAttribute = tab.getAttribute("data-tab");
            if (tabAttribute === tabToActivate) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        })
    };

    if (window.innerWidth > 767) {
        setupIndices();
        tabWrapper.classList.remove("inactive");
        usecasesTimer = setInterval(setupChange, 5000);
    }

}
