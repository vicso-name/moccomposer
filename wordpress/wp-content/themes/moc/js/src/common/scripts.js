function scripts() {
    // calling ie11 polyfill for external svg sprites
    if (
        window.navigator.userAgent.indexOf("rv:11") > -1 ||
        window.navigator.userAgent.indexOf("Edge") > -1
    ) {
        jQuery("body").addClass("ie11");
        // svg4everybody();
    }
    if (/|iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        jQuery("body").addClass("ios");
    }

    // lazy loading for offscreen images
    writeReferrer();
    // var observer = lozad(".lozad", {
    //   rootMargin: "1000px 0px",
    //   threshold: 0.5,
    //   load: function(el) {
    //     el.src = el.dataset.src;
    //     el.onload = function() {
    //       el.classList.add("fadein");
    //     };
    //   }
    // });
    // observer.observe();

    var observer = lozad('.lozad', {
        rootMargin: '200px 0px', // syntax similar to that of CSS Margin
        threshold: 0.5 // ratio of element convergence

    });
    observer.observe();

    var imagesToAnimate = document.querySelectorAll(".image-to-animate");
    // ... trigger the load of a image before it appears on the viewport
    [].forEach.call(imagesToAnimate, function (imageToAnimate) {
        observer.triggerLoad(imageToAnimate);
    });


    var closeModals = function ($modal) {
        if (typeof $modal !== "undefined") {
            $modal.removeClass("menu-opened").addClass("menu-closed");
            return;
        }
        var body = jQuery("body");
        //body.removeClass("with-menu-opened");
        if (!jQuery(".no-touch").length) {
            var bodyOffset = parseInt(jQuery(".menu-opened").attr("data-offset"));
            jQuery("html, body").scrollTop(Math.abs(bodyOffset));
        }
        jQuery("[data-menu]")
            .removeClass("menu-opened")
            .addClass("menu-closed");
        jQuery("[data-popup]").removeClass("popup-fixed");
        if (jQuery("#team-video").length) {
            document.getElementById("team-video").src = "";
        }
        if (jQuery("#mc-embedded-subscribe-form").length) {
            document.getElementById("mc-embedded-subscribe-form").reset();
            jQuery(".response").css("display", "none");
        }
        // var menuBackButton = document.querySelector(('[data-close-menu="subscribe"]'));
        // menuBackButton.classList.remove('hidden');
        // stopBodyScrolling(false);
    };

    var openModals = function (menu) {
        menu.removeClass("menu-closed");
        menu.addClass("menu-opened");
        var body = jQuery("body");
        if (!jQuery(".no-touch").length) {
            var bodyOffset = body[0].getBoundingClientRect().top;
            menu.attr("data-offset", bodyOffset);
        }
        // body.addClass("with-menu-opened");

        jQuery("#mc-embedded-subscribe").on("click", function (e) {
            e.preventDefault();

            if (!$('#mce-FNAME').val()) {
                jQuery("#mce-error-name")
                    .html("The field is required")
                    .css("display", "block")
                    .parent().addClass('error-field');
            } else {
                jQuery("#mce-error-name")
                    .html("")
                    .css("display", "none")
                    .parent().removeClass('error-field');
            }

            var subscribeEmail = jQuery("#mce-EMAIL").val();
            if (!subscribeEmail) {
                jQuery("#mce-error-email")
                    .html("The field is required")
                    .css("display", "block")
                    .parent().addClass('error-field');
            } else if (subscribeEmail && !validateEmail(subscribeEmail)) {
                jQuery("#mce-error-email")
                    .html("Please enter correct email")
                    .css("display", "block")
                    .parent().addClass('error-field');
            } else {
                var submitSubscribeBtn = document.getElementById(
                    "mc-embedded-subscribe"
                );
                submitSubscribeBtn.setAttribute("disabled", "disabled");
                var subscribeForm = jQuery("#mc-embedded-subscribe-form");
                var formData = subscribeForm.serialize();
                var ajaxUrl = subscribeForm.attr("action");

                $.ajax({
                    type: "GET",
                    url: ajaxUrl,
                    data: formData,
                    cache: false,
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        showResponseMessage(data.result, data.msg, subscribeForm);
                    },
                    error: function () {
                        showResponseMessage(
                            "error",
                            "Something went wrong. Please try later...",
                            subscribeForm
                        );
                    },
                    complete: function () {
                        submitSubscribeBtn.removeAttribute("disabled");
                    }
                });
            }
        });
    };

    function showResponseMessage(status, message, form) {
        cleanSubscribeForm(form, true);
        if (status === "success") {
            form.find("input").css("display", "none");
            jQuery('.subscribe-title').css('display', 'none');
            jQuery('.subscribe-input-wrapper').css('display', 'none');
            jQuery('.show-on-success').css('display', 'block');
            jQuery('.icon--order-success').addClass('onshow');
        }

        jQuery("#mce-" + status + "-response")
            .css("display", "block")
            .html(message);
    }

    function cleanSubscribeForm(form, clearEmail) {
        if (typeof clearEmail === "undefined") {
            form.find('input[type="email"]').val("");
            form.find('input[type="text"]').val("");
        }
        form.find("input").css("display", "block");
        document
            .getElementById("mc-embedded-subscribe")
            .removeAttribute("disabled");
        jQuery(".response")
            .html("")
            .css("display", "none");
    }

    // close subscribe popup on click out
    jQuery("#subscribe-block").on("click", function (event) {
        bindClickToModal(event, "subscribe-block");
    });

    function bindClickToModal(event, currentId) {
        if (event.target.getAttribute("id") == currentId) {
            closeModals();
        }
    }

    // validate email before form submittinf

    function validateEmail(inputVal) {
        var regexp = /\S+@\S+\.\S+/;
        return regexp.test(inputVal);
    }

    function writeReferrer() {
        var siteRef = document.referrer;
        var siteURL = document.location.origin;

        if (typeof sessionStorage !== "undefined") {
            try {
                if (!sessionStorage.getItem("referrer")) {
                    var referrer;
                    if (typeof document.referrer === "undefined") {
                        referrer = "";
                    } else if ((siteRef.includes(siteURL))) {
                        referrer = "";
                    } else {
                        referrer = document.referrer;
                    }
                    sessionStorage.setItem("referrer", referrer);
                }

                if (!sessionStorage.getItem("ads")) {
                    var ads = "none";
                    if (location.search.indexOf("type") >= 1) {
                        ads = "ads";
                    }
                    sessionStorage.setItem("ads", ads);
                }
                var visited = "";
                if (sessionStorage.getItem("visited")) {
                    visited = sessionStorage.getItem("visited");
                }
                var newPage = window.location.href;
                visited = visited + newPage + "\n";
                sessionStorage.setItem("visited", visited);
            } catch (err) {
                console.log("storage does not support");
            }
        }
    }

    !(function () {
        typeof MOCDelayObjects !== "undefined" &&
        MOCDelayObjects.length > 0 &&
        MOCDelayObjects.forEach(function (e) {
            jQuery(e.element)[e.event].apply(null, e.options);
        });
    })();
    // classes for body mobile-desktop
    jQuery(document).on("touchstart", function () {
        jQuery("body").removeClass("no-touch");
    });
    // submenu show-hide
    jQuery(".fixed-header .sub-menu").each(function () {
        var i = 0;

        var $thisMenu = jQuery(this);
        $thisMenu.find("li").each(function () {
            i++;
        });
        if (i < 2) $thisMenu.addClass("one-item");
        var parentClass = $thisMenu[0].getAttribute("id");
        jQuery("." + parentClass)
            .find(".sub-menu")
            .remove();
        jQuery("#" + parentClass).appendTo(jQuery(".fixed-header ." + parentClass));
    });

    // mobile submenu

    var submenus = ['services', 'solutions', 'channels', 'resources', 'company', 'careers', 'industries'];
    var itemsWithSubmenu = document.querySelectorAll('.mobile-menu .with-submenu');
    [].forEach.call(itemsWithSubmenu, function (item) {
        [].forEach.call(submenus, function (submenu) {
            if (item.classList.contains(submenu + '-submenu')) {
                item.setAttribute('data-open-menu', submenu);
            }
        })
    });
    jQuery(".menu-holder").addClass("menu-closed");

    jQuery(document).on("click", ".with-submenu > a", function (evt) {
        evt.preventDefault();
        if (
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                navigator.userAgent
            )
        ) {
            var $parentItem = jQuery(this).parent("li");
            if ($parentItem.hasClass("active")) {
                jQuery(".with-submenu").each(function () {
                    jQuery(this).removeClass("active");
                });
            } else {
                jQuery(".with-submenu").each(function () {
                    jQuery(this).removeClass("active");
                });
                $parentItem.addClass("active");
            }
        }
    });
    // popups zadarma fixes

    // jQuery(document).on("click", "#zcwMiniButton", function() {
    //   jQuery("body").addClass("with-menu-opened");
    // });
    // jQuery(document).on("click", ".zcwPopup-close, .zcwPopup-bg", function() {
    //   jQuery("body").removeClass("with-menu-opened");
    // });

    // close popup on esc button
    jQuery(document).keyup(function (e) {
        if (e.keyCode === 27) {
            closeModals();
        }
    });

    //
    jQuery(document).on("mouseenter", ".with-submenu", function (evt) {
        jQuery(this).addClass("active");
    });
    jQuery(document).on("mouseleave", ".with-submenu", function (event) {
        jQuery(this).removeClass("active");
    });

    jQuery(document).on("mouseenter", ".has-submenu", function (evt) {
        jQuery(this).addClass("inner-active");
    });
    jQuery(document).on("mouseleave", ".has-submenu", function (event) {
        jQuery(this).removeClass("inner-active");
    });

    // end of submenu block

    // mobile submenu show
    var dataOpenMenu = document.querySelectorAll('[data-open-menu]');
    [].forEach.call(dataOpenMenu, function (button) {
        button.addEventListener('click', openMenu);
    });

    function openMenu(e) {
        var shouldOpenSinglePage = true;
        if (this.classList.contains('subscribe-link')) {
            shouldOpenSinglePage = false;
        }
        e.preventDefault();
        var menuName = this.getAttribute("data-open-menu");

        var menu = jQuery('[data-menu="' + menuName + '"]');
        // console.log(this, shouldOpenSinglePage);

        openModals(menu);
        var menuBackButton = document.querySelector(('[data-close-menu="subscribe"]'));
        if ((menuName === "subscribe") || (menuName === 'subscribe-careers')) {

            if (shouldOpenSinglePage) {
                menuBackButton.classList.add('hidden');
            }
            jQuery(".mobile-email").focus();
        }
        if (menuName === "search") {
            jQuery("#search-field").focus();
        }
        return false;
    };
    // mobile menu close
    jQuery(document).on("click", "[data-close-menu]", function (e) {
        e.preventDefault();

        console.log('this action');

        var menuName = jQuery(this).attr("data-close-menu");
        if (menuName === "main") {
            closeModals();
            $('.subscribe-block').find('form').trigger('reset');
            $('.subscribe-block').find('input').css('display', 'block');
            $('.subscribe-block').find('.subscribe-title').css('display', 'block');
            $('.subscribe-block').find('.confirmation-text').css('display', 'block');
            $('.subscribe-block').find('.subscribe-input-wrapper').css('display', 'block');
            $('.subscribe-block').find('.wpcf7-response-output').css('display', 'block');
            $('.subscribe-block').find('.response').css('display', 'none');
            $('.subscribe-block').find('.show-on-success').css('display', 'none');
            $('.subscribe-block').find('.icon--order-success').removeClass('onshow');
            $('.subscribe-block').find('.label').addClass('unfocus-label');
            $('#download-form').attr('pdf-link', ' ');
            $('.subscribe-block').find('.wpcf7-submit').css('opacity', '1');

        } else {
            closeModals(jQuery('[data-menu="' + menuName + '"]'));
        }
        jQuery("[data-change-category]").removeClass("active");
        jQuery(this).addClass("active");
        // if (menuName === "search") {
        //     jQuery("#search-field").val("");
        //     jQuery("#displayed-ajax-search").html("");
        //     jQuery("#displayed-search-phrases").removeClass("hidden");
        // }
    });

    jQuery(document).on("click", "[data-change-category]", function () {
        var $this = jQuery(this);

        var $selectedCategory = jQuery("[data-selected-category]");

        var category = $this.text();
        $selectedCategory.text(category);
        return false;
    });

    if (jQuery(".processes-list").length)
        jQuery(".processes-list__item")
            .first()
            .addClass("opened");

    jQuery(".processes-list__item").on("click, mouseover", function () {
        var $activeItem = jQuery(this);
        if (!$activeItem.hasClass("opened")) {
            jQuery(".processes-list__item").removeClass("opened");
            jQuery(this).addClass("opened");
        }
    });

    var prevScrollPos = window.pageYOffset;
    var logoToHide = document.querySelector('#fixed-logo-wrapper');
    if (logoToHide !== null) {
        var isLogoHidden = false;
        var topBar = document.getElementById("top_bar");
        var topPanel = document.getElementById("top_panel");
        var scrolledBody = document.body;
        jQuery(window).scroll(function () {
            jQuery(".with-submenu").each(function () {
                jQuery(this).removeClass("active");
            });
            if (scrolledBody.getBoundingClientRect().top < -60) {
                // if (!isLogoHidden)
                //     logoToHide.classList.add('hide-full-logo');
                // isLogoHidden = true;
                if (topPanel) {
                    topPanel.classList.add("fixed-panel");
                }

            } else {
                // if (isLogoHidden) {
                //     logoToHide.classList.remove('hide-full-logo');
                //     isLogoHidden = false;
                // }
                if (topPanel) {
                    topPanel.classList.remove("fixed-panel");
                }
            }
            slideTopMenu();
        });

    }

    function slideTopMenu() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollPos > currentScrollPos + 2 || currentScrollPos < 60) {
            topBar.classList.remove("slide-up");
            $('.webinar-form').removeClass('active');
            $('.action-block').removeClass('not-active');
        } else {
            topBar.classList.add("slide-up");
            $('.webinar-form').removeClass('active');
            $('.action-block').removeClass('not-active');
        }

        function updateScrollpos() {
            prevScrollPos = currentScrollPos;
        }

        return updateScrollpos();
    }

    // luxury escapes - video playing

    leControls();

    function leControls() {
        var lePlayButton1 = document.getElementById('le-video-start-1');
        var lePlayButton2 = document.getElementById('le-video-start-2');
        if ((lePlayButton1 !== null) && (lePlayButton2 !== null)) {
            // if ( (lePlayButton1 !== 'undefined') && (typeof lePlayButton2 !== 'undefined')) {
            videoControl();
            tabControl();
        }

        function videoControl() {
            var triggerStart1 = document.getElementById("le-video-start-1");
            triggerStart1.addEventListener("click", function () {
                playVideo("video-in-frame-1", triggerStart1);
            });
            var triggerStart2 = document.getElementById("le-video-start-2");
            triggerStart2.addEventListener("click", function () {
                playVideo("video-in-frame-2", triggerStart2);
            });

            function playVideo(videoId, triggerStart) {
                var video = document.getElementById(videoId);
                if (typeof video !== 'undefined') {
                    if (video.paused) {
                        video.play();
                        triggerStart.classList.add('playing');
                    } else {
                        video.pause();
                        triggerStart.classList.remove('playing');
                    }
                }
            }
        };

        function tabControl() {
            var tabLinks = document.getElementsByClassName('case-study-tab-link');
            [].forEach.call(tabLinks, function (link) {
                link.addEventListener('click', activateTab);
            })

            function activateTab() {
                event.preventDefault();
                [].forEach.call(tabLinks, function (item) {
                    if (item !== this) {
                        item.classList.remove('active');
                        document.querySelector('[data-tab="' + item.getAttribute('data-link') + '"]').classList.remove('active');
                    }
                });

                var activeTab = document.querySelector('[data-tab="' + this.getAttribute('data-link') + '"]');
                activeTab.classList.add('active');
                this.classList.add('active');
            }
        }
    }


    // metrix counter

    jQuery("[data-metrix]").on("click", function () {
        var goalName = jQuery(this).attr("data-metrix");

        if (typeof yaCounter32175069 !== "undefined") {
            yaCounter32175069.reachGoal(goalName);
        }
    });
}

