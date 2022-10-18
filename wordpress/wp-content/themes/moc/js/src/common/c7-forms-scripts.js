function cf7Scripts() {
    jQuery(document).ready(function () {
        var currentForm = jQuery('main').find('form');
        var currentId;
        var getFormId;
        let leadEmail;
        let leadName


        if($('[data-name="embedded-to-description"]').length) {
            $('[data-name="embedded-to-description"]').addClass('embedded-to-description');
        }

        if($('[data-name="description"]').length) {
            $('[data-name="description"]').addClass('description');
        }

        if (jQuery('.gform_wrapper').length) {
            currentId = jQuery('.gform_wrapper').attr('id');

            var formInputs = document.querySelectorAll('.wpcf7-form-control')
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

            if (document.querySelector('.page-contacts') !== null) {
                currentForm.attr('id', 'gform_1')
                currentForm.attr('name', 'contact-form')
            }

            if (document.querySelector('.single-post') !== null) {
                currentForm.attr('id', 'gform_14')
                currentForm.attr('name', 'contact-form')
            }

            if (document.querySelector('.home') !== null) {
                currentForm.attr('name', 'home-form')
                currentForm.attr('id', 'gform_7')
            }
            if (document.querySelector('.page-chatbots') !== null) {
                currentForm.attr('name', 'chatbots-form')
                currentForm.attr('id', 'gform_11')
            }
            if (document.querySelector('.page-conversation-design') !== null) {
                currentForm.attr('name', 'chatbots-form')
                currentForm.attr('id', 'gform_12')
            }

            var currentHash = window.location.hash

            if (currentHash === '#estimate-project-form') {
                jQuery('.contact-form-wrapper').find('input[type="checkbox"]').trigger('click')
                window.location.hash = '';
            }

            var fileInputClass = 'embedded-to-description'
            if (!jQuery('.' + fileInputClass).length) fileInputClass = 'upload-file'

            addFileUploadForm(fileInputClass)
            // add career location to field - for email title
            if (jQuery('#form_location').length) {
                jQuery('#form_location').val(jQuery('#career-location').html())
            }

            var fileInputClass1 = 'embedded-to-description'
            if (!jQuery('.' + fileInputClass1).length) fileInputClass1 = 'upload-file-1'

            addFileUploadForm1(fileInputClass1)
            // add career location to field - for email title
            if (jQuery('#form_location').length) {
                jQuery('#form_location').val(jQuery('#career-location').html());
            }

            if (jQuery('#from_page').length) {
                const pageUrl = window.location.href;
                jQuery('#from_page').val(pageUrl);
            }
        }

        if (jQuery('.wpcf7').length) {
            var wpcf7Elm = document.querySelectorAll('.wpcf7');

            if (!jQuery('.ajax-loader').length) {
                $('.wpcf7-submit').after('<span class="ajax-loader"></span>');
            }

            wpcf7Elm.forEach(function (form) {

                form.addEventListener('wpcf7submit', function (event) {
                    if (jQuery('.wpcf7-not-valid-tip').length) return;

                    var goalNames = {1: 'ContactSubmit', 7: 'HomepageSubmit'}

                    var formId = 0
                    if (jQuery('#contact-form').length) {
                        formId = 1
                    } else {
                        if (jQuery('#homepage-form').length) formId = 7
                    }


                    if (!$('body').hasClass('single-post')) {
                        var confirmationTop = jQuery('.contact-form-wrapper').offset().top
                        var $topMenu = jQuery('#top_bar')
                        var topMenuHeight = $topMenu.length ? $topMenu.height() : 0
                        var scrollTo = (confirmationTop - topMenuHeight > 0) ? confirmationTop - topMenuHeight : 0

                        jQuery('html, body').animate({
                            scrollTop: scrollTo
                        }, 300)
                    }

                    if ((goalNames[formId]) && (typeof yaCounter32175069 !== 'undefined')) {
                        yaCounter32175069.reachGoal(goalNames[formId])
                    }
                }, false)


                form.addEventListener('wpcf7mailsent', function (event) {

                    if (jQuery('.wpcf7-not-valid-tip').length) return;
                    event.preventDefault();
                    // console.log('send');
                    getFormId = event.detail.contactFormId

                    var formBlockId = $(this).closest('.gform_wrapper').attr('id');
                    var formTag = $(this).closest('.gform_wrapper').attr('data-tag');
                    var formTitle = $(this).closest('.gform_wrapper').attr('data-title');


                    jQuery(this).find('.wpcf7-submit').css('opacity', '0');

                    if ($('.success-block').length) {

                        $(this).closest('.gform_wrapper').find('.success-block').css({
                            'display': 'block',
                            'opacity': '1'
                        });

                    }


                    jQuery('.js-hide-after-submit').addClass('submitted');
                    if (jQuery('.js-hide-after-submit').length) {
                        jQuery('.js-hide-after-submit').addClass('hidden')
                    }
                    setTimeout(function () {
                        jQuery('.ebook-info').addClass('visible');
                    }, 200);


                    jQuery('.js-hide-after-submit').addClass('submitted');
                    if (jQuery('.js-hide-after-submit').length) {
                        jQuery('.js-hide-after-submit').addClass('hidden')
                    }

                    if (jQuery('.single-webinars').length) {
                        updateWebinarInCRM(currentForm, formBlockId);
                    } else if ((!jQuery('.careers-page').length) || (!jQuery('.single-career-page').length)) {
                        updateUserInCRM(currentForm, formBlockId, formTag, formTitle);
                    }

                    if (formBlockId === 'download-form') {
                        var pdfLink = $(this).closest('#download-block').find('#download-form').attr('pdf-link');

                        setTimeout(function () {
                            window.open(pdfLink, '_blank');
                        }, 3000);
                    }

                    if (formBlockId === 'ecommerce-pdf-form') {
                        var pdfLink = $(this).closest('.gform_wrapper').attr('pdf-link');

                        setTimeout(function () {
                            window.open(pdfLink, '_blank');
                        }, 3000);
                    }

                    //get email for additional information for zoho integration


                    leadEmail = $(this).find('.wpcf7-email').val();
                    leadName = $(this).find('input[name="your-name"]').val();

                    if ($('.additional-info-submit').length) {
                        $('.additional-info-submit').attr('data-lead-email', leadEmail);
                        $('.additional-info-submit').attr('data-lead-name', leadName);
                    }

                    // console.log(getFormId);
                    // console.log(typeof getFormId);

                    if ($('.js-zoho-questions-popup').length && (getFormId !== 37015) ) {

                        setTimeout(function () {
                            $('.js-zoho-questions-popup').addClass('visible');
                            // $('html, body').addClass('non-scroll');
                            freezeBodyScroll();

                            if ($(window).width() < 960) {
                                $('.fixed-header').addClass('zero-index');
                            }
                        }, 3000);
                    }
                });
            });
        }

        jQuery('[data-metrix]').click(function () {
            var mailHref = this.getAttribute('href')
            var mailMetrix = this.getAttribute('data-metrix')
            var mailData = mailMetrix + ' (' + mailHref + ')'
            prepareLeadForSend({email_clicked: mailData, email_to_send: mailHref})
        })
    })

    var getStartedButton = document.querySelector('#chat-get-started');
    if(getStartedButton) {
        getStartedButton.addEventListener('click', function (event) {
            sendUserData();
        });
    }

    function focusIt(elem) {
        var label = document.querySelector('label[for="' + elem.getAttribute('id') + '"]')

        if (label !== null) {
            label.classList.remove('unfocus-label')
            if ((jQuery(elem).hasClass('wpcf7-textarea') && (jQuery('.embedded-to-description').length))) {
                var fileArea = jQuery('.embedded-to-description')
                fileArea.addClass('small')
            }
        }
    }

    function unfocusIt(elem) {
        var label = document.querySelector('label[for="' + elem.getAttribute('id') + '"]')

        if (label !== null) {
            if (elem.value === '') {
                elem.classList.remove('filled')
                label.classList.add('unfocus-label')
                if ((jQuery(elem).hasClass('wpcf7-textarea') && (jQuery('.embedded-to-description').length))) {
                    var fileArea = jQuery('.embedded-to-description')
                    fileArea.removeClass('small')
                }
            } else {
                elem.classList.add('filled')
                label.classList.remove('unfocus-label')
            }
            ;
        }

        ;
    };
}

