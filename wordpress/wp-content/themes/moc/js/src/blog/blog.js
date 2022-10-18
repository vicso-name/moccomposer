function blog() {

    if ((jQuery(".blog-wrap").length) || (jQuery(".single-blogpost-wrap").length) || (jQuery(".kb-post").length)||
        (jQuery(".search").length)) {
        var startWidth = document.documentElement.clientWidth,
            postsToLoad = 6,
            isSidebarVisible = false;
        var blog = {
            config: {
                subscribeBlock: jQuery("#subscribe-block"),
                subscribeLink: jQuery('[data-open-menu="subscribe"]'),
                downloadLink: jQuery('[data-open-menu="download"]'),
                subscribeCloseLink: jQuery("#subscribe-close-btn"),
                downloadCloseLink: jQuery("#download-close-btn"),
                subscribeBtn: jQuery("#subscribe-btn"),
                subscribeEmailField: jQuery("#subscribe-block").find('input[type="email"]'),
                // nav: jQuery("#top_bar").find("ul.fixed-list"),
                nav: jQuery("#top_bar").find("ul.get-in-touch-wrapper"),
                search: jQuery(".search-overlay"),
                subscribeWindow: jQuery(window),
                subscribeBody: jQuery('body'),
                searchBtn: jQuery("#top_bar").find('#search-nav'),
                loadMore: jQuery('#load-more-posts'),
                blogList: jQuery('#blog-list'),
                socialWrap: jQuery('#post-social'),
                topSocialWrap: jQuery('#top-post-social'),
                facebookSvg: "<svg aria-label='Share to Facebook'><use xlink:href='#social-facebook'></use></svg>",
                twitterSvg: "<svg aria-label='Share to Twitter'><use xlink:href='#social-twitter'></use></svg>",
                linkedinSvg: "<svg aria-label='Share to Linkedin'><use xlink:href='#social-linkedin'></use></svg>",
                googleSvg: "<svg aria-label='Share to Google'><use xlink:href='#social-google'></use></svg>",
                feedbackForm: jQuery('#feedback_form'),
                feedbackBlock: jQuery('#feedback_form').find('.feedback-block'),
                feedbackControlsBlock: jQuery('#feedback-conrols-wrapper')
            },
            unFocusSubscribe: function () {
                var screenWidth = document.documentElement.clientWidth;
                if (screenWidth !== startWidth) {
                    blog.config.subscribeEmailField.blur();
                    startWidth = screenWidth;
                }
                // if (blog.config.subscribeBlock.hasClass('menu-opened')) {
                //     // jQuery('[data-menu="main"]').removeClass('menu-opened').addClass('menu-closed');
                //     blog.config.subscribeBlock.removeClass('menu-closed');
                //     blog.config.subscribeBody.addClass('with-menu-opened');
                // }
            },
            addSearch: function () {
                // this.config.nav.prepend("<li class='search'><a href='#' id='search-nav' data-open-menu='search'><svg aria-label='Search'><use xlink:href='#search-icon'></use></svg></a></li>");
                this.config.searchBtn = jQuery("#search-nav");
                this.config.searchCloseBtn = jQuery("#search-close-btn");
                this.config.searchIcon = jQuery("#search-icon");
            },
            preLoadPosts: function () {
                var postsCount = parseInt(window.location.hash.substring([1]));
                if (postsCount > 7) {
                    postsToLoad = postsCount - 7;
                    blog.ajaxPostsLoader();
                }
            },
            ajaxPostsLoader: function () {
                blog.showOverlay();
                if (typeof blogVars !== undefined) blogVars.ajaxUrl = jQuery('#blog-vars').html();
                var postsCount = blog.config.blogList.find('li').length;
                $.ajax({
                    type: 'POST',
                    url: blogVars.ajaxUrl,
                    data: {
                        'action': 'load_posts',
                        'from_num': postsCount,
                        'count': postsToLoad
                    },
                    success: function (data) {
                        data = JSON.parse(data);
                        blog.loadMoreSuccess(data);
                    }
                });
            },
            loadMore: function (e) {
                e.preventDefault();
                postsToLoad = 6;
                blog.ajaxPostsLoader();
            },
            loadMoreSuccess: function (data) {
                blog.preloadImages(data.images, 'addNewPosts', data);
            },
            addNewPosts: function (data) {
                if (data) {
                    blog.config.blogList.append(data.html);
                }
                if (!data || data.posts_end) {
                    blog.config.loadMore.hide();
                }
                blog.hideOverlay();
                window.location.hash = blog.config.blogList.find('li').length;
            },
            preloadImages: function (images, successLoadFunction, data) {
                var i,
                    img = [],
                    imgLoaded = 0,
                    imgCount = images.length;

                for (i = 0; i < imgCount; i++) {
                    img[i] = new Image();
                    img[i].onload = function () {
                        imgLoaded++;
                        if (imgCount === imgLoaded) {
                            blog.addNewPosts(data);
                        }
                    };
                    img[i].onerror = function () {
                        blog.hideOverlay();
                        blog.config.loadMore.hide();
                    };
                    img[i].src = images[i];
                }
            },
            showOverlay: function () {
                jQuery('#load-more-posts').addClass('with-loader');
            },
            hideOverlay: function () {
                jQuery('#load-more-posts').removeClass('with-loader');
            },
            addSocialSvg: function () {
                if (blog.config.socialWrap.length) {
                    appendSvg(blog.config.socialWrap);
                }
                if (blog.config.topSocialWrap.length) {
                    appendSvg(blog.config.topSocialWrap);
                }

                function appendSvg(wrap) {
                    wrap.find(".ssba_facebook_share").append(blog.config.facebookSvg);
                    wrap.find(".ssba_twitter_share").append(blog.config.twitterSvg);
                    wrap.find(".ssba_linkedin_share").append(blog.config.linkedinSvg);
                    wrap.find(".ssba_google_share").append(blog.config.googleSvg);
                };
                controlSidebarScroll(blog.config.socialWrap);
            },
            fixTargetBlank: function () {
                if ((navigator.userAgent.indexOf("FBAN") > -1) || (navigator.userAgent.indexOf("FBAV") > -1)) {
                    jQuery('.blog-post-content').find('a').each(function () {
                        this.removeAttribute('target');
                    });
                }
            },
            highlightCode: function () {
                setTimeout(function () {
                    jQuery('p code').each(function (i, block) {
                        hljs.highlightBlock(block);
                    });
                }, 1000);

            },
            showFeedback: function () {
                var postId = jQuery('#post_id').val(),
                    blockClass;

                if (getCookie('feedback' + postId)) {
                    blockClass = 'feedback-responded';
                    this.config.feedbackControlsBlock.html('');
                } else {
                    blockClass = 'feedback-visible';
                }

                this.config.feedbackBlock.addClass(blockClass);
            },
            init: function () {
                this.addSearch();
                this.config.subscribeWindow.on("resize", this.unFocusSubscribe);
                this.config.loadMore.on("click", this.loadMore);
                this.addSocialSvg();
                this.preLoadPosts();
                this.fixTargetBlank();
                this.highlightCode();
                this.showFeedback();
            }
        };
        blog.init();

        jQuery('#negative-submit').click(function () {
            jQuery('form.blog_feedback').find('#feedback_type').val('No');
        });

        jQuery('#feedback-content').on('keyup', function () {
            var elem = this;
            if (elem.value == "") {
                jQuery('.grey-btn').addClass('disabled').attr('disabled', true);
            } else {
                jQuery('.grey-btn').removeClass('disabled').attr('disabled', false);
            }
        });

        jQuery('#feedback-content').on('blur', function () {
            var elem = this;
            if (elem.value == "") {
                jQuery(elem).removeClass('filled');
                jQuery('.grey-btn').addClass('disabled').attr('disabled', true);
            } else {
                jQuery(elem).addClass('filled');
            }
        });

        jQuery(document).on('click', '[data-send="feedback"]', function (event) {

            event.preventDefault();
            jQuery('.feedback-btn').addClass('disabled').attr('disabled', true);
            jQuery('[data-send="feedback"]').addClass('disabled').attr('disabled', true);
            jQuery('body').removeClass('with-menu-opened');
            var base_url = window.location.origin;
            var feedbackForm = jQuery('form.blog_feedback'),
                postId = feedbackForm.find('#post_id').val(),
                feedbackLike = feedbackForm.find('#feedback_type').val(),
                feedbackContent = feedbackForm.find('#feedback-content').val(),
                postTitle = feedbackForm.find('.post-title').val(),
                feedbackInfo = feedbackForm.find('.feedback_info').val(),
                feedbackIp = feedbackForm.find('.feedback_ip').val(),
                emailList = feedbackForm.find('.email-list').val();

            if (feedbackContent.length > 600) feedbackContent = feedbackContent.substring(0, 599);
            jQuery('.feedback-block').addClass('feedback-done');
            jQuery('[data-popup="feedback"]').removeClass('popup-fixed');
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
                jQuery('html, body').animate({
                    scrollTop: jQuery("#feedback_form").offset().top - 200
                }, 800);
            $.ajax({
                type: "POST",
                url: base_url + "/wp-admin/admin-ajax.php",
                data: {
                    'post_id': postId,
                    'feedback_like': feedbackLike,
                    'feedback_content': feedbackContent,
                    'post_title': postTitle,
                    'feedback_info': feedbackInfo,
                    'feedback_ip': feedbackIp,
                    'email_list': emailList,
                    'action': 'save_feedback'
                }
            })
                .done(function () {
                    // jQuery('.feedback-block').addClass('feedback-done');
                })
                .fail(function () {
                    console.log("something happened - feedback didn't sent:(");
                })
                .always(function () {
                    if ((document.cookie)) {
                        var postId = jQuery('#post_id').val();
                        if (typeof postId != 'undefined') {
                            document.cookie = 'feedback' + postId + '=true';
                        }
                    }
                });

            return false;
        });
    }
    ;


    function controlSidebarScroll(element) {
        var w = window;
        var isMobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
        var deviceWidth = w.innerWidth;
        var deviceHeight = w.innerHeight;
        var offsetTop = w.pageYOffset;
        var fullBodyHeight = document.body.getBoundingClientRect().height;
        var footerHeight = document.querySelector('.main-footer').offsetHeight;
        var timeToHideSidebar = fullBodyHeight - footerHeight - deviceHeight;
        var scrollTimer,
            resizeTimer;

        if (isMobile) return;

        // checkSidebarVisibility(w.pageYOffset, deviceHeight, timeToHideSidebar, element);
        w.addEventListener('scroll', function (event) {
            // clearTimeout(scrollTimer);
            // scrollTimer = setTimeout(
            //     function() {
            offsetTop = w.pageYOffset;
            checkSidebarVisibility(offsetTop, deviceHeight, timeToHideSidebar, element);
            // },
            // 100);
        });
        w.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(
                function () {
                    recalculatePositions();
                    checkSidebarVisibility(w.pageYOffset, deviceHeight, timeToHideSidebar, element);
                },
                150);
        });

        function recalculatePositions() {
            deviceWidth = w.innerWidth;
            deviceHeight = w.innerHeight;
            offsetTop = w.pageYOffset;
            fullBodyHeight = document.body.offsetHeight;
            footerHeight = document.querySelector('.main-footer').offsetHeight;
            timeToHideSidebar = fullBodyHeight - footerHeight - deviceHeight;
        };


        function checkSidebarVisibility(offsetTop, deviceHeight, timeToHideSidebar, element) {
            if ((offsetTop < deviceHeight) || (offsetTop > timeToHideSidebar)) {
                if (isSidebarVisible) {
                    element.addClass('invisible');
                    isSidebarVisible = false;
                }
            } else {
                if (!isSidebarVisible) {
                    element.removeClass('invisible');
                    recalculatePositions();
                    isSidebarVisible = true;
                }

            }
            ;
        };
    };

    function addLink() {
        //Get the selected text and append the extra info
        const selection = window.getSelection();
        const pagelink = document.location.href;
        //const copytext = selection + pagelink;
        const copytext = selection + "<br>Read more at: <a href='" + pagelink + "'>" + pagelink + "</a>";
        //Create a new div to hold the prepared text
        const newdiv = document.createElement('div');

        //hide the newly created container
        newdiv.style.position = 'absolute';
        newdiv.style.left = '-99999px';

        //insert the container, fill it with the extended text, and define the new selection
        document.body.appendChild(newdiv);
        newdiv.innerHTML = copytext;
        selection.selectAllChildren(newdiv);

        window.setTimeout(function () {
            document.body.removeChild(newdiv);
        }, 100);
    }

    document.addEventListener('copy', addLink);


    if (jQuery('.contact-form-wrapper').length) {
        const formInputs = document.querySelectorAll('.form-control')
        try {
            for (var m = 0; m < formInputs.length; m++) {
                var input = formInputs[m]
                unfocusIt(input)
                input.addEventListener('focus', function () {
                    focusIt(this)
                })
                input.addEventListener('blur', function () {
                    unfocusIt(this)
                })
            }
        } catch (e) {
            console.log('not supported')
            jQuery('.label').addClass('unfocus-label')
        }
    }

    function focusIt(elem) {
        var label = document.querySelector('label[for="' + elem.getAttribute('id') + '"]')

        if (label !== null) {
            label.classList.remove('unfocus-label')
        }
        ;
    }

    function unfocusIt(elem) {
        var label = document.querySelector('label[for="' + elem.getAttribute('id') + '"]')
        if (label !== null) {
            if (elem.value === '') {
                elem.classList.remove('filled')
                label.classList.add('unfocus-label')
            } else {
                elem.classList.add('filled')
                label.classList.remove('unfocus-label')
            }
        }
    }

    //Subscribe form
    if (jQuery('.subscribe-block').length) {

        function afterSubmitForm(parent){
            jQuery(`${parent} .wpcf7`).on('wpcf7mailsent', function () {
                $(this).find('input').css('display', 'none');
                $(this).closest(`${parent}`).find('.subscribe-title').css('display', 'none');
                $(this).closest(`${parent}`).find('.confirmation-text').css('display', 'none');
                $(this).closest(`${parent}`).find('.subscribe-input-wrapper').css('display', 'none');
                $(this).closest(`${parent}`).find('.wpcf7-response-output').css('display', 'none');
                $(this).closest(`${parent}`).find('.response').css('display', 'block');
                $(this).closest(`${parent}`).find('.show-on-success').css('display', 'block');
                $(this).closest(`${parent}`).find('.icon--order-success').addClass('onshow');
            });
        }

        afterSubmitForm('#subscribe-block');
        afterSubmitForm('#download-block');
    }

    const downloadBtn = $('.blog-download-block .js-download-pdf');
    let pdfData, tagData, titleData;
    $( downloadBtn ).each(function(index) {
        $(this).on("click", function(){
             pdfData= $(this).attr('data-pdf-link');
             tagData= $(this).attr('data-tag');
             titleData= $(this).attr('data-title');
             console.log(pdfData);

             $('#download-form').attr('pdf-link', pdfData)
                 .attr('data-tag', tagData)
                 .attr('data-title', titleData);
        });
    });

    // Custom audio player for blog

    const audioPlayer = document.querySelector(".audio-player");

    if(audioPlayer) {
        const audioPlayerLink = audioPlayer.dataset.audio;
        const audio = new Audio(
            audioPlayerLink
        );
//credit for song: Adrian kreativaweb@gmail.com
        audio.addEventListener(
            "loadeddata",
            () => {
                audioPlayer.querySelector(".time .length").textContent = getTimeCodeFromNum(
                    audio.duration
                );
                audio.volume = 1;
            },
            false
        );

//click on timeline to skip around
        const timeline = audioPlayer.querySelector(".timeline");
        timeline.addEventListener("click", e => {
            const timelineWidth = window.getComputedStyle(timeline).width;
            const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio.duration;
            audio.currentTime = timeToSeek;
        }, false);

//click volume slider to change volume
        const volumeSlider = audioPlayer.querySelector(".controls .volume-slider");
        volumeSlider.addEventListener('click', e => {
            const sliderWidth = window.getComputedStyle(volumeSlider).width;
            const newVolume = e.offsetX / parseInt(sliderWidth);
            audio.volume = newVolume;
            audioPlayer.querySelector(".controls .volume-percentage").style.width = newVolume * 100 + '%';
        }, false)

//check audio percentage and update time accordingly
        setInterval(() => {
            const progressBar = audioPlayer.querySelector(".progress");
            progressBar.style.width = audio.currentTime / audio.duration * 100 + "%";
            audioPlayer.querySelector(".time .current").textContent = getTimeCodeFromNum(
                audio.currentTime
            );
        }, 500);

//toggle between playing and pausing on button click
        const playBtn = audioPlayer.querySelector(".controls .toggle-play");
        const playBtnImg = audioPlayer.querySelector(".controls .play-pause-img");
        playBtn.addEventListener(
            "click",
            () => {
                if (audio.paused) {
                    playBtn.classList.remove("play");
                    playBtn.classList.add("pause");
                    playBtnImg.src = "/wp-content/themes/moc/images/blog/pause.png"
                    audio.play();
                } else {
                    playBtn.classList.remove("pause");
                    playBtn.classList.add("play");
                    playBtnImg.src = "/wp-content/themes/moc/images/blog/play.png";
                    audio.pause();
                }
            },
            false
        );

        audioPlayer.querySelector(".volume-button").addEventListener("click", () => {
            const volumeEl = audioPlayer.querySelector(".volume-container .volume");
            audio.muted = !audio.muted;
            if (audio.muted) {
                volumeEl.classList.remove("icono-volumeMedium");
                volumeEl.classList.add("icono-volumeMute");
            } else {
                volumeEl.classList.add("icono-volumeMedium");
                volumeEl.classList.remove("icono-volumeMute");
            }
        });

//turn 128 seconds into 2:08
        function getTimeCodeFromNum(num) {
            let seconds = parseInt(num);
            let minutes = parseInt(seconds / 60);
            seconds -= minutes * 60;
            const hours = parseInt(minutes / 60);
            minutes -= hours * 60;

            if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
            return `${String(hours).padStart(2, 0)}:${minutes}:${String(
                seconds % 60
            ).padStart(2, 0)}`;
        }
    }
}

//use preventDefault for keypress on Enter key
jQuery(function () {
    jQuery('.search-field').keypress(function (event) {
        var code = event.keyCode || event.which;
        if (code == 13) {
            event.preventDefault();
            if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
                jQuery("#search-field").blur();
            }
        }
    });

});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