//page smooth scroll for anchor
// jQuery(document).ready(function () {
//     jQuery(".lets-chat").on("click", function (event) {
//       event.preventDefault();
//       let id  = jQuery(this).attr('href'),
//           top = jQuery(id).offset().top;
//       jQuery('body,html').animate({scrollTop: top}, 800);
//     });
// });

//accesibility navigation
// $(document).ready(function() {
//   // Setup the a11y nav
//   $('.nav').setup_navigation();
//
//   // RWD Nav Pattern
//   $('body').addClass('js');
//   var $menu = $('#menu'),
//       $menulink = $('.menu-link'),
//       $menuTrigger = $('.has-subnav > a');
//
//   $menulink.click(function(e) {
//     e.preventDefault();
//     $menulink.toggleClass('active');
//     $menu.toggleClass('active');
//   });
//
//   $menuTrigger.click(function(e) {
//     e.preventDefault();
//     var $this = $(this);
//     $this.toggleClass('active').next('ul').toggleClass('active');
//   });
// });
// /*
// $(function(){
// 	$('.nav').setup_navigation();
// });
// */
// var keyCodeMap = {
//   48:"0", 49:"1", 50:"2", 51:"3", 52:"4", 53:"5", 54:"6", 55:"7", 56:"8", 57:"9", 59:";",
//   65:"a", 66:"b", 67:"c", 68:"d", 69:"e", 70:"f", 71:"g", 72:"h", 73:"i", 74:"j", 75:"k", 76:"l",
//   77:"m", 78:"n", 79:"o", 80:"p", 81:"q", 82:"r", 83:"s", 84:"t", 85:"u", 86:"v", 87:"w", 88:"x", 89:"y", 90:"z",
//   96:"0", 97:"1", 98:"2", 99:"3", 100:"4", 101:"5", 102:"6", 103:"7", 104:"8", 105:"9"
// }
//
// $.fn.setup_navigation = function(settings) {
//
//   settings = jQuery.extend({
//     menuHoverClass: 'show-menu',
//   }, settings);
//
//   // Add ARIA role to menubar and menu items
//   $(this).attr('role', 'menubar').find('li').attr('role', 'menuitem');
//
//   var top_level_links = $(this).find('> li > a');
//
//   // Added by Terrill: (removed temporarily: doesn't fix the JAWS problem after all)
//   // Add tabindex="0" to all top-level links
//   // Without at least one of these, JAWS doesn't read widget as a menu, despite all the other ARIA
//   //$(top_level_links).attr('tabindex','0');
//
//   // Set tabIndex to -1 so that top_level_links can't receive focus until menu is open
//   $(top_level_links).next('ul')
//       .attr('data-test','true')
//       .attr({ 'aria-hidden': 'true', 'role': 'menu' })
//       .find('a')
//       .attr('tabIndex',-1);
//
//   // Adding aria-haspopup for appropriate items
//   $(top_level_links).each(function(){
//     if($(this).next('ul').length > 0)
//       $(this).parent('li').attr('aria-haspopup', 'true');
//   });
//
//   var listLength = $('#main-nav>li').length;
//
//   $(top_level_links).focus(function(){
//     $(this).closest('ul')
//         // Removed by Terrill
//         // The following was adding aria-hidden="false" to root ul since menu is never hidden
//         // and seemed to be causing flakiness in JAWS (needs more testing)
//         // .attr('aria-hidden', 'false')
//         .find('.'+settings.menuHoverClass)
//         .attr('aria-hidden', 'true')
//         .removeClass(settings.menuHoverClass)
//         .find('a')
//         .attr('tabIndex',-1);
//
//     $(this).next('ul')
//         .attr('aria-hidden', 'false')
//         .addClass(settings.menuHoverClass)
//         .find('a').attr('tabIndex',0);
//     $(this).closest('li')
//         .addClass('active-focus')
//     $(this).closest('li').siblings().removeClass('active-focus')
//   });
//
//   $('a.get-in-touch-link, a#search-nav').focus(function(){
//     $(this).parents('nav').find('.menu-item ').removeClass('active-focus')
//   });
//
//   $(top_level_links).hover(function(){
//     $(this).closest('ul')
//         .attr('aria-hidden', 'false')
//         .find('.'+settings.menuHoverClass)
//         .attr('aria-hidden', 'true')
//         .removeClass(settings.menuHoverClass)
//         .find('a')
//         .attr('tabIndex',-1);
//     $(this).next('ul')
//         .attr('aria-hidden', 'false')
//         .addClass(settings.menuHoverClass)
//         .find('a').attr('tabIndex',0);
//     $(this).closest('li')
//         .toggleClass('active-hover');
//     $(this).closest('li')
//         .siblings()
//         .removeClass('active-focus');
//   });
//
//   // Bind arrow keys for navigation
//   $(top_level_links).keydown(function(e){
//     if(e.keyCode == 37) {
//       e.preventDefault();
//       // This is the first item
//       if($(this).parent('li').prev('li').length == 0) {
//         $(this).parents('ul').find('> li').last().find('a').first().focus();
//       } else {
//         $(this).parent('li').prev('li').find('a').first().focus();
//       }
//     } else if(e.keyCode == 38) {
//       e.preventDefault();
//       if($(this).parent('li').find('ul').length > 0) {
//         $(this).parent('li').find('ul')
//             .attr('aria-hidden', 'false')
//             .addClass(settings.menuHoverClass)
//             .find('a').attr('tabIndex',0)
//             .last().focus();
//         }
//     } else if(e.keyCode == 39) {
//       e.preventDefault();
//       // This is the last item
//       if($(this).parent('li').next('li').length == 0) {
//         $(this).parents('ul').find('> li').first().find('a').first().focus();
//       } else {
//         $(this).parent('li').next('li').find('a').first().focus();
//       }
//     } else if(e.keyCode == 40) {
//       e.preventDefault();
//       if($(this).parent('li').find('ul').length > 0) {
//         $(this).parent('li').find('ul')
//             .attr('aria-hidden', 'false')
//             .addClass(settings.menuHoverClass)
//             .find('a').attr('tabIndex',0)
//             .first().focus();
//       }
//     } else if(e.keyCode == 13 || e.keyCode == 32) {
//       // If submenu is hidden, open it
//       e.preventDefault();
//       $(this).parent('li').find('ul[aria-hidden=true]')
//           .attr('aria-hidden', 'false')
//           .addClass(settings.menuHoverClass)
//           .find('a').attr('tabIndex',0)
//           .first().focus();
//     } else if(e.keyCode == 27) {
//       console.log('action');
//       e.preventDefault();
//       $('.'+settings.menuHoverClass)
//           .attr('aria-hidden', 'true')
//           .removeClass(settings.menuHoverClass)
//           .find('a')
//           .attr('tabIndex',-1);
//
//       $('.fixed-list').find('.with-submenu')
//           .removeClass('active-focus');
//     } else {
//       $(this).parent('li').find('ul[aria-hidden=false] a').each(function(){
//         if($(this).text().substring(0,1).toLowerCase() == keyCodeMap[e.keyCode]) {
//           $(this).focus();
//           return false;
//         }
//       });
//     }
//   });
//
//   var links = $(top_level_links).parent('li').find('ul').find('a');
//   $(links).keydown(function(e){
//     if(e.keyCode == 38) {
//       e.preventDefault();
//       // This is the first item
//       if($(this).parent('li').prev('li').length == 0) {
//         $(this).parents('ul').parents('li').find('a').first().focus();
//       } else {
//         $(this).parent('li').prev('li').find('a').first().focus();
//       }
//     } else if(e.keyCode == 40) {
//       e.preventDefault();
//       if($(this).parent('li').next('li').length == 0) {
//         $(this).parents('ul').parents('li').find('a').first().focus();
//       } else {
//         $(this).parent('li').next('li').find('a').first().focus();
//       }
//     } else if(e.keyCode == 27 || e.keyCode == 37) {
//       //e.preventDefault();
//       $(this)
//           .parents('ul').first()
//           .prev('a').focus()
//           .parents('ul').first().find('.'+settings.menuHoverClass)
//           .attr('aria-hidden', 'true')
//           .removeClass(settings.menuHoverClass)
//           .removeClass('active-focus')
//           .find('a')
//           .attr('tabIndex',-1);
//     } else if(e.keyCode == 32) {
//       e.preventDefault();
//       window.location = $(this).attr('href');
//     } else {
//       var found = false;
//       $(this).parent('li').nextAll('li').find('a').each(function(){
//         if($(this).text().substring(0,1).toLowerCase() == keyCodeMap[e.keyCode]) {
//           $(this).focus();
//           found = true;
//           return false;
//         }
//       });
//
//       if(!found) {
//         $(this).parent('li').prevAll('li').find('a').each(function(){
//           if($(this).text().substring(0,1).toLowerCase() == keyCodeMap[e.keyCode]) {
//             $(this).focus();
//             return false;
//           }
//         });
//       }
//     }
//   });
//
//   // Hide menu if click or focus occurs outside of navigation
//   $(this).find('a').last().keydown(function(e){
//     if(e.keyCode == 9) {
//       // If the user tabs out of the navigation hide all menus
//       $('.'+settings.menuHoverClass)
//           .attr('aria-hidden', 'true')
//           .removeClass(settings.menuHoverClass)
//           .find('a')
//           .attr('tabIndex',-1);
//     }
//   });
//
//   $(document).click(function(){ $('.'+settings.menuHoverClass).attr('aria-hidden', 'true').removeClass(settings.menuHoverClass).find('a').attr('tabIndex',-1); });
//
//   $(this).click(function(e){
//     e.stopPropagation();
//   });
// }