function getFromStorage(currentParam) {
    var savedParam = 'unknown'

    if (typeof sessionStorage !== 'undefined') {
        try {
            if ((sessionStorage) && (sessionStorage.getItem(currentParam) !== null)) {
                savedParam = sessionStorage.getItem(currentParam)
            }
            ;
        } catch (err) {
            console.log('storage does not support')
        }
    }
    return savedParam
}

// function validateFileUpload() {
//
//   var form = jQuery(document).find('form'),
//     fileField = jQuery(form).find('input[type="file"]')[0],
//     validationField,
//     maxFileSize,
//     fileSize,
//     errorMessage;
//
//   if (typeof file !== 'undefined') {
//     var file = fileField.files[0];
//     fileSize = file.size;
//     maxFileSize = jQuery(jQuery(fileField).siblings('input[name="MAX_FILE_SIZE"]')[0]).val();
//
//     if (fileSize > maxFileSize) {
//       // e.preventDefault();
//
//       validationField = jQuery(fileField).closest('li').find('.validation_message');
//       errorMessage = 'File exceeds size limit. Maximum file size:' + parseInt(maxFileSize / (1024 * 1024)) + 'MB';
//
//       if (validationField.length > 0) {
//         jQuery(validationField[0]).text(errorMessage);
//       } else if (jQuery("#file-error").length === 0) {
//         jQuery(fileField).closest('li').append('<div class="gfield_description validation_message" id="file-error">' + errorMessage + '</div>');
//       }
//     }
//   }
//   for (var i = 1; i <= 9; i++) {
//     var gfSubmitting = "gf_submitting_" + i;
//     window[gfSubmitting] = false;
//   }
//
// }

