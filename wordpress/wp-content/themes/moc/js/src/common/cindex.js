// if ('addEventListener' in document) {
//   document.addEventListener('DOMContentLoaded', function() {
//     FastClick.attach(document.body);
//   }, false);
// }

window.addEventListener('load', function() {
  FastClick.attach(document.body);

  // if (screen.width > 960) {
  //   const subMenuList = document.querySelectorAll('.menu-holder ');
  //   console.log(subMenuList);
  //
  //   for(let i = 0; i < subMenuList.length; i++){
  //     subMenuList[i].remove();
  //   }
  // }
}, false);

document.addEventListener("DOMContentLoaded", pageLoaded);

function pageLoaded() {
  projectSlider ();
  scripts();
  popups();
  cf7Scripts();
}


function showPopup (popupName) {
  var $popup = jQuery('[data-popup="' + popupName + '"]')
  $popup.addClass('popup-fixed')
  jQuery('body').addClass('has_popup')
  if (popupName === 'cookie') {
    $popup[0].removeAttribute('aria-hidden');
  }
};

function getCookie (cname) {
  var name = cname + '='
  var decodedCookie = decodeURIComponent(document.cookie)
  var ca = decodedCookie.split(';')
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i]
    while (c.charAt(0) === ' ') {
      c = c.substring(1)
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length)
    }
  }
  return ''
};

function detectFbWebview () {
  var userAgentString = navigator.userAgent
  var FBWV = false

  FBWV = (
    (userAgentString.indexOf('FBAN') > -1) ||
    (userAgentString.indexOf('FBAV') > -1) ||
    (userAgentString.indexOf('FBIOS') > -1) ||
    (userAgentString.indexOf('FB_IAB') > -1) ||
    (userAgentString.indexOf('FB4A') > -1)
  )
  return FBWV
}
