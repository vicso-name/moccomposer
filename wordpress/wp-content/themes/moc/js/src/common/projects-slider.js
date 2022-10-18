function projectSlider () {
  jQuery(document).ready(function () {
    var isMobile = false;
    var owlSettings = {
      margin: 0,
      loop: true,
      nav: true,
      dots: true,
      items: 1,
      smartSpeed: 6000,
      autoplaySpeed: 6000,
      mouseDrag: true,
      touchDrag: true,
      autoplay: true,
      responsiveRefreshRate: 300,
      animateIn: 'fadeIn',
      animateOut: 'fadeOut',
      lazyLoad: true,
      lazyLoadEager: 1
    };

    if ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
      owlSettings.mouseDrag = false;
      owlSettings.touchDrag = true;
      isMobile = true;
    }

    var projectCarousel = jQuery('.projects-slider');

    if (projectCarousel.length) {
      var projectOwlSettings = owlSettings;
      projectOwlSettings['autoplayTimeout'] = '6000';
      var ProjectOwl = jQuery('#owl-projects-carousel');
      ProjectOwl.owlCarousel(projectOwlSettings);
      var currentSlider = projectCarousel;

      // stop on click, touch
      jQuery('.slide-wrapper').on('click touchend', function() {
        currentSlider.trigger('stop.owl.autoplay');
      });

      jQuery('.owl-nav button, .owl-dots button').on('click', function() {
        currentSlider.trigger('stop.owl.autoplay');
      });
    }

    //for slider animation logic
    let projectSlider = $('.projects-slider');

    $('.owl-prev').click(function() {
      projectSlider.addClass('move-prev').removeClass('move-next');
    });

    $('.owl-next').click(function() {
      projectSlider.addClass('move-next').removeClass('move-prev');
    });

    $('.owl-dot').click(function() {
      projectSlider.removeClass('move-prev move-next autoplay');
    });

    let owlAutoplay = projectSlider.trigger('play.owl.autoplay');

    if (owlAutoplay) {
      projectSlider.removeClass('move-prev move-next').addClass('autoplay');
    }
  })
}