function updateUserInCRM(form, formBlockId, formTag, formTitle) {
    if ((!jQuery('.careers-page').length) && (!jQuery('.single-career-page').length)) {
        // var fieldIds = ['your-name', 'email', 'phone', 'description', 'address', 'company', 'last-name']
        var fieldIds = ['your-name', 'email', 'phone', 'description', 'address', 'company', 'last-name', 'email-2', 'your-name-2', 'last-name-2', 'business-email', 'business-email-2', 'your-name-3', 'email-3']

        var leadData = {}

        for (var k = 0; k < fieldIds.length; k++) {
            if (document.getElementById(fieldIds[k]) == null) {
                leadData[fieldIds[k]] = ''
            } else {
                leadData[fieldIds[k]] = document.getElementById(fieldIds[k]).value
            }
        }

        leadData.form_id = formBlockId;
        leadData.form_tag = formTag;
        leadData.form_title = formTitle;
        prepareLeadForSend(leadData);
    }
}

function updateWebinarInCRM(form) {

    if (jQuery('.single-webinars').length) {
        var fieldIds = ['your-name', 'email', 'last-name']
        var leadData = {}

        for (var k = 0; k < fieldIds.length; k++) {
            if (document.getElementById(fieldIds[k]) == null) {
                leadData[fieldIds[k]] = ''
            } else {
                leadData[fieldIds[k]] = document.getElementById(fieldIds[k]).value
            }
            ;
        }
        preparerWebinarForSend(leadData);
    }
}

function addFileUploadForm(fileUploadClass) {
    var fileinputContainer = jQuery('span.' + fileUploadClass)

    if (fileinputContainer.length > 0) {
        if (jQuery('.wpcf7-form-control-wrap.description').length) {
            jQuery('.wpcf7-form-control-wrap.description').append('<span id="file-name" class="bottom-position"></span>')
        } else {
            fileinputContainer.append('<span id="file-name"></span>')
        }
        ;
        fileinputContainer.append('<button id="file-upload"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.25 18.25" aria-label="Upload File"><path fill-rule="evenodd" d="M725.048,5233.58h-7.821v7.82H714.62v-7.82H706.8v-2.6h7.821v-7.82h2.607v7.82h7.821v2.6Z" transform="translate(-706.813 -5223.16)"/></svg></button>')
        fileinputContainer.append('<span class="validation_message"></span>')
        var fileInputInner = fileinputContainer[0].querySelector('input[type="file"]')

        var inputFile = fileinputContainer.find('input[type="file"]')[0]

        var fileName = document.getElementById('file-name')

        var fileInputLabel = jQuery('label[for="' + jQuery(inputFile).attr('id') + '"]')

        var previewBlock = fileinputContainer.find('.ginput_preview')

        var newFileName = previewBlock.find('strong').html()
        // accessibility - hide input from a11y tree
        inputFile.setAttribute('aria-hidden', 'true')
        inputFile.setAttribute('tabindex', '-1')

        // getting filename after validation
        if ((typeof newFileName !== 'undefined') && (newFileName.length > 0)) {
            fileinputContainer.addClass('uploaded')
            fileName.innerHTML = newFileName
            fileInputLabel.addClass('focus-fixed-label')
            fileInputLabel.removeClass('unfocus-label')
        }
        ;
        fileinputContainer.on('click', '#file-upload', function (e) {
            e.preventDefault()
            inputFile.value = ''
            fileinputContainer.removeClass('uploaded')
            fileName.innerHTML = ''
            fileInputLabel.removeClass('focus-fixed-label').addClass('unfocus-label')
            fileInputInner.value = ''
            previewBlock.find('.gform_delete').trigger('click')
        })
        // add filename to form
        fileinputContainer.on('change', 'input[type="file"]', function (e) {
            inputFile = jQuery(fileinputContainer).find('input[type="file"]')
            var valMessage = fileinputContainer.find('.validation_message').html()
            if (valMessage.length > 2) {
                fileName.innerHTML = '<span style="color: red">' + valMessage + '</span>'
                fileinputContainer.find('.validation_message').innerHtml = ''
                fileinputContainer.addClass('uploaded')
            } else {
                var newFileName = ''
                if (this.files) newFileName = e.target.value.split('\\').pop()
                if (newFileName) {
                    fileinputContainer.addClass('uploaded')
                    fileName.innerHTML = newFileName
                    fileInputLabel.addClass('focus-fixed-label')
                    fileInputLabel.removeClass('unfocus-label')
                }
            }
        })
        fileinputContainer.on('blur', 'input[type="file"]', function (e) {
            setTimeout(function () {
                var valMessage = fileinputContainer.find('.validation_message')[0].innerHTML
                if (valMessage.length > 2) {
                    document.getElementById('file-name').innerHTML = '<span style="color: red">' + valMessage + '</span>'
                    fileinputContainer.find('.validation_message').innerHtml = ''
                    fileinputContainer.addClass('uploaded')
                }
                ;
            }, 2000)
        })
    }
};

