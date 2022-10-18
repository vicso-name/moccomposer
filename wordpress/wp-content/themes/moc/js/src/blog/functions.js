/**
 * [--js/functions.js--]
 * Ajax search
 */
function searchPhrase(searchTerm) {

    const searchPostType = $('.search-field').data('post-search');

    console.log(searchPostType);

    if (searchTerm.length >= 2) {
        jQuery.ajax({
            url: BASE + '/wp-admin/admin-ajax.php',
            type: "POST",
            data: {
                'action': 'ajax_search',
                'term': searchTerm,
                'postType': searchPostType
            },
            success: function (result) {
                jQuery('.search-results').removeClass('hidden-state');
                jQuery('.displayed-ajax-search').fadeIn().html(result);
                jQuery('.count').fadeIn();
                //jQuery('.displayed-search-phrases').addClass('hidden');
                $('.popular-searches-block').removeClass('show').height(0);
                jQuery('.search-spinner').hide();
                jQuery('.search-field').blur();
                //jQuery('.search-results-wrap').addClass('white-bg');

                setTimeout(function () {
                    const count = jQuery('.search-result-count').text();
                    jQuery('.results-count-info').text(count).slideDown(400);
                }, 100);

            }
        });
    } else if (searchTerm.length <= 2) {
        jQuery('.search-spinner').hide();
        jQuery('.search-results').removeClass('hidden-state');
        jQuery('.search-field').blur();
        //jQuery('.search-results-wrap').addClass('white-bg');
        jQuery('.displayed-ajax-search').append("<div class='search-characters-error'>" +
            "<p class='search-characters-error__text'>Enter at least 2 characters to start searching</p>" +
            "<div class='search-characters-error__image-wrap'>" +
            "<img src='" + document.location.origin + "/wp-content/themes/moc/images/blog/typewriter.svg' alt='' class='search-characters-error__image'>" +
            "</div>" +
            "</div>");
    }
}

var delay = (function () {
    var timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

$('.search-spinner').hide();

$('#search-field').on('input keyup', function () {
    console.log('test search');
    jQuery('.search-spinner').show();
    //jQuery('.displayed-search-phrases').addClass('hidden');
    $('.popular-searches-block').removeClass('show').height(0);
    jQuery('.displayed-ajax-search').empty();

    //prevent browser autocomplete
    jQuery(this).attr('autocomplete', 'off');
    //get search term
    var searchTerm = jQuery(this).val();

    delay(function () {
        searchPhrase(searchTerm);
    }, 2000);
});