$(window).on('load resize', function () {
    if ($('body').hasClass('single-webinars')) {
        jQuery('a[href^="#to-form"]').on("click", function (event) {
            event.preventDefault();

            if ($(window).width() < 1024) {
                let id = jQuery(this).attr('href'),
                    top = jQuery(id).offset().top - 120;

                if ($(window).width() < 680) {
                    top = jQuery(id).offset().top - 85;
                }
                jQuery('body,html').animate({scrollTop: top}, 600);
            } else {
                $(this).closest('.action-block').addClass('not-active');
                $('.webinar-form').addClass('active');
            }
        });
    }
});

//blog - for button which close search popup
if ($("#search-close-btn").length > 0) {
    $("#search-close-btn").on("click", function () {
        $('body').removeClass('with-menu-opened');
    });
}

//blog search
$(window).on('load resize', function () {
    if ($('body').hasClass('page-template-page-blog') || $('body').hasClass('page-template-page-ebooks-and-whitepapers')) {
        const panelHeight = $('.top-blog-panel').height(),
            headerHeight = $('header').height();

        $('.blog-wrap, .ebooks-page-content').css('padding-top', `${panelHeight + headerHeight + 16}px`)
    }

    // if ($('body').hasClass('single-knowledge-base')) {
    //
    //     let maxHeight = 0;
    //     $('.related-posts__list-item-inner').each(function () {
    //         let thisHeight = $(this).outerHeight();
    //
    //         if (thisHeight > maxHeight) {
    //             maxHeight = thisHeight;
    //         }
    //     });
    //
    //     $('.related-posts__list-item').height(maxHeight);
    //
    // }
});