function addFileUploadForm1(fileUploadClass1) {
    var fileinputContainer = jQuery('span.' + fileUploadClass1)

    if (fileinputContainer.length > 0) {
        if (jQuery('.wpcf7-form-control-wrap.description').length) {
            jQuery('.wpcf7-form-control-wrap.description').append('<span id="file-name-1" class="bottom-position"></span>')
        } else {
            fileinputContainer.append('<span id="file-name-1"></span>')
        }
        ;
        fileinputContainer.append('<button id="file-upload-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.25 18.25" aria-label="Upload File"><path fill-rule="evenodd" d="M725.048,5233.58h-7.821v7.82H714.62v-7.82H706.8v-2.6h7.821v-7.82h2.607v7.82h7.821v2.6Z" transform="translate(-706.813 -5223.16)"/></svg></button>')
        fileinputContainer.append('<span class="validation_message"></span>')
        var fileInputInner = fileinputContainer[0].querySelector('input[type="file"]')

        var inputFile = fileinputContainer.find('input[type="file"]')[0]

        var fileName = document.getElementById('file-name-1')

        var fileInputLabel = jQuery('label[for="' + jQuery(inputFile).attr('id') + '"]')

        var previewBlock = fileinputContainer.find('.ginput_preview')

        var newFileName = previewBlock.find('strong').html()
        // accessibility - hide input from a11y tree
        inputFile.setAttribute('aria-hidden', 'true')
        inputFile.setAttribute('tabindex', '-1')

        // getting filename after validation
        if ((typeof newFileName !== 'undefined') && (newFileName.length > 0)) {
            fileinputContainer.addClass('uploaded')
            fileName.innerHTML = newFileName
            fileInputLabel.addClass('focus-fixed-label')
            fileInputLabel.removeClass('unfocus-label')
        }
        ;
        fileinputContainer.on('click', '#file-upload-1', function (e) {
            e.preventDefault()
            inputFile.value = ''
            fileinputContainer.removeClass('uploaded')
            fileName.innerHTML = ''
            fileInputLabel.removeClass('focus-fixed-label').addClass('unfocus-label')
            fileInputInner.value = ''
            previewBlock.find('.gform_delete').trigger('click')
        })
        // add filename to form
        fileinputContainer.on('change', 'input[type="file"]', function (e) {
            inputFile = jQuery(fileinputContainer).find('input[type="file"]')
            var valMessage = fileinputContainer.find('.validation_message').html()
            if (valMessage.length > 2) {
                fileName.innerHTML = '<span style="color: red">' + valMessage + '</span>'
                fileinputContainer.find('.validation_message').innerHtml = ''
                fileinputContainer.addClass('uploaded')
            } else {
                var newFileName = ''
                if (this.files) newFileName = e.target.value.split('\\').pop()
                if (newFileName) {
                    fileinputContainer.addClass('uploaded')
                    fileName.innerHTML = newFileName
                    fileInputLabel.addClass('focus-fixed-label')
                    fileInputLabel.removeClass('unfocus-label')
                }
            }
        })
        fileinputContainer.on('blur', 'input[type="file"]', function (e) {
            setTimeout(function () {
                var valMessage = fileinputContainer.find('.validation_message')[0].innerHTML
                if (valMessage.length > 2) {
                    document.getElementById('file-name').innerHTML = '<span style="color: red">' + valMessage + '</span>'
                    fileinputContainer.find('.validation_message').innerHtml = ''
                    fileinputContainer.addClass('uploaded')
                }
                ;
            }, 2000)
        })
    }
};

