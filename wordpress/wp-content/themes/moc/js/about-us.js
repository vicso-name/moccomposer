"use strict";$(document).ready((function(){$(".testimonials").owlCarousel({center:!0,items:3,loop:!1,nav:!1,dots:!1,mouseDrag:!1,touchDrag:!0,autoplay:!0,responsiveRefreshRate:300,autoplaySpeed:700,lazyLoad:!0,responsive:{0:{items:1,autoplay:!0,loop:!0,center:!0,dots:!0},768:{items:2,autoplay:!0,loop:!0,center:!0,dots:!0},989:{items:3,loop:!1,center:!1,dots:!0,autoHeight:!0}}}),$(".owl-item, .owl-prev, .owl-next, .owl-dot").on("click",(function(){$(".testimonials").trigger("autoplay.stop.owl");var o=$(".testimonials").data("owl.carousel");o.settings.autoplay=!1,o.options.autoplay=!1,$(".testimonials").trigger("refresh.owl.carousel")})),$(".owl-item, .owl-prev, .owl-next, .owl-dot").on({touchstart:function(){$(".testimonials").trigger("autoplay.stop.owl");var o=$(".testimonials").data("owl.carousel");o.settings.autoplay=!1,o.options.autoplay=!1,$(".testimonials").trigger("refresh.owl.carousel")},touchmove:function(){$(".testimonials").trigger("autoplay.stop.owl");var o=$(".testimonialsl").data("owl.carousel");o.settings.autoplay=!1,o.options.autoplay=!1,$(".owl-bpa-carousel").trigger("refresh.owl.carousel")}}),$(".lifecycle-carusel").owlCarousel({center:!0,items:3,loop:!1,nav:!1,dots:!1,mouseDrag:!1,touchDrag:!0,autoplay:!0,responsiveRefreshRate:300,autoplaySpeed:700,lazyLoad:!0,responsive:{0:{items:1,autoplay:!0,loop:!0,center:!0,dots:!0},768:{items:4,autoplay:!1,loop:!1,center:!1}}}),$(".owl-item, .owl-prev, .owl-next, .owl-dot").on("click",(function(){$(".lifecycle-carusel").trigger("autoplay.stop.owl");var o=$(".lifecycle-carusel").data("owl.carousel");o.settings.autoplay=!1,o.options.autoplay=!1,$(".lifecycle-carusel").trigger("refresh.owl.carousel")})),$(".owl-item, .owl-prev, .owl-next, .owl-dot").on({touchstart:function(){$(".lifecycle-carusel").trigger("autoplay.stop.owl");var o=$(".lifecycle-carusel").data("owl.carousel");o.settings.autoplay=!1,o.options.autoplay=!1,$(".lifecycle-carusel").trigger("refresh.owl.carousel")},touchmove:function(){$(".lifecycle-carusel").trigger("autoplay.stop.owl");var o=$(".lifecycle-carusel").data("owl.carousel");o.settings.autoplay=!1,o.options.autoplay=!1,$(".owl-bpa-carousel").trigger("refresh.owl.carousel")}})})),$(window).on("load",(function(){$("video").click((function(){this.paused?(this.play(),$("#hero-video-start").addClass("playing"),$("#hero-video-start").removeClass("hovered")):(this.pause(),$("#hero-video-start").removeClass("playing"),$("#hero-video-start").addClass("hovered"))})),$("#hero-video-start").click((function(){$(this).hasClass("playing")?($("video").trigger("pause"),$("video").removeClass("playing"),$("#hero-video-start").removeClass("playing")):($("video").trigger("play"),$("video").addClass("playing"),$("#hero-video-start").addClass("playing"))}))}));
//# sourceMappingURL=about-us.js.map
