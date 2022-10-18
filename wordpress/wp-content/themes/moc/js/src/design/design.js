function design() {

    if ((jQuery(".page-design").length)) {
        var $w = jQuery(window),
            startHeight = 1,
            frameHeight = $w.innerHeight,
            frameWidth = $w.innerWidth,
            mobileBrowser = window.mobileBrowser,
            EdgeIeBrowser = false,

            scrollEventDuration = 1600,
            scrollOffset = 0,

        // all event and functions for parallax
            parallaxOffset = 1,
            isParallax = false,
            animatedTop = false,
            parallaxEnd;

        var design = {
            config: {
                background: jQuery('.background'),
                midground: jQuery('.midground'),
                foreground: jQuery('.foreground'),
                getInTouchBtn: jQuery('[data-get-in-touch]'),
                customScrollBtn: jQuery('[data-custom-scroll]')
            },

            setupAnimation: function() {
                parallaxEnd =jQuery('#wrapper1').offset().top - (50 + parallaxOffset);
                if ((window.navigator.userAgent.indexOf("Edge") > -1) || (window.navigator.userAgent.indexOf("rv:11") > -1)) {
                    EdgeIeBrowser = true;
                };
                if (mobileBrowser) {
                    this.setupMobileAnimation();
                }
                else {
                    this.setupDesktopAnimation();
                }
            },

            animateSlides: function() {

                var desktopController = new ScrollMagic.Controller(),
                    slides = document.querySelectorAll(".animation-slide"),

                    wipeAnimationText = [],
                    textTween = [],
                    imgTween = [],
                    textScene = [];

                if (mobileBrowser) { return }
                else {
                    for (var i=0; i<slides.length; i++) {
                        var slideNum = i+1;

                        wipeAnimationText[i] = new TimelineMax()
                            .fromTo(jQuery("#text-part"+slideNum), 1, {y: "0"}, {y: "-50%", ease: Linear.easeOut, force3D: true});
                        textTween[i] = new TweenMax.to(jQuery("#text-part"+slideNum), 1, {y: "-50%", ease: Linear.easeOut});
                        wipeAnimationText[i].add(textTween[i], 0);
                        imgTween[i] = new TweenMax.to(jQuery("#img-part"+slideNum+" .sliding-part"), 1, {height: "0", ease: Linear.easeOut});
                        wipeAnimationText[i].add(imgTween[i], 0);

                        textScene[i] = new ScrollMagic.Scene({
                            triggerElement: "#wrapper"+slideNum,
                            triggerHook: 0,
                            duration: "100%",
                            offset: scrollOffset*(-1)
                        })
                            .setPin("#wrapper"+slideNum)
                            .setTween(wipeAnimationText[i])
                            // .addIndicators() // add indicators (requires plugin)
                            .addTo(desktopController);

                        textScene[i].on("start", function (event) {
                            var thisBlock = this.triggerElement(),
                                fixedBlock = jQuery(thisBlock).find('.animated-part__wrapper');

                            if (event.scrollDirection==='REVERSE') {
                                fixedBlock.css('position', '');
                            }
                            else {
                                fixedBlock.css('position', 'fixed');
                            };
                        });
                        textScene[i].on("end", function (event) {
                            var thisBlock = this.triggerElement(),
                                fixedBlock = jQuery(thisBlock).find('.animated-part__wrapper');

                            if (event.scrollDirection==='FORWARD') {
                                if (fixedBlock.attr('id') !== 'animation2')
                                    fixedBlock.css('position', '');
                            }
                            else {
                                fixedBlock.css('position', 'fixed');
                            };
                        });
                    };
                };

                if (! (EdgeIeBrowser || mobileBrowser) ) {
                // slider behavior
                var slideWrappers = document.querySelectorAll("#wrapper2"),
                    sliderController = new ScrollMagic.Controller(),
                    thirdScene;

                for (var j=0; j<slideWrappers.length; j++) {

                    thirdScene = new ScrollMagic.Scene({
                        triggerHook: 0,
                        triggerElement: slideWrappers[j]
                    })
                        .setPin(slideWrappers[j])
                        // .addIndicators() // add indicators (requires plugin)
                        .addTo(sliderController);
                };

            }
        },

            setupDesktopAnimation: function() {
                //fix images position
                var that = this;
                setTimeout(function() {
                    that.fixImages('img-fg');
                }, 150);

                var resizeTimer;

                $w.on('resize', function(e) {
                    var that = this;
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function() {
                        that.fixImages('img-fg');// Run code here, resizing has "stopped"

                    }, 250);

                });

                this.ParallaxEffect();

                // $w.scroll(function() {
                //     design.ParallaxEffect();
                // });
            },

            setupMobileAnimation: function() {

                this.ParallaxEffect();

                fixMobileHeight();

                var resizeTimer;

                $w.on('resize', function(e) {
                    var that = this;
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function() {
                        fixMobileHeight();

                    }, 250);

                });
            },

            ParallaxEffect: function () {
                var args = [];
                args.push(this.config.foreground, this.config.midground);
                if (!mobileBrowser) args.push(this.config.background);
                var scrollTop = $w.scrollTop();

                isParallax = (scrollTop < (parallaxEnd) );
                if (scrollTop < parallaxEnd ) {

                    if (animatedTop) setTimeout(function () {
                        animatedTop = false
                    }, 100);
                }
                if (isParallax) {
                    this.setPosition(scrollTop, args);
                }
                else {
                    isParallax = false;
                    if (!animatedTop) {
                        animatedTop = true;
                        this.setPosition(5000, args);
                    }
                }
                // if (mobileBrowser)
                window.requestAnimationFrame(this.ParallaxEffect.bind(this));
            },

            setPosition: function(scrollTop){
                var args = arguments[1];
                for (var i=0; i<args.length; i++) {
                    var coeff = i/2+1.05;
                    args[i].attr('style', 'transform: translate3d(0, -'+parseInt(scrollTop / coeff)+'px, 0);-webkit-transform: translate3d(0, -'+parseInt(scrollTop / coeff )+'px, 0);');
                };
            },

            fixImages: function (imgClass) {
                var imgFg = document.querySelectorAll("."+imgClass),
                    imgOriginalHeight,
                    wrapperHeight,
                    imgOffset,
                    addMargin = true;
                if (frameWidth < frameHeight) {
                    addMargin = false;
                }
                parallaxEnd =jQuery('#wrapper1').offset().top - 40 + parallaxOffset;
                if (!mobileBrowser) {
                    for (var i=0; i<imgFg.length; i++) {
                        imgOriginalHeight = 0;
                        imgOffset = 0;
                        wrapperHeight = 0;
                        wrapperHeight = jQuery(imgFg[i]).closest('.img-wrapper-part').height();
                        if (addMargin) {
                            imgOriginalHeight = jQuery(imgFg[i]).height();
                            imgOffset = ((wrapperHeight - imgOriginalHeight)/2>0) ? parseInt((wrapperHeight - imgOriginalHeight)/2) : 0;
                        };
                        jQuery(imgFg[i]).css({'marginTop': imgOffset});
                    }
                }
            },

            goToForm: function (e) {
                e.preventDefault();
                //close mobile menu if opened
                jQuery('[data-menu]').removeClass('menu-opened');
                jQuery('body').removeClass('with-menu-opened');
                jQuery('html, body').animate({
                    scrollTop: jQuery("#estimate-project-form").offset().top - 40
                }, 800);
            },

            customScroll: function(e) {
                e.preventDefault();
                var targetTag = jQuery(this).attr('data-custom-scroll'),
                    targetOffset;
                if (jQuery(this)[0].hasAttribute('data-bottom')) {
                    targetOffset = jQuery('#'+targetTag).offset().top + jQuery('#'+targetTag).height();
                }
                else {
                    targetOffset = jQuery('#'+targetTag).offset().top  - scrollOffset;
                }
                jQuery('html, body').animate({
                    scrollTop:  targetOffset}, scrollEventDuration);
            },
            //    init
            init: function () {
                this.setupAnimation();
                if (!mobileBrowser) this.animateSlides();
                //this.config.getInTouchBtn.on('click', this.goToForm);
                this.config.customScrollBtn.on('click', this.customScroll)
            }
        };
        //run
        design.init();

    };

    function fixMobileHeight() {
        var viewportHeight = screen.height;
        var screenHeight = document.documentElement.clientHeight;
        if ((screenHeight/startHeight <= 0.75)|| (startHeight/screenHeight <= 0.75)) {
            jQuery('.js-full-height').css('height', screenHeight);
            startHeight = screenHeight;
        }

    }

};