function prepareLeadForSend(leadData) {
    var channelField = 'direct'
    var isReferral = "false"
    var docReferrer = getFromStorage('referrer')
    var isAds = getFromStorage('ads')
    var visited = getFromStorage('visited')
    var searchArray = [
        'google',
        'bing',
        'duckduckgo',
        'yahoo',
        'ask.com',
        'AOL',
        'aol.com',
        'baidu',
        'wolframalpha',
        'chacha.com'
    ]
    // channel information
    if ((location.search.indexOf('type') >= 1) || (isAds === 'ads')) {
        channelField = 'ads'
    } else {
        if ((docReferrer === '') || (typeof docReferrer === 'undefined')) {
            channelField = 'direct'
        } else {
            var isReferrerInArray = ''
            for (var i = 0; i < searchArray.length; i++) {
                if (docReferrer.indexOf(searchArray[i]) > -1) {
                    isReferrerInArray = searchArray[i]
                }
                ;
            }
            ;
            if (isReferrerInArray.length > 0) {
                channelField = 'search(' + isReferrerInArray + ')'
            } else {
                if ((window.parent.location.href.indexOf(docReferrer) === -1) && (docReferrer.indexOf(window.parent.location.href) === -1)) {
                    channelField = 'ref(' + docReferrer + ')'
                    isReferral = "true"
                }
            }
        }
        ;
    }
    ;
    leadData.channel = channelField
    leadData.isReferral = isReferral
    leadData.visited = visited
    // device type check
    let deviceType = "desktop";

    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        deviceType = "tablet";
    } else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
        deviceType = "mobile";
    }

    leadData.device = deviceType;
    var firstVisit = false
    if ((document.cookie) && (getCookie('first_visit'))) {
        if (getCookie('first_visit=true')) document.cookie = 'first_visit=false'
    } else {
        if ((document.cookie)) {
            document.cookie = 'first_visit=true'
            firstVisit = true
        }
    }
    ;

    leadData.first_visit = firstVisit
    leadData.form_location = window.location.href
    var clientCity = ''

    var clientCountry = ''
    if (document.getElementById('client_city') !== null) clientCity = document.getElementById('client_city').innerHTML
    if (document.getElementById('client_country') !== null) clientCountry = document.getElementById('client_country').innerHTML

    if (clientCity === '') {
        clientCity = 'No';
    }

    leadData.city = clientCity
    leadData.country = clientCountry
    leadData.email_to_send = ''


    // let zdStorage = localStorage.getItem('ZD-settings');
    // let frontUserID;
    //
    // if(zdStorage) {
    //     let getUserID = JSON.parse(localStorage.getItem('ZD-settings'));
    //     frontUserID = getUserID[0][1];
    // }
    //
    // leadData.bot_user_id = `visitor-${frontUserID}`;

    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    leadData.timezone = timeZone;

    function getGoogleAnaliticsId() {
        var a, b = (a = document.cookie.match("(?:^|;)\\s*_ga\x3d([^;]*)")) ? decodeURIComponent(a[1]) : null;
        b && (a = b.match(/(\d+\.\d+)$/));
        a = a ? a[1] : null;
        return a;
    }

    const googleId = getGoogleAnaliticsId();

    leadData.google_analitics_id = googleId;

    sendToProsper(leadData);
    sendToZoho(leadData);
}