$(window).on('load', function () {

    if ($('body').hasClass('page-template-page-blog') || $('body').hasClass('page-template-page-ebooks-and-whitepapers')) {

        // $('.popular-searches-block').slideUp(0);
        $('.results-count-info').slideUp(0);

        const blockHeight = $('.popular-searches-block').height();
        $('.popular-searches-block').height(0);

        jQuery(document).on("click", ".search-field", function (e) {
            //e.preventDefault();
            $('.industries__list').hide().addClass('hide');

            if (!$(this).is(":focus")) {
                $(this).focus();
            }

            // let searchPhrases = $('.displayed-search-phrases');

            $('body').addClass('active-search non-scroll');
            $('html').addClass('non-scroll');
            $('.results-count-info').slideUp(300).text('');

            if ($(window).width() < 680) {
                $('.popular-searches-block').addClass('show').height('168px');
            } else if (($(window).width() > 681) && ($(window).width() < 880)) {
                $('.popular-searches-block').addClass('show').height('68px');
            } else {
                $('.popular-searches-block').addClass('show').height('24px');
            }
        });

        jQuery(document).on("click", ".search-form .close-btn", function (e) {
            e.preventDefault();

            $('.industries__list').show();
            setTimeout(function () {
                $('.industries__list').removeClass('hide');
            }, 200);

            $('body').removeClass('active-search non-scroll');
            $('html').removeClass('non-scroll');
            $('.search-field').val('');
            //$('.displayed-search-phrases').height(0);
            $('.search-results').addClass('hidden-state');
            $('.popular-searches-block').removeClass('show').height(0);
            $('.results-count-info').slideUp(300).text('');
            //$('.search-results-wrap').removeClass('white-bg');
        });

        $(document).click(function (event) {
            if ($(event.target).is(".search-results, .search-results-wrap")) {
                $('body').removeClass('active-search non-scroll');
                $('html').removeClass('non-scroll');
                //$('.search-results-wrap').removeClass('white-bg');
                $('.search-results').addClass('hidden-state');
                $('.search-field').val('');
                $('.popular-searches-block').removeClass('show').height(0);
                $('.results-count-info').slideUp(300).text('');

                $('.industries__list').show();
                setTimeout(function () {
                    $('.industries__list').removeClass('hide');
                }, 200);
            }
        });

        jQuery(document).on("click touchstart", ".js-searches-item", function (e) {
            //e.preventDefault();

            $(this).each(function H() {
                let itemValue = $(this).text(),
                    inputSearch = $('#search-field'),
                    event = jQuery.Event("keyup");
                event.which = 13;
                inputSearch.val(itemValue).trigger(event);

                setTimeout(function () {
                    inputSearch.blur();
                }, 50);
            });
        });

    }
    if ($('body').hasClass('single-post')) {

        var toggle = $('a.ez-toc-toggle');

        if (!toggle.data('visible')) {

            toggle.addClass('rotate')
        }

        toggle.on('click', function (event) {

            if ($(this).data('visible')) {
                toggle.removeClass('rotate')

            } else {
                toggle.addClass('rotate')
            }

        });

    }
});


//cont gtm value for users timezone
const currentLocalDate = new Date();

