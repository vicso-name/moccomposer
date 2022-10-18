function portfolio () {
  if ((!jQuery('body').is('.page-portfolio')) && (!jQuery('#projects-list').length)) return
  var hashParse = function (hash) {
    return hash.split('?')
  }

  if (jQuery('[data-tabs-block]').length) {
    if (window.location.hash) {
      var hash = hashParse(window.location.hash.substring(1))[0];
      if (hash.length <= 1) hash = 'all';
      var postsCount = parseInt(hashParse(window.location.hash.substring(1))[1]);
      if (postsCount > 6) {
        loadPosts(postsCount - 6)
      };
    };
  };

  jQuery(document).on('click', '#load-more', function (e) {
    e.preventDefault();
    jQuery('#load-more').addClass('with-loader');
    var projectsCount = 6;
    loadPosts(projectsCount)
  });

  function loadPosts (projectsCount) {
    var categoryId = 'all';

    var currentProjectCount = jQuery('.tab-content.active li').length;

    var hideCat;

    var $loadMore;
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      data: {
        'action': 'load_projects',
        'category_id': categoryId,
        'from_num': currentProjectCount,
        'projects_count': projectsCount
      },
      success: function (data) {
        data = JSON.parse(data);

        if (data) {
          jQuery('.tab-content.active > .projects-list').append(data.project_html)
        }

        if (!data || data.projects_end) {
          $loadMore = jQuery('#load-more')
          hideCat = $loadMore.attr('data-hide-cat');
          $loadMore.attr('data-hide-cat', hideCat + ',' + categoryId).hide()
        }
        jQuery('#load-more').removeClass('with-loader');
        var hash = hashParse(window.location.hash)[0];
        window.location.hash = hash + '?' + jQuery('.tab-content.active li').length;
        addInvertColor('to-inversion')
      },
      error: function (data) {
        jQuery('#load-more').removeClass('with-loader')
      }

    })
  }

  jQuery(document).ready(function () {
    if (document.body.classList.contains('page-portfolio')) {
      var $loadMore = jQuery('#load-more');

      var hash;

      var $link;

      var catId;

      if (window.location.hash) {
        hash = hashParse(window.location.hash)[0]
        if (hash.length <= 1) hash = '#all'
        $link = jQuery('a[href="' + hash + '"]')

        if ($link.length) {
          catId = $link.parent().attr('data-category')
        } else {
          catId = 'all'
        }
      } else {
        catId = 'all'
      }
      // if (aContainsB($loadMore.attr('data-hide-cat'), catId)) { $loadMore.hide() }
    }

    if (window.navigator.userAgent.indexOf('rv:11') > -1) {
      jQuery('body').addClass('ie11')
    };

    addInvertColor('to-inversion')
  })
  function addInvertColor (blockClass) {
    jQuery('.' + blockClass).each(function () {
      var color = '#333'

      var colorToInvert
      var textToInvertColor = jQuery(this).parent('a').find('.project-item-description')
      colorToInvert = jQuery(this).css('background-color')
      if (typeof colorToInvert !== 'undefined') {
        color = invertRGB(colorToInvert)
      }
      ;
      textToInvertColor.css('color', color)
      this.classList.remove(blockClass)
    })
  };

  function invertRGB (rgbColor) {
    var color = rgbColor

    var resColor = '#ffffff'
    color = color.replace('rgb(', '').replace(')', '').split(',') // remove #
    var result = 0
    for (var i = 0; i < color.length; i++) {
      result += 255 - parseInt(color[i])
    }
    if (result < 255 * (color.length / 2)) resColor = '#333333'
    return resColor
  };
};