function prepareLeadForSendFromBot(leadData) {
    var channelField = 'direct'
    var docReferrer = getFromStorage('referrer')
    var isAds = getFromStorage('ads')
    var visited = getFromStorage('visited')
    var searchArray = [
        'google',
        'bing',
        'duckduckgo',
        'yahoo',
        'ask.com',
        'AOL',
        'aol.com',
        'baidu',
        'wolframalpha',
        'chacha.com'
    ]
    // channel information
    if ((location.search.indexOf('type') >= 1) || (isAds === 'ads')) {
        channelField = 'ads'
    } else {
        if ((docReferrer === '') || (typeof docReferrer === 'undefined')) {
            channelField = 'direct'
        } else {
            var isReferrerInArray = ''
            for (var i = 0; i < searchArray.length; i++) {
                if (docReferrer.indexOf(searchArray[i]) > -1) {
                    isReferrerInArray = searchArray[i]
                }
                ;
            }
            ;
            if (isReferrerInArray.length > 0) {
                channelField = 'search(' + isReferrerInArray + ')'
            } else {
                if ((window.parent.location.href.indexOf(docReferrer) === -1) && (docReferrer.indexOf(window.parent.location.href) === -1)) {
                    channelField = 'ref(' + docReferrer + ')'
                }
            }
        }
        ;
    }
    ;
    leadData.channel = channelField
    leadData.visited = visited
    // device type check
    let deviceType = "desktop";

    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        deviceType = "tablet";
    } else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
        deviceType = "mobile";
    }

    leadData.device = deviceType;
    var firstVisit = false
    if ((document.cookie) && (getCookie('first_visit'))) {
        if (getCookie('first_visit=true')) document.cookie = 'first_visit=false'
    } else {
        if ((document.cookie)) {
            document.cookie = 'first_visit=true'
            firstVisit = true
        }
    }
    ;

    leadData.first_visit = firstVisit
    leadData.form_location = window.location.href
    var clientCity = ''

    var clientCountry = ''
    if (document.getElementById('client_city') !== null) clientCity = document.getElementById('client_city').innerHTML
    if (document.getElementById('client_country') !== null) clientCountry = document.getElementById('client_country').innerHTML

    if (clientCity === '') {
        clientCity = 'No';
    }

    leadData.city = clientCity
    leadData.country = clientCountry
    leadData.email_to_send = ''

    let zdStorage = localStorage.getItem('ZD-suid');
    let frontUserID;

    if (zdStorage) {
        let getUserID = JSON.parse(localStorage.getItem('ZD-suid'));
        frontUserID = getUserID['id'];
        frontUserID = frontUserID.substring(0, 12);
    }

    leadData.bot_user_id = `visitor-${frontUserID}`;

    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    leadData.timezone = timeZone;

    function getGoogleAnaliticsId() {
        var a, b = (a = document.cookie.match("(?:^|;)\\s*_ga\x3d([^;]*)")) ? decodeURIComponent(a[1]) : null;
        b && (a = b.match(/(\d+\.\d+)$/));
        a = a ? a[1] : null;
        return a;
    }

    const googleId = getGoogleAnaliticsId();

    leadData.google_analitics_id = googleId;
}

function preparerWebinarForSend(leadData) {
    var channelField = 'direct'
    var docReferrer = getFromStorage('referrer')
    var isAds = getFromStorage('ads')
    var visited = getFromStorage('visited')
    var searchArray = [
        'google',
        'bing',
        'duckduckgo',
        'yahoo',
        'ask.com',
        'AOL',
        'aol.com',
        'baidu',
        'wolframalpha',
        'chacha.com'
    ]
    // channel information
    if ((location.search.indexOf('type') >= 1) || (isAds === 'ads')) {
        channelField = 'ads'
    } else {
        if ((docReferrer === '') || (typeof docReferrer === 'undefined')) {
            channelField = 'direct'
        } else {
            var isReferrerInArray = ''
            for (var i = 0; i < searchArray.length; i++) {
                if (docReferrer.indexOf(searchArray[i]) > -1) {
                    isReferrerInArray = searchArray[i]
                }
                ;
            }
            ;
            if (isReferrerInArray.length > 0) {
                channelField = 'search(' + isReferrerInArray + ')'
            } else {
                if ((window.parent.location.href.indexOf(docReferrer) === -1) && (docReferrer.indexOf(window.parent.location.href) === -1)) {
                    channelField = 'ref(' + docReferrer + ')'
                }
            }
        }
        ;
    }
    ;
    leadData.channel = channelField
    leadData.visited = visited
    // device type check
    let deviceType = "desktop";

    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        deviceType = "tablet";
    } else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
        deviceType = "mobile";
    }
    leadData.device = deviceType;

    var firstVisit = false
    if ((document.cookie) && (getCookie('first_visit'))) {

        if (getCookie('first_visit=true')) document.cookie = 'first_visit=false'
    } else {

        if ((document.cookie)) {

            document.cookie = 'first_visit=true'
            firstVisit = true
        }
    }
    ;

    leadData.first_visit = firstVisit
    leadData.form_location = window.location.href
    var clientCity = ''

    var clientCountry = ''
    if (document.getElementById('client_city') !== null) clientCity = document.getElementById('client_city').innerHTML
    if (document.getElementById('client_country') !== null) clientCountry = document.getElementById('client_country').innerHTML

    if (clientCity === '') {
        clientCity = 'No';
    }

    leadData.city = clientCity
    leadData.country = clientCountry
    leadData.email_to_send = ''

    // let zdStorage = localStorage.getItem('ZD-settings');
    // let frontUserID;
    //
    // if(zdStorage) {
    //     let getUserID = JSON.parse(localStorage.getItem('ZD-settings'));
    //     frontUserID = getUserID[0][1];
    // }
    //
    // leadData.bot_user_id = `visitor-${frontUserID}`;

    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    leadData.timezone = timeZone;

    function getGoogleAnaliticsId() {
        var a, b = (a = document.cookie.match("(?:^|;)\\s*_ga\x3d([^;]*)")) ? decodeURIComponent(a[1]) : null;
        b && (a = b.match(/(\d+\.\d+)$/));
        a = a ? a[1] : null;
        return a;
    }

    const googleId = getGoogleAnaliticsId();
    leadData.google_analitics_id = googleId;


    if ($('.single-webinars').length) {
        const webinarTitle = $('.webinar-title').text();
        leadData.webinar_title = webinarTitle;
    }

    let form_id = '';

    if ($('#subscribe-form-webinars').length) {
        form_id = 'subscribe-webinars';
    }

    leadData.form_id = form_id;

    sendWebinarToProsper(leadData);
    sendWebinarToZoho(leadData);
}