const gmtValue = currentLocalDate.getTimezoneOffset() / 60,
    gmtElement = $('.gmt-value');

if (gmtValue < 0) {
    gmtElement.text(`${gmtValue}`);
} else {
    gmtElement.text(`+ ${gmtValue}`);
}

//redirect after webinar registration
if ($('body').hasClass('single-webinars')) {

    if ($(".registration-form").length > 0) {

        document.addEventListener('wpcf7mailsent', function (event) {
            const origin = window.location.origin;
            location = `${origin}/webinars-successful-registration`;
        }, false);
    }

    if ($(".watch-video-form").length > 0) {

        $('.wpcf7-submit').val('Watch video');

        let topPosytion = 0;

        window.addEventListener("scroll", () => {
            document.documentElement.style.setProperty(
                "--scroll-y",
                `${window.scrollY}px`);
        });

        document.addEventListener('wpcf7mailsent', function (event) {
            const vebinarPopup = $('.webinar-video-popup'),
                videoplay = $('.video').data('src'),
                iframe = $('#video'),
                position = topPosytion;

            iframe.attr('src', `${videoplay}?autoplay=1&rel=0`);
            vebinarPopup.addClass('show');
            $('html, body').addClass('non-scroll');
            $('.watch-video-form').addClass('form-submitted');
            $('.js-continue-watch').addClass('show');

            const scrollY = document.documentElement.style.getPropertyValue("--scroll-y");
            const body = document.body;
            body.style.position = "fixed";
            body.style.top = `-${scrollY}`;

        }, false);

        $(".js-show-video").on("click", function () {
            const vebinarPopup = $('.webinar-video-popup'),
                videoplay = $('.video').data('src'),
                iframe = $('#video'),
                position = topPosytion;

            iframe.attr('src', `${videoplay}?autoplay=1&rel=0`);
            vebinarPopup.addClass('show');
            $('html, body').addClass('non-scroll');

            const scrollY = document.documentElement.style.getPropertyValue("--scroll-y");
            const body = document.body;
            body.style.position = "fixed";
            body.style.top = `-${scrollY}`;
        });

        $(".js-video-close-button").on("click", function () {
            const vebinarPopup = $('.webinar-video-popup'),
                iframe = $('#video');

            iframe.attr('src', '');
            vebinarPopup.removeClass('show');
            $('html, body').removeClass('non-scroll');

            const body = document.body;
            const scrollY = body.style.top;
            body.style.position = "";
            body.style.top = "";
            window.scrollTo(0, parseInt(scrollY || "0") * -1);
            document.getElementById("dialog").classList.remove("show");
        });
    }

    $(window).on('load', function () {
        const webinarTitle = $('.webinar-title').text();
        sessionStorage.setItem('webinarTitle', `“${webinarTitle}”`);
    });
}

if ($("body").hasClass("page-template-page-webinar-successful-registration")) {
    const registrationTitle = sessionStorage.getItem('webinarTitle');
    $('.js-registration-title').text(registrationTitle);
}

$(document).ready(function () {
    if ($(".upcoming-webinar").length > 1) {
        $('.upcoming-webinars-wrap').owlCarousel({
            loop: true,
            nav: true,
            singleItem: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 7000,
            smartSpeed: 900,
            autoplayHoverPause: true,
            mouseDrag: false
        })
    }

    $('.js-europe-action').on('click', function () {
        $('.map-wrapper-section').addClass('show-europe');
    });

    $('.back-to-world-btn').on('click', function () {
        $('.map-wrapper-section').removeClass('show-europe');
    });
});

var checkMobile = function () {

    //Check Device
    var isTouch = ('ontouchstart' in document.documentElement);

    //Check Device //All Touch Devices
    if (isTouch) {
        $('html').addClass('touch-device');
    } else {
        $('html').addClass('no-touch-device');
    }
};

//Execute Check
checkMobile();

//prevent default for Lets Chat button
$('#lets-chat').on('click', function (event) {
    event.preventDefault();
});

