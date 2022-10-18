function launch () {
  if (document.querySelector('.launch-page') === null) return
  var startHeight = 1

  var scrollBtn = jQuery('#scroll-arrow')

  var counterStarted = false
  var owlSettings = {
    margin: 0,
    loop: true,
    nav: false,
    dots: false,
    items: 1,
    autoplay: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    lazyLoad: true,
    lazyLoadEager: 1
  }

  if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) || (window.innerWidth < 800)) {
    fixMobileHeight()
    window.addEventListener('resize', function (event) {
      fixMobileHeight()
    })

    var backgroundVideo = document.getElementById('bgvideo')

    var backgroundVideoWrapper = jQuery('.bg-video-wrapper')
    // var srcUrl = document.getElementById('video-url').innerHTML;
    if (backgroundVideo != null) {
      backgroundVideo.setAttribute('src', '')
      backgroundVideoWrapper.css('display', 'none')
    };
    counterStarted = true
    if (jQuery('#infographics').length) jQuery('#infographics').find('.js-counter').addClass('js-counter finished')
  };

  var testimonialCarousel = jQuery('.testimonial-slider')

  var sliderPause

  if (testimonialCarousel.length) {
    if ((jQuery('[data-pause]') != null) && (jQuery('[data-pause]').length)) {
      sliderPause = '' + (1000 * parseInt(jQuery('[data-pause]')[0].getAttribute('data-pause')))
    } else sliderPause = '' + 5000
    var testimonialOwl = jQuery('#testimonial-slider')
    var testimonialOwlSettings = owlSettings
    testimonialOwlSettings['onInitialize'] = setActiveItem('testimonials-pager__item')
    testimonialOwlSettings['autoplayTimeout'] = sliderPause
    testimonialOwl.owlCarousel(testimonialOwlSettings)

    testimonialOwl.on('translated.owl.carousel', function (event) {
      activePagerOnTranslate('testimonials-pager__item', testimonialOwl)
    })

    testimonialOwl.on('dragged.owl.carousel', function (event) {
      endDragSlider('testimonials-pager__item', testimonialOwl)
    })

    jQuery('.testimonials-pager__item').click(function () {
      pageSlider('testimonials-pager__item', jQuery(this), testimonialOwl)
    })
  }

  // pager - owl slider: pagination. start-stop
  function pageSlider (pagerClass, activeItem, currentSlider) {
    jQuery('.' + pagerClass).removeClass('active')
    currentSlider.trigger('to.owl.carousel', [activeItem.index(), 300])
    if (jQuery('.' + pagerClass).hasClass('stopped')) {
      currentSlider.trigger('play.owl.autoplay', [5000])
    };
    activeItem.addClass('active stopped')
    currentSlider.trigger('stop.owl.autoplay')
  }
  function dragSlider (direction, currentSlider) {
    currentSlider.addClass(direction)
  }
  function endDragSlider (pagerClass, currentSlider) {
    currentSlider.removeClass('left').removeClass('right')
    jQuery('.' + pagerClass).removeClass('active')
    var activeSlide = jQuery('.owl-item.active').find('.project-slide').attr('data-dote')
    if (jQuery('.' + pagerClass).hasClass('stopped')) {
      currentSlider.trigger('play.owl.autoplay', [5000])
    };
    jQuery('.' + pagerClass + '[data-dote="' + activeSlide + '"]').addClass('active stopped')
    currentSlider.trigger('stop.owl.autoplay')
  }
  function activePagerOnTranslate (pagerClass, currentSlider) {
    var activeSlide = parseInt(currentSlider.find('.owl-item.active .item').attr('data-dote'))
    jQuery('.' + pagerClass).removeClass('active').removeClass('done')
    jQuery('.' + pagerClass + '[data-dote="' + activeSlide + '"]').addClass('active')
    // for (var i = 0; i < activeSlide; i++) {
    //   jQuery('.' + pagerClass + '[data-dote="' + i + '"]').addClass('done')
    // };
  }
  function setActiveItem (pagerClass) {
    jQuery('.' + pagerClass + '[data-dote="0"]').addClass('active')
  }

  // get in touch and estimate button click

  jQuery('[data-get-in-touch]').on('click', function (evt) {
    evt.preventDefault()
    // close mobile menu if opened
    jQuery('[data-menu]').removeClass('menu-opened')
    jQuery('body').removeClass('with-menu-opened')
    jQuery('html, body').animate({
      scrollTop: jQuery('#estimate-project-form').offset().top - 40
    }, 800)
  })

  if (isQuantityChanged) {
    this.alertMessages.push(Messages.asset_quantity_changed);
  }

  // Stick the #nav to the top of the window
  var nav = jQuery('#top_bar')
  var navHomeY = jQuery('.header-wrapper').offset().top
  var isFixed = false
  var $w = jQuery(window)
  // scroll by click on arrow
  scrollBtn.on('click', function (evt) {
    evt.preventDefault()
    jQuery('html, body').animate({
      scrollTop: jQuery('#services-top').offset().top + 5
    }, 800)
  })
  // fix menu when page loaded
  var scrollTop = $w.scrollTop()
  var shouldBeFixed = scrollTop > navHomeY
  if (shouldBeFixed && !isFixed) {
    isFixed = true
    nav.addClass('top-fixed-header')
  }
  // counters animation if nesessary when page loaded
  if ((jQuery('[data-counter]').length) || (counterStarted)) {
    // console.log('data-counter length, counter started');
    jQuery('#infographics').find('.js-counter').addClass('js-counter finished')
    counterStarted = true
  } else counterStarted = false

  // checkCountersAnimation(scrollTop, 'infographics', 500);

  // all event and functions for scroll

  $w.scroll(function () {
    scrollTop = $w.scrollTop()
    shouldBeFixed = scrollTop > navHomeY

    if (shouldBeFixed && !isFixed) {
      isFixed = true
      nav.addClass('top-fixed-header')
    } else if (!shouldBeFixed && isFixed) {
      isFixed = false
      nav.removeClass('top-fixed-header')
    }
    if ((!counterStarted) && (jQuery('#infographics').length)) {
      checkCountersAnimation(scrollTop, 'infographics', 500)
    }
  })

  var callCounter = function (targetCounter, order, elapsedTime) {
    var count = parseInt(targetCounter.innerHTML)
    if (isNaN(count) || (count < 1)) {
      targetCounter.className = 'js-counter finished'
    } else {
      var k = 0

      // time = Math.trunc(elapsedTime/count),

      var time = parseInt(elapsedTime / count)

      var step = 1
      if (time < 4) {
        time = 4
        // step = Math.round(count*4/elapsedTime);
        step = parseInt(count * 4 / elapsedTime)
      }
      var timeout = function () {
        targetCounter.className = 'js-counter counted'
        setTimeout(function () {
          k += step

          if (k >= count) {
            targetCounter.innerHTML = '' + count
            targetCounter.className = 'js-counter finished'
          } else {
            targetCounter.innerHTML = '' + k
            timeout()
          }
        }, time)
      }
      setTimeout(function () { timeout() }, order * elapsedTime)
    }
  }

  var checkCountersAnimation = function (scrollTop, countersListId, itemTimeout) {
    if (typeof jQuery('#' + countersListId) === 'undefined' || jQuery('#' + countersListId) === null) {
      counterStarted = true
      return
    }
    var infographicsTop = jQuery('#' + countersListId).offset().top
    var viewPortHeight = window.innerHeight
    if (((infographicsTop - viewPortHeight) < scrollTop) && (infographicsTop > scrollTop) && !counterStarted) {
      var newArray = createCountersArray(countersListId)
      counterStarted = true
      for (var i = 0; i < newArray.length; i++) {
        var activeCounter = document.getElementById(newArray[i])
        jQuery('#' + newArray[i]).addClass('pre-count')
        callCounter(activeCounter, i, itemTimeout)
      }
    }
  }

  var createCountersArray = function (countersListId) {
    var numbersArray = []
    jQuery('#' + countersListId).find('.js-counter').each(function () {
      numbersArray.push(this.getAttribute('id'))
    })
    return numbersArray
  }

  function fixMobileHeight () {
    var viewportHeight = screen.height
    var screenHeight = document.documentElement.clientHeight
    if ((screenHeight / startHeight <= 0.75) || (startHeight / screenHeight <= 0.75)) {
      jQuery('.js-full-height').css('height', screenHeight)
      startHeight = screenHeight
    }
  };

  var observeScroll = function () {
    window.requestAnimationFrame(observeScroll)
    scrollTop = $w.scrollTop()
    shouldBeFixed = scrollTop > navHomeY

    if (shouldBeFixed && !isFixed) {
      isFixed = true
      nav.addClass('top-fixed-header')
    } else if (!shouldBeFixed && isFixed) {
      isFixed = false
      nav.removeClass('top-fixed-header')
    }
    if ((!counterStarted) && (jQuery('#infographics').length)) {
      checkCountersAnimation(scrollTop, 'infographics', 500)
    };
  }

  observeScroll()
};