function sendToProsper(leadData) {
    var base_url = window.location.origin
    leadData.action = 'save_to_prosper'

    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: leadData
    })
        .done(function () {
            console.log('people datas sent to prosper');
        })
        .fail(function () {
            console.log("prosper lead didn't created(")
        })
}

function sendToZoho(leadData) {
    var base_url = window.location.origin
    leadData.action = 'get_zoho_token'

    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: leadData,
        success: function (data) {
            console.log(leadData);
            let response = JSON.parse(data);
            var responseId = response.server_id;
            console.log(response);
            $('.lead-id').attr('data-id', `${responseId}`);
        },
        error: function () {
            console.log('Error occured');
        }
    })
        .done(function () {
            console.log('people datas sent to zoho');

        })
        .fail(function () {
            console.log("prosper lead didn't created for zoho(")
        })
}


function sendUserData() {
    var leadData = {};
    prepareLeadForSendFromBot(leadData);

    var base_url = window.location.origin
    leadData.action = 'send_to_chatbot_data'
    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: leadData,
        success: function (data) {
            let response = JSON.parse(data);
            let responseStatus = response.server_response;

            if (responseStatus === '200') {

                if (window.$zopim !== undefined || window.$zopim.livechat !== undefined) {

                    zE(function () {
                        $zopim(function () {
                            $zopim.livechat.say('Get Started');
                        });
                    });
                }

            } else {
                console.log('error');
            }
        },
        error: function () {
            console.log('Error occured');
        }
    })
        .done(function () {
            console.log('visitor data send');
        })
        .fail(function () {
            console.log("visitor data fail")
        })
}

$(document).ready(function () {

    const pdfPageClass = $('body').hasClass('page-pdf');
    if (pdfPageClass) {

        setTimeout(function () {
            sendPdfData();
        }, 3000);

        const pathArray = window.location.pathname.split('/'),
            pdfNameFromHref = pathArray[1];

        if (window.navigator.userAgent.match(/iPhone/i)) {
            $('.embed-wrap').hide(0);

            switch (pdfNameFromHref) {
                case 'traptap-pdf':
                    $(".pdf-wrap").html('<div class="info-pdf container"><p>This browser does not support PDFs. Please download the PDF to view it: <a href="https://masterofcode.com/pdf/TrapTap.pdf">Download PDF</a>.</p></div>');
                    break;
                case 'tagible-for-travel-pdf':
                    $(".pdf-wrap").html('<div class="info-pdf container"><p>This browser does not support PDFs. Please download the PDF to view it: <a href="https://masterofcode.com/pdf/Tagible-for-travel.pdf">Download PDF</a>.</p></div>');
                    break;
                case 'ebags-apps-pdf':
                    $(".pdf-wrap").html('<div class="info-pdf container"><p>This browser does not support PDFs. Please download the PDF to view it: <a href="https://masterofcode.com/pdf/eBags.pdf">Download PDF</a>.</p></div>');
                    break;
                case 'luxury-escapes-chatbot-pdf':
                    $(".pdf-wrap").html('<div class="info-pdf container"><p>This browser does not support PDFs. Please download the PDF to view it: <a href="https://masterofcode.com/pdf/Luxury-Escapes-Chatbot.pdf">Download PDF</a>.</p></div>');
                    break;
                case 'aveda-chatbot-pdf':
                    $(".pdf-wrap").html('<div class="info-pdf container"><p>This browser does not support PDFs. Please download the PDF to view it: <a href="https://masterofcode.com/pdf/Aveda.pdf">Download PDF</a>.</p></div>');
                    break;
                default:
                    $(".pdf-wrap").html('<div class="info-pdf container"><p>This browser does not support PDFs.</p></div>');
            }
        }
    }
});