var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /* When an item is clicked, update the original select box,
            and the selected item: */
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /* When the select box is clicked, close any other select boxes,
        and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);
// $('.js-zoho-questions-popup').find('.additional-info-submit').attr('disabled', true);
$("body").on('DOMSubtreeModified', ".select-selected", function() {
    $(this).addClass('choosen');

    if($(this).closest('.form-item').hasClass('error')){
        $(this).closest('.form-item').removeClass('error');
    }
});

// $("body").on('DOMSubtreeModified', ".select-selected", function() {
//     $(this).each(function() {
//         const budgesSelect = $('.js-budget .select-selected').text(),
//             decisionSelect = $('.js-decision .select-selected').text(),
//             deliverySelect = $('.js-delivery .select-selected').text();
//
//         if (budgesSelect !== 'Not chosen' && decisionSelect !== 'Not chosen' && deliverySelect !== 'Not chosen') {
//             $('.wpcf7-submit').attr('disabled', false);
//         } else {
//             $('.wpcf7-submit').attr('disabled', true);
//         }
//     });
// });



$(document).ready(function() {

    const mediaQuery = window.matchMedia('(max-width: 890px)')

   //Replace the download section before play-container
   $('.postid-37043').find($('.blog-download-block')[0]).insertBefore('.audio-player')


    barSetOne();
    barSetTwo();
    barWithChangeable();
    checkClassavailability();
    closeCookiesAlert();
    conversationalTabs();
    convrCarouselItem();
    //This function should be remvoe when the top-bar will remove
    getInTouchFixedHeight();
    experienceCarousel();
    SxmCaseSlide()
    SxmVideoStarterDescktop()
    SxmVideoStarterMobile()
    newTechnologySlider()
    removeExtraPadding()

    if (!mediaQuery.matches){
        essoSlider();
    }else{
        essoSliderMobile();
    }

    function barSetOne(){

        $('#close_adverb_banner_one').on('click', function(){

            $('#banner_v_one').fadeOut(100);
            $('.single-blog-header').css('top', 0);
            $('.extra-classes-for-blog').css('top', 0);
            $('.changeable-bar').css('top', 0);
            $('.extra-classes-for-blog').css('top', 0);
            $('.single-blogpost-wrap').addClass('custom-top');
            $('.changeable-bar').addClass('custom-top');
            $('.single-blog-header').addClass('custom-position');
            $('.extra-classes-for-blog').addClass('custom-position');
            $('#top_bar').removeClass('extra-classes-for-blog');
            $('#top_panel').removeClass('blog-panel-bars');
            $('.scroll-holder').css('padding-top', 0);
            $('.page-portfolio').css('padding-top', 20);
            $('#main').attr('style', 'padding-top: 20px !important');
            $('.careers-page').attr('style', 'padding-top: 70px !important');


        })

        $('#close_changeable-bar').on('click', function(){

            $('#changeable-bar').fadeOut(100);
            $('.single-blog-header').css('top', 0);
            $('.changeable-bar').css('top', 0);
            $('.extra-classes-for-blog').css('top', 0);
            $('.single-blogpost-wrap').addClass('custom-top');
            $('.changeable-bar').addClass('custom-top');
            $('.single-blog-header').addClass('custom-position');
            $('.extra-classes-for-blog').addClass('custom-position');
            $('#top_bar').removeClass('extra-classes-for-blog');
            $('#top_panel').removeClass('blog-panel-bars');
            $('.scroll-holder').css('padding-top', 0);
            $('.page-portfolio').css('padding-top', 20);
            $('#main').attr('style', 'padding-top: 20px !important');
            $('.book-call-page').attr('style', 'padding-top: 72px !important');
            $('.careers-page').attr('style', 'padding-top: 70px !important');

        })


    }

    function barSetTwo(){

        $('#close_adverb_banner_two').on('click', function(){

            $('#banner_v_two').fadeOut(100);
            $('.single-blog-header').css('top', 0);
            $('.extra-classes-for-blog').css('top', 0);
            $('.changeable-bar').css('top', 0);
            $('.extra-classes-for-blog').css('top', 0);
            $('.single-blogpost-wrap').addClass('custom-top');
            $('.changeable-bar').addClass('custom-top');
            $('.single-blog-header').addClass('custom-position');
            $('.extra-classes-for-blog').addClass('custom-position');
            $('#top_bar').removeClass('extra-classes-for-blog');
            $('#top_panel').removeClass('blog-panel-bars');
            $('.scroll-holder').css('padding-top', 0);
            $('.page-portfolio').css('padding-top', 20);
            $('#main').css('padding-top', 20);
            $('.book-call-page').attr('style', 'padding-top: 72px !important');

        })
    }


    function checkClassavailability(){

        const classExists = document.getElementById('banner_v_two');
        const bannerOne = document.getElementById('banner_v_one');

        if(bannerOne !== null){
            bannerOne.length > 0;
            if (bannerOne) {
                $('.scroll-holder').addClass('blog-scroll-holder')
            }
        }


        if(classExists !== null){
            classExists.length > 0;
            const topBar = document.getElementById('top_bar');
            const ExtraLengthBar = document.getElementById('top_panel');
            if (classExists) {
                if(topBar !== null){
                    topBar.classList.add('extra_length');
                }
                if(ExtraLengthBar !== null){
                    ExtraLengthBar.classList.add('extra_length_bar');
                }
                $('.scroll-holder').addClass('blog-scroll-holder')
            }
        }

    }

    function barWithChangeable(){

        let text = [" <div style='display: block' id=\"content_bar_one\" class=\"inner_bar-content\">\n" +
        "                <span>Transform your organization with machine learning on AWS</span>\n" +
        "                <a id=\"changeable-option-one\"  class=\"top-dvert-banner__btn\" target=\"_blank\" href=\"https://drive.google.com/file/d/1QyTekyHUmXx_Z3t0tN2dfjKJeqYfhXss/view\">Download our solution brief</a>\n" +
        "            </div>", "<div style='display: block' id=\"content_bar_two\" class=\"inner_bar-content\">\n" +
        "                <span>Are you interested in exploring third-party Natural Language Understanding (NLU) engines?</span>\n" +
        "                <a id=\"changeable-option-two\" class=\"top-dvert-banner__btn\" target=\"_blank\" href=\"https://masterofcode.com/book-a-call-15?utm_source=banner&utm_medium=NLU\">Schedule time with our NLU specialist</a>\n" +
        "            </div>", "<div style='display: block' id=\"content_bar_two\" class=\"inner_bar-content\">\n" +
        "                <span>Interested in voice bots for customer service?</span>\n" +
        "                <a id=\"changeable-option-two\" class=\"top-dvert-banner__btn\" target=\"_blank\" href=\"https://calendly.com/masterofcode-book-call/15-minute-dialogflow-demo?month=2022-09\">Request a demo</a>\n" +
        "            </div>"];
        let counter = 0;
        let elem = document.getElementById("bar_content-wrapper");

        let inst = setInterval(change, 10000);

        function change() {
            if(elem !== null){
                elem.innerHTML = text[counter];
            }
            counter++;

            if(counter < 1){
                $('#content_bar_one').remove();
            }

            if (counter >= text.length) {
                counter = 0;
            }
        }

    }

    function closeCookiesAlert(){

        const closeIcon = document.getElementById('close_cookies_alert');
        const cookieNotice = document.getElementById('cookie_notice');
        const userCookie = read_cookie('user_cookie');

        function read_cookie(key)
        {
            var result;
            return (result = new RegExp('(^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? result[2] : null;
        }

        if(userCookie == 'Close'){
            cookieNotice.classList.add('remove_cookies_alert');
        }

        if(closeIcon !== null){
            closeIcon.addEventListener('click', function(){
                document.cookie = "user_cookie=Close";
                if(cookieNotice !== null){
                    cookieNotice.classList.add('remove_cookies_alert');
                }
            })
        }

    }

    function essoSlider(){
        var $owl = $('.esso_slider');
        $owl.children().each( function( index ) {
            $(this).attr( 'data-position', index );
        });
        $owl.owlCarousel({
            loop:false,
            margin:27,
            mouseDrag: false,
            touchDrag: true,
            nav:true,
            dots: false,
            responsive : {
                0 : {
                    item: 1,
                    center: false
                },
                480 : {
                    item: 1,
                    center: false
                },
                768 : {
                    item: 1,
                    center: false
                },
                992 : {
                    item: 2,
                    center: true
                },
                1000:{
                    item: 3,
                    center: true,
                }
            }
        })

        let sliders = ['1'];

        $('#esso_slider_one').on('click', function(){
            var $speed = 300;
            $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
            $('.owl-stage').removeClass().addClass('owl-stage');
            removeEssActive();
            $('body').find(".esso-slider-item-one").addClass('esso_active_slider')
        })

        $('#esso_slider_two').on('click', function(){
            var $speed = 300;
            $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
            $('.owl-stage').removeClass().addClass('owl-stage second-owl');
            removeEssActive();
            $('body').find(".esso-slider-item-two").addClass('esso_active_slider')
            sliders.splice(0,sliders.length);
            sliders.push('1', '1');
            console.log(sliders)
        })

        $('#esso_slider_three').on('click', function(){
            var $speed = 300;
            $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
            $('.owl-stage').removeClass().addClass('owl-stage third-owl');
            removeEssActive();
            $('body').find(".esso-slider-item-three").addClass('esso_active_slider')
            sliders.splice(0,sliders.length);
            sliders.push('1', '1', '1');
            console.log(sliders)
        })

        $('#esso_slider_four').on('click', function(){
            var $speed = 300;
            $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
            $('.owl-stage').removeClass().addClass('owl-stage four-owl');
            removeEssActive();
            $('body').find(".esso-slider-item-four").addClass('esso_active_slider')
            sliders.splice(0,sliders.length);
            sliders.push('1', '1', '1', '1');
        })

        $('#esso_slider_five').on('click', function(){
            var $speed = 300;
            $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
            $('.owl-stage').removeClass().addClass('owl-stage five-owl');
            removeEssActive();
            $('body').find(".esso-slider-item-five").addClass('esso_active_slider')
            sliders.splice(0,sliders.length);
            sliders.push('1', '1', '1', '1', '1');
        })

        $('#esso_slider_six').on('click', function(){
            var $speed = 300;
            $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
            $('.owl-stage').addClass('six-owl');
            removeEssActive();
            $('body').find(".esso-slider-item-six").addClass('esso_active_slider')
            sliders.splice(0,sliders.length);
            sliders.push('1', '1', '1', '1', '1', '1');
        })

        function removeEssActive() {
            $('.esso-item').each(function () {
                $(this).removeClass("esso_active_slider");
            });
        }

        $('#esso_slider-nav').append($('.owl-nav'));

        const mediaQuery = window.matchMedia('(min-width: 992px)')

        if (mediaQuery.matches) {

            $('.owl-next').on('click', function () {

                if (sliders.length == 1) {
                    $('.owl-stage').addClass('second-owl');
                    sliders.push('1');
                    removeEssActive();
                    $('.owl-next').removeClass('disabled');
                    $('body').find(".esso-slider-item-two").addClass('esso_active_slider')
                } else if (sliders.length == 2) {
                    $('.owl-stage').removeClass('second-owl');
                    $('.owl-stage').addClass('third-owl');
                    sliders.push('1');
                    removeEssActive();
                    $('.owl-next').removeClass('disabled');
                    $('body').find(".esso-slider-item-three").addClass('esso_active_slider')

                } else if (sliders.length == 3) {
                    $('.owl-stage').removeClass('second-owl');
                    $('.owl-stage').removeClass('third-owl');
                    $('.owl-stage').addClass('four-owl');
                    sliders.push('1')
                    removeEssActive()
                    $('.owl-next').removeClass('disabled');
                    $('body').find(".esso-slider-item-four").addClass('esso_active_slider')

                } else if (sliders.length == 4) {
                    $('.owl-stage').removeClass('second-owl');
                    $('.owl-stage').removeClass('third-owl');
                    $('.owl-stage').removeClass('four-owl');
                    $('.owl-stage').addClass('five-owl');
                    sliders.push('1')
                    removeEssActive()
                    $('.owl-next').removeClass('disabled');
                    $('body').find(".esso-slider-item-five").addClass('esso_active_slider')

                } else if (sliders.length == 5) {
                    $('.owl-stage').removeClass('second-owl');
                    $('.owl-stage').removeClass('third-owl');
                    $('.owl-stage').removeClass('four-owl');
                    $('.owl-stage').removeClass('five-owl');
                    $('.owl-stage').addClass('six-owl');
                    sliders.push('1')
                    removeEssActive()
                    $('.owl-next').addClass('disabled');
                    $('body').find(".esso-slider-item-six").addClass('esso_active_slider')
                }else if (sliders.length == 6){
                    $('.owl-stage').removeClass('six-owl-rotation');
                }

            });

            $('.owl-prev').on('click', function () {
                console.log(sliders)
                if (sliders.length == 6) {

                    if ($('.owl-stage').hasClass("six-owl-rotation")) {
                        $('.owl-stage').removeClass('six-owl-rotation');
                    }else{
                        $('.owl-stage').addClass('six-owl-rotation');
                        $('.owl-stage').removeClass('six-owl');
                    }
                    removeEssActive()
                    sliders.pop()
                    $('.owl-prev').removeClass('disabled');
                    $('body').find(".esso-slider-item-five").addClass('esso_active_slider')


                } else if (sliders.length == 5) {
                    $('.owl-stage').removeClass('six-owl-rotation');
                    $('.owl-stage').removeClass('five-owl-rotation');
                    $('.owl-stage').removeClass('five-owl');
                    $('.owl-stage').addClass('four-owl');
                    removeEssActive()
                    sliders.pop()
                    $('.owl-prev').removeClass('disabled');
                    $('body').find(".esso-slider-item-four").addClass('esso_active_slider')

                } else if (sliders.length == 4) {
                    $('.owl-stage').removeClass('five-owl-rotation');
                    $('.owl-stage').removeClass('four-owl-rotation');
                    $('.owl-stage').removeClass('four-owl');
                    $('.owl-stage').addClass('third-owl');
                    removeEssActive()
                    sliders.pop()
                    $('.owl-prev').removeClass('disabled');
                    $('body').find(".esso-slider-item-three").addClass('esso_active_slider')

                } else if (sliders.length == 3 ) {
                    $('.owl-stage').removeClass('four-owl-rotation');
                    $('.owl-stage').removeClass('third-owl-rotation');
                    $('.owl-stage').removeClass('third-owl');
                    $('.owl-stage').addClass('second-owl');
                    removeEssActive()
                    sliders.pop()
                    $('body').find(".esso-slider-item-two").addClass('esso_active_slider')

                } else if (sliders.length == 2) {
                    $('.owl-stage').removeClass('third-owl-rotation');
                    $('.owl-stage').removeClass('second-owl');
                    removeEssActive()
                    $('.owl-prev').addClass('disabled');
                    sliders.pop()
                    $('body').find(".esso-slider-item-one").addClass('esso_active_slider')

                }


            })

            function removeEssActive() {
                $('.esso-item').each(function () {
                    $(this).removeClass("esso_active_slider");
                });
            }

        }

        $('.owl-prev').after($('#esso_counter'));
    }

    function essoSliderMobile(){

        $('.esso-slider-mobile').owlCarousel({
            loop:false,
            margin:10,
            dots: false,
            center: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2,
                    nav:true
                },
                1000:{
                    items:2,
                    nav:true,
                    center: true,
                    loop:false
                }
            }
        })

        $('#esso_mobile_navigation').append($('.owl-nav'));
    }

    function conversationalTabs(){


        $( document ).ready(function() {
            $('#conv-tabs-content').css('height', '582px');
        });

        $("#tab-1").on('click', function(){
            $('#conv-tabs-content').css('height', '582px');
        })
        $("#tab-2").on('click', function(){
            $('#conv-tabs-content').css('height', '564px');
        })
        $("#tab-3").on('click', function(){
            $('#conv-tabs-content').css('height', '654px');
        })
        $("#tab-4").on('click', function(){
            $('#conv-tabs-content').css('height', '419px');
        })
        $("#tab-5").on('click', function(){
           $('#conv-tabs-content').css('height', '550px');
        })

        const tabItems = document.querySelectorAll('.tab-item');
        const tabContentItems = document.querySelectorAll('.tab-content-item');

        function selectItem(e) {
            removeBorder();
            removeShow();
            this.classList.add('tab-border');
            // Grab content item from DOM
            const tabContentItem = document.querySelector(`#${this.id}-content`);
            // Add show class
            tabContentItem.classList.add('show');
        }

        function removeBorder() {
            tabItems.forEach(item => {
                item.classList.remove('tab-border');
            });
        }

        function removeShow() {
            tabContentItems.forEach(item => {
                item.classList.remove('show');
            });
        }

        tabItems.forEach(item => {
            item.addEventListener('click', selectItem);
        });
    }

    function convrCarouselItem(){

        $(".convr_carousel-item").click(function () {
            if ($(this).hasClass("active")){
                $(this).removeClass('active');
            }else{
                removeColor('.convr_carousel-item');
                $(this).addClass('active');

            }
            $(this).next().slideToggle(500);

            $(".convr_carousel-content").not($(this).next()).slideUp(500);

            function removeColor(e){
                $(e).removeClass('active');
            }

        });


        //This part of code should be remvoe when the top-bar will remove

        $('.conversational_btn').on('click', function(){
            $('#ai-page-form').css('padding-top', '195px')
        })

        if( !$(".single-ebooks-whitepapers").length) {

            var lastScrollTop = 0;
            document.addEventListener("scroll", function(){
                var st = window.pageYOffset || document.documentElement.scrollTop;
                if (st > lastScrollTop){
                } else {
                    $('#ai-page-form').css('padding-top', '103px')
                }
                lastScrollTop = st <= 0 ? 0 : st;
            }, false);

        }


    }

    //This part of code should be remvoe when the top-bar will remove

    function getInTouchFixedHeight(){

        $('#get-in-toucht').on('click', function(){
            $('.contact-form-wrapper').css('padding-top', '195px')
        })

        $('.experience-btn').on('click', function(){
            $('.contact-form-wrapper').css('padding-top', '195px')
        })

        $('#get-in-touch').on('click', function(){
            $('.contact-form-wrapper').css('padding-top', '195px')
        })


        if (!$(".single-ebooks-whitepapers").length) {

            let lastScrollTop = 0;
            document.addEventListener("scroll", function () {
                let st = window.pageYOffset || document.documentElement.scrollTop;
                if (st > lastScrollTop) {
                } else {
                    if (!$('body').hasClass('single-post')) {
                        $('.contact-form-wrapper').css('padding-top', '103px')
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st;
            }, false);

        }
    }

    function experienceCarousel(){


        $('.experience-carousel__item').mouseover(function(){
            removeActive()
        });


        $('.experience-carousel__item').mouseout(function(){
            returnActive()
        });


        function removeActive() {
            $('.experience-carousel__item').each(function () {
                $(this).removeClass("active_element");
            });
        }
        function returnActive() {
            $('.experience-carousel__item').each(function () {
                $('#experience-centered').addClass("active_element");
            });
        }


    }

    function SxmCaseSlide(){

        /**
         * Plugin for linking multiple owl instances
         * @version 1.0.0
         * @author David Deutsch
         * @license The MIT License (MIT)
         */
        ;(function($, window, document, undefined) {
            /**
             * Creates the Linked plugin.
             * @class The Linked Plugin
             * @param {Owl} carousel - The Owl Carousel
             */
            var Linked = function(carousel) {
                /**
                 * Reference to the core.
                 * @protected
                 * @type {Owl}
                 */
                this._core = carousel;

                /**
                 * All event handlers.
                 * @protected
                 * @type {Object}
                 */
                this._handlers = {
                    'dragged.owl.carousel changed.owl.carousel': $.proxy(function(e) {
                        if (e.namespace && this._core.settings.linked) {
                            this.update(e);
                        }
                    }, this),
                    'linked.to.owl.carousel': $.proxy(function(e, index, speed, standard, propagate) {
                        if (e.namespace && this._core.settings.linked) {
                            this.toSlide(index, speed, propagate);
                        }
                    }, this)
                };

                // register event handlers
                this._core.$element.on(this._handlers);

                // set default options
                this._core.options = $.extend({}, Linked.Defaults, this._core.options);
            };

            /**
             * Default options.
             * @public
             */
            Linked.Defaults = {
                linked: false
            };

            /**
             * Updated linked instances
             */
            Linked.prototype.update = function(e) {
                this.toSlide( e.relatedTarget.relative(e.item.index) );
            };

            /**
             * Carry out the to.owl.carousel proxy function
             * @param {int} index
             * @param {int} speed
             * @param {bool} propagate
             */
            Linked.prototype.toSlide = function(index, speed, propagate) {
                var id = this._core.$element.attr('id'),
                    linked = typeof(this._core.settings.linked) === 'string' ? this._core.settings.linked.split(',') : this._core.settings.linked;

                if ( typeof propagate == 'undefined' ) {
                    propagate = true;
                }

                index = index || 0;

                if ( propagate ) {
                    $.each(linked, function(i, el){
                        $(el).trigger('linked.to.owl.carousel', [index, 300, true, false]);
                    });
                } else {
                    this._core.$element.trigger('to.owl.carousel', [index, 300, true]);

                    if ( this._core.settings.current ) {
                        this._core._plugins.current.switchTo(index);
                    }
                }
            };

            /**
             * Destroys the plugin.
             * @protected
             */
            Linked.prototype.destroy = function() {
                var handler, property;

                for (handler in this._handlers) {
                    this.$element.off(handler, this._handlers[handler]);
                }
                for (property in Object.getOwnPropertyNames(this)) {
                    typeof this[property] != 'function' && (this[property] = null);
                }
            };

            $.fn.owlCarousel.Constructor.Plugins.linked = Linked;

        })(window.Zepto || window.jQuery, window, document);


        var sync2 = $(".carousel_2");

        sync2.children().each( function( index ) {
            $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
        });

        $(sync2).owlCarousel({
            nav: false,
            loop:true,
            items: 3,
            margin:10,
            center:true,
            linked: sync2.prev(),
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:3,
                }
            }
        }).on('initialized.owl.carousel linked.to.owl.carousel', function() {
            sync2.find('.owl-item.current').removeClass('current');
            var current = sync2.find('.owl-item.active.center').length ? sync2.find('.owl-item.active.center') : sync2.find('.owl-item.active').eq(0);
            current.addClass('current');

        });
        $(document).on('click', '.owl-item>div', function() {
            var $speed = 600;
            sync2.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
        });
    }

    function SxmVideoStarterDescktop() {

            var video1 = document.getElementById("sxm-descktop-video");

            if(video1 !== null){

                video1.currentTime = 0;
                $(".mute-bt").click(function(){
                    if($(this).hasClass("stop"))
                    {
                        var ban_video = document.getElementById("sxm-descktop-video");
                        $("#ban_video").prop('muted', false);
                        $(this).removeClass("stop");
                    }
                    else{
                        var ban_video = document.getElementById("sxm-descktop-video");
                        $("#ban_video").prop('muted', true);
                        $(this).addClass("stop");
                    }
                });
                $(".play-bt").click(function(){
                    $(".play-bt").hide();
                    $(".pause-bt").show();
                    var ban_video = document.getElementById("sxm-descktop-video");
                    if($(".stop-bt").hasClass("active")){
                        ban_video.currentTime = 0;
                    }
                    ban_video.play();
                });
                $(".pause-bt").click(function(){
                    $(".play-bt").show();
                    $(".pause-bt").hide();
                    $(".pause-bt").addClass("active");
                    $(".stop-bt").removeClass("active");
                    var ban_video = document.getElementById("sxm-descktop-video");
                    ban_video.pause();
                });
                $(".stop-bt").click(function(){
                    $(".play-bt").show();
                    $(".pause-bt").hide();
                    $(".pause-bt").removeClass("active");
                    $(".stop-bt").addClass("active");
                    var ban_video = document.getElementById("sxm-descktop-video");
                    stop
                    ban_video.pause();
                });

            }

    }

    function SxmVideoStarterMobile() {

        var video1 = document.getElementById("sxm-mobile-video");

        if(video1 !== null){

            video1.currentTime = 0;
            $(".mute-bt").click(function(){
                if($(this).hasClass("stop"))
                {
                    var ban_video = document.getElementById("sxm-mobile-video");
                    $("#ban_video").prop('muted', false);
                    $(this).removeClass("stop");
                }
                else{
                    var ban_video = document.getElementById("sxm-mobile-video");
                    $("#ban_video").prop('muted', true);
                    $(this).addClass("stop");
                }
            });
            $(".play-bt").click(function(){
                $(".play-bt").hide();
                $(".pause-bt").show();
                var ban_video = document.getElementById("sxm-mobile-video");
                if($(".stop-bt").hasClass("active")){
                    ban_video.currentTime = 0;
                }
                ban_video.play();
            });
            $(".pause-bt").click(function(){
                $(".play-bt").show();
                $(".pause-bt").hide();
                $(".pause-bt").addClass("active");
                $(".stop-bt").removeClass("active");
                var ban_video = document.getElementById("sxm-mobile-video");
                ban_video.pause();
            });
            $(".stop-bt").click(function(){
                $(".play-bt").show();
                $(".pause-bt").hide();
                $(".pause-bt").removeClass("active");
                $(".stop-bt").addClass("active");
                var ban_video = document.getElementById("sxm-mobile-video");
                stop
                ban_video.pause();
            });

        }

    }

    function newTechnologySlider(){
        $('.new-technologies-slider').owlCarousel({
            loop:true,
            margin:10,
            mouseDrag: false,
            touchDrag: true,
            autoplay: true,
            responsiveRefreshRate: 300,
            autoplaySpeed: 700,
            lazyLoad: true,
            nav:true,
            navText : ["<i class='arrow left'></i>","<i class='arrow right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    }

    function removeExtraPadding(){

        window.addEventListener('load', (event) => {
            window.addEventListener('scroll', function() {
                $('.extra_сonversational_item').removeClass('active')
            });
        });

        if (window.location.href.indexOf("onversation_design_offerings") > -1) {
            $("#сonversation_design_offerings").addClass('active')
        }
        if (window.location.href.indexOf("onversational_ai_consulting") > -1) {
            $("#сonversational_ai_consulting").addClass('active')
        }
        if (window.location.href.indexOf("onversation_design_services") > -1) {
            $("#сonversation_design_services").addClass('active')
        }
        if (window.location.href.indexOf("onversation_design_training") > -1) {
            $("#сonversation_design_training").addClass('active')
        }

    }

});