function preparedPdfDataForSend(pdfData) {
    const pdfHref = window.location.href,
        pathArray = window.location.pathname.split('/'),
        pdfNameFromHref = pathArray[1];
    let pdfNameReplace;

    $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(pdfHref);
        if (results == null) {
            return null;
        }
        return decodeURI(results[1]) || 0;
    }

    switch (pdfNameFromHref) {
        case 'traptap-pdf':
            pdfNameReplace = 'TrapTap, a safety driving app';
            break;
        case 'tagible-for-travel-pdf':
            pdfNameReplace = 'Tagible for travel';
            break;
        case 'ebags-apps-pdf':
            pdfNameReplace = 'eBags app';
            break;
        case 'luxury-escapes-chatbot-pdf':
            pdfNameReplace = 'Luxury Escapes Chatbot';
            break;
        case 'aveda-chatbot-pdf':
            pdfNameReplace = 'Aveda Chatbot';
            break;
        default:
            pdfNameReplace = 'PDF not opened';
    }

    let sessionID = $.urlParam('session_id'),
        pdfName = pdfNameReplace;

    pdfData.session_id = sessionID;
    pdfData.pdf_name = pdfName;
}

function sendPdfData() {
    var pdfData = {};
    preparedPdfDataForSend(pdfData);

    var base_url = window.location.origin;
    pdfData.action = 'send_to_chatbot_pdf_data';
    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: pdfData,

        success: function (data) {
            let response = JSON.parse(data);
            let responseStatus = response.server_response;

            if (responseStatus === '200') {
                console.log('pdf success');
            } else {
                console.log('pdf error');
            }
        },
        error: function () {
            console.log('Error occured');
        }
    })
        .done(function () {
            console.log('pdf data send');
        })
        .fail(function () {
            console.log("pdf data fail")
        })
}

function sendWebinarToProsper(leadData) {

    var base_url = window.location.origin
    leadData.action = 'save_webinars_to_prosper'

    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: leadData
    })
        .done(function () {
            console.log('webinar datas sent to prosper');
        })
        .fail(function () {
            console.log("webinar datas didn't created(")
        })
}

function sendWebinarToZoho(leadData) {
    var base_url = window.location.origin
    leadData.action = 'get_zoho_token'

    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: leadData,
        success: function (data) {
            console.log('success');
        },
        error: function () {
            console.log('Error occured');
        }
    })
        .done(function () {
            console.log('people datas sent to zoho');
        })
        .fail(function () {
            console.log("prosper lead didn't created for zoho(")
        })
}

//additional info for zoho integration
jQuery('.additional-info-submit').click(function () {

    const budgesSelect = $('.js-budget .select-selected').text(),
        decisionSelect = $('.js-decision .select-selected').text(),
        deliverySelect = $('.js-delivery .select-selected').text();

    if (budgesSelect === 'Not chosen' || decisionSelect === 'Not chosen' || deliverySelect === 'Not chosen') {
        $('.select-selected').each(function() {
            if ($(this).text() === 'Not chosen') {
                $(this).closest('.form-item').addClass('error');
            }
        });

    } else {

        var updateLeadData = {};
        const budgetValue = $('#budget option:selected').text();
        const decisionValue = $('#decision option:selected').text();
        const deliveryValue = $('#delivery option:selected').text();
        const leadNameValue = $(this).attr('data-lead-name');
        const leadEmailValue = $(this).attr('data-lead-email');
        const responseId = $('.lead-id').attr('data-id');

        const updateDescription = `${budgetValue} ${decisionValue} ${deliveryValue}`;

        updateLeadData.your_name = leadNameValue;
        updateLeadData.lead_id = responseId;
        updateLeadData.estimated_budget = budgetValue;
        updateLeadData.owns_decision = decisionValue;
        updateLeadData.project_delivery = deliveryValue;

        $('.js-zoho-questions-popup .ajax-loader').addClass('is-active');

        setTimeout(function () {
            $('.js-zoho-output').addClass('visible');
        }, 6000);

        setTimeout(function () {
            $('.js-zoho-questions-popup').removeClass('visible');
            // $('html, body').removeClass('non-scroll');
            freeBodyScroll();
        }, 12000);

        updateInZoho(updateLeadData);
    }
})

function updateInZoho(updateLeadData) {
    var base_url = window.location.origin
    updateLeadData.action = 'get_zoho_token'

    // console.log('ajax updateLeadData', updateLeadData);

    $.ajax({
        type: 'POST',
        url: base_url + '/wp-admin/admin-ajax.php',
        data: updateLeadData,
        success: function (data) {
            console.log('success');
        },
        error: function () {
            console.log('Error occured');
        }
    })
        .done(function () {
            console.log('people datas update in zoho');
        })
        .fail(function () {
            console.log("lead didn't update in zoho(")
        })
}