// var waitForZopim = setInterval(function () {
//     if (window.$zopim === undefined || window.$zopim.livechat === undefined) {
//         console.log('1');
//         return;
//     }
//     console.log('2');
//
//
//     clearInterval(waitForZopim);
//
// }, 100);

function openWidget() {
    zE(function () {
        // zE('webWidget', 'show');
        // zE('webWidget', 'open');

        $zopim(function () {
            $zopim.livechat.window.show();
        });
    });
    $('#js-lets-chat-btn').addClass('hide');
}

$('#js-lets-chat-btn').on('click', function (event) {
    event.preventDefault();
    openWidget();
});

if ($("#lets-chat").length > 0) {

    $('#lets-chat').on('click', function (event) {
        event.preventDefault();
        openWidget();
    });
}

function checkButtonTextWidth() {
    let widgetButtonTextWidth = $('.js-button-text').width();
    $('.lets-chat-button__text').width(widgetButtonTextWidth + 10);
}

var waitForZopim = setInterval(function () {
    if (window.$zopim === undefined || window.$zopim.livechat === undefined) {
        console.log('loading chat');
        return;
    }

    console.log('chat connected');

    zE('webWidget:on', 'chat:unreadMessages', (number) => {
        if (number > 0) {
            $(".lets-chat-button__number").text(number);
            $(".lets-chat-button__text-inner").text("New");

            sessionStorage.setItem('messages', number);
            checkButtonTextWidth();

        } else {
            $(".lets-chat-button__number").text('');
            $(".lets-chat-button__text-inner").text("Let’s Chat");

            sessionStorage.setItem('messages', '0');

            checkButtonTextWidth();
        }
    })

    zE(function () {
        $zopim(function () {
            // $zopim.livechat.button.hide();
            $zopim.livechat.setLanguage('en');
            $zopim.livechat.theme.setFontConfig({
                google: {
                    families: ['Inter']
                }
            }, 'Inter, sans-serif');
            $zopim.livechat.theme.reload();
        });
    });

    //added styles for widget
    window.zESettings = {
        webWidget: {
            zIndex: 9997,
            color: {
                theme: '#f1563c',
                launcher: '#f1563c', // This will also update the badge
                launcherText: '#ffffff',
                button: '#f1563c',
                resultLists: '#f1563c',
                header: '#f1563c',
                articleLinks: '#f1563c',
                title: '#ffffff'
            },
            navigation: {
                popoutButton: {
                    enabled: false
                }
            },
            chat: {
                notifications: {
                    disable: true,
                    mobile: {
                        disable: true
                    }
                },
                concierge: {
                    avatarPath: 'https://d2btr9yg6upxbz.cloudfront.net/wp-content/uploads/2021/01/icon-bot-logo.png?x40208',
                    name: 'Master of Code',
                    title: {'*': 'Virtual Assistant'}
                },
            },
            contactForm: {
                attachments: false
            },
        }
    };

    function widgetCustomStyle() {
        let myStyle = $("<style>" +
            "    html, body, #Embed {\n" +
            "        font-family: 'Inter', sans-serif;\n" +
            "    }\n" +
            "    #Embed #Layer_1 {\n" +
            "        display: none !important;\n" +
            "    }\n" +
            "    #Embed .sc-fBuWsC  path, " +
            "   #Embed .glDiKt svg, " +
            "   button.dHWUjQ svg, " +
            "   button.dHWUjQ path, " +
            "   #Embed .glDiKt path {\n" +
            "        fill: #ffffff !important;\n" +
            "        color: #ffffff !important;\n" +
            "    }\n" +
            "    .gxHzKT .kDcJbn svg {\n" +
            "        width: 24px !important;\n" +
            "        height: 20px !important;\n" +
            "    }\n" +
            "\n" +
            "    h1[data-testid='widget-title'], h1.Title-sc-10f4djx-0, .cTTFca span, " +
            "    button.irBRMY:not([disabled]):hover, " +
            "    button.irBRMY:not([disabled]):focus, " +
            "    button.irBRMY:not([disabled]):active, " +
            "    button.jrixyS:not([disabled]):hover {\n" +
            "        color: #ffffff !important;\n" +
            "    }\n" +
            "    .messageAgent-2ca_z {\n" +
            "        color: #333333 !important;\n" +
            "    }\n" +
            "    div.structuredMessageSlider .variableWidth.slick-slider {\n" +
            "        margin: 0;\n" +
            "    }\n" +
            "    button.sliderButton--left-1v_jY {\n" +
            "        left: 0 !important;\n" +
            "    }\n" +
            "    button.sliderButton--right-1IsRf  {\n" +
            "        right: 0 !important;\n" +
            "    }\n" +
            "    .sc-cugefK, .dRADeY {\n" +
            "        display: none !important;\n" +
            "    }\n" +
            "    div.sc-drKuOJ {\n" +
            "        background: #E9EBED;\n" +
            "        border-radius: 6px;\n" +
            "        padding: 7px 12px !important;\n" +
            "    }\n" +
            "    button[aria-label='Attach file'] {\n" +
            "        display: none !important;\n" +
            "    }\n" +
            "    button[aria-label='End chat'] {\n" +
            "        display: none !important;\n" +
            "    }\n" +
            "    div.lmzgcr {\n" +
            "        margin: 0 !important;\n" +
            "    }\n" +
            "    .biEjAM > *  {\n" +
            "        box-shadow: rgba(233, 235, 237, 0.6) 0px 20px 30px 0px !important;\n" +
            "    }\n" +
            "    div.jHTlSb {\n" +
            "        padding: 15px 0 15px 20px !important;\n" +
            "    }\n" +
            "    div.jHTlSb .eqomgc {\n" +
            "        margin: 0;\n" +
            "        border: 1px solid transparent !important;\n" +
            "        box-shadow: none !important;\n" +
            "    }\n" +
            "    div.jHTlSb .eqomgc:focus {\n" +
            "        margin: 0;\n" +
            "        border: 1px solid rgba(51,51,51,0.1) !important;\n" +
            "        box-shadow: none !important;\n" +
            "    }\n" +
            "    button.chxYrY {\n" +
            "        margin: 0 20px 0 5px !important;\n" +
            "        border-radius: 50%;\n" +
            "        border: 1px solid transparent;\n" +
            "    }\n" +
            "    button.chxYrY svg {\n" +
            "        width: 20px !important;\n" +
            "        height: 20px !important;\n" +
            "        padding: 9px;\n" +
            "    }\n" +
            "    div[data-testid='chat-msg-user'] div[class^='styles__MessageContainer'] {\n" +
            "        fill: #F1563C !important;\n" +
            "        background: #F1563C !important;\n" +
            "        border-radius: 6px !important;\n" +
            "    }\n" +
            "    div[data-testid='chat-msg-agent'] div[class^='styles__MessageContainer'] {\n" +
            "        background: #E9EBED !important;\n" +
            "        border-radius: 6px !important;\n" +
            "    }\n" +
            "    .eKkbmY:not([disabled]),  \n" +
            "    .ikUXhl:not([disabled])  {\n" +
            "        color: #F1563C !important;\n" +
            "        border: 1px solid #F1563C !important;\n" +
            "        border-radius: 6px !important;\n" +
            "    }\n" +
            "    .eKkbmY:not([disabled]):hover, \n" +
            "    .ikUXhl:not([disabled]):hover  {\n" +
            "        color: #ffffff !important;\n" +
            "        background-color: #F1563C !important;\n" +
            "        border: 1px solid #F1563C !important;\n" +
            "        border-radius: 6px !important;\n" +
            "    }\n" +
            "    .jqDdtO:not([disabled]),\n" +
            "    .jqDdtO:not([disabled]):hover,\n" +
            "    .hzziHz:not([disabled]),\n" +
            "    .hzziHz:not([disabled]):hover  {\n" +
            "        color: #ffffff !important;\n" +
            "        background-color: #F1563C !important;\n" +
            "        border: 1px solid #F1563C !important;\n" +
            "        border-radius: 6px !important;\n" +
            "    }\n" +
            "    button.jzoJlE, " +
            "    button.cgzhRB:not([disabled]), " +
            "    button.jzoJlE:not([disabled]), " +
            "    button.jzoJlE:not(:disabled):active, " +
            "    button.jzoJlE:not(:disabled):focus {\n" +
            "        color:  #F1563C !important;\n" +
            "        background: transparent !important;\n" +
            "        border-radius: 14px !important;\n" +
            "        border: 1px solid #F1563C !important;\n" +
            "    }\n" +
            "    button.flGCLw:not([disabled]), \n" +
            "    button.klePrz:not([disabled]) {\n" +
            "        color:  #F1563C !important;\n" +
            "        background: transparent !important;\n" +
            "        border: 1px solid #F1563C !important;\n" +
            "    }\n" +
            "    button.klePrz:not([disabled]):hover, " +
            "    button.klePrz:not([disabled]):focus, " +
            "    button.flGCLw:not([disabled]):hover, " +
            "    button.flGCLw:not([disabled]):focus, " +
            "    button.cgzhRB:not([disabled]):hover, " +
            "    button.jzoJlE:hover, " +
            "    button.jzoJlE:not([disabled]):hover, " +
            "    button.jzoJlE:not(:disabled):hover {\n" +
            "        color: #ffffff !important;\n" +
            "        background: #F1563C!important;\n" +
            "        border: 1px solid #F1563C !important;\n" +
            "    }\n" +
            "    .fqZHGK:focus, \n" +
            "    input.fpBKlo:focus {\n" +
            "        box-shadow: none !important;\n" +
            "        border: 1px solid #575757 !important;\n" +
            "    }\n" +
            "    .sliderButton--right-1kY82 {\n" +
            "        right: -15px !important;\n" +
            "    }\n" +
            "    div.iXCAHh {\n" +
            "        min-height: calc(100% - (3rem + 6px));\n" +
            "    }\n" +
            "</style>");

        setTimeout(function () {
            $("iframe#webWidget").contents().find('head').append(myStyle);
        }, 100);
    }

    zE('webWidget:on', 'chat:connected', () => {
        let isWidgetShown = sessionStorage.getItem('widgetShown');
        if (isWidgetShown === 'true') {
            zE(function () {
                zE('webWidget', 'show');
                zE('webWidget', 'open');
            });
        }

        if (!$("body").hasClass("home") && (isWidgetShown === 'false')) {
            setTimeout(function () {
                $('#js-lets-chat-btn').removeClass('hide');
            }, 2000);
        }

        let chatStore = localStorage.getItem('ZD-store'),
            parseChatStore = JSON.parse(chatStore),
            chatting = parseChatStore.is_chatting,
            chatActive = parseChatStore.activeEmbed;


        if (chatting != undefined) {
            if (chatting == true) {
                $('.chat-screen').css({'display': 'none'});
            } else {
                $('.chat-screen').css({'display': 'block'});
            }
        }

        widgetCustomStyle();
    })

    zE('webWidget:on', 'open', function () {
        $('#js-chat-screen').addClass('screen-visible');
        $('#js-lets-chat-btn').addClass('hide');

        setTimeout(function () {
            $(".lets-chat-button__number").text('');
            $(".lets-chat-button__text-inner").text("Let’s Chat");
            checkButtonTextWidth();
        }, 200);

        widgetCustomStyle();
        sessionStorage.setItem('widgetShown', 'true');
        sessionStorage.setItem('messages', '0');
    });

    zE('webWidget:on', 'close', function () {
        zE('webWidget', 'hide');

        $('#js-lets-chat-btn').removeClass('hide');
        $('#js-chat-screen').removeClass('screen-visible');

        sessionStorage.setItem('widgetShown', 'false');
    });

    zE('webWidget:on', 'chat:start', () => {
        $('.chat-screen').css('display', 'none');

        setTimeout(function () {
            $(".lets-chat-button__number").text('');
            $(".lets-chat-button__text-inner").text("Let’s Chat");
            checkButtonTextWidth();
        }, 200);
    })

    zE('webWidget:on', 'chat:end', () => {
        zE(function () {
            zE('webWidget', 'hide');
            zE('webWidget', 'close');
        });
        $('#js-lets-chat-btn').removeClass('hide');
        $('.chat-screen').css('display', 'block').removeClass('screen-visible');
        sessionStorage.setItem('messages', '0');
    })

    clearInterval(waitForZopim);
}, 100);



// zE('webWidget:get', 'chat:isChatting', () => {
//     console.log('isChatting');
// })
//
// zE('webWidget:on', 'chat:status', (status) => {
//     console.log(status);
// })

jQuery(document).ready(function ($) {
    let chatStore = localStorage.getItem('ZD-store'),
        chatting = null;

    if (chatStore != null) {
        let parseChatStore = JSON.parse(chatStore);
        chatting = parseChatStore.is_chatting;
    }

    if ((chatting != undefined) || (chatting != null)) {

        if (chatting == true) {
            $('.chat-screen').css({'display': 'none'});
        } else {
            $('.chat-screen').css({'display': 'block'});
        }
    }

    setTimeout(function () {
        $('#js-lets-chat-btn').removeClass('hide');
    }, 2000);

    let newMessageCount = sessionStorage.getItem('messages');

    if(newMessageCount>0) {
        $(".lets-chat-button__number").text(newMessageCount);
    }

    if ($(window).width() > 993) {
        if ((getCookie('cookie_notice') != 'true')) {
            $('#js-lets-chat-btn').addClass('under-cookie');

            $('.accept_cookies').on('click', function () {
                $('#js-lets-chat-btn').removeClass('under-cookie');
            });
        }
    }

});


$('#js-lets-chat-btn').on('click', function (event) {
    openWidget();
});

if ($(window).width() < 992) {
    $('#js-lets-chat-btn').addClass('small-btn');
}

$('#chat-get-started').on('click', function () {
    $('#js-chat-screen').css('transform', 'translateY(0)');

    setTimeout(function () {
        $('#js-chat-screen').removeClass('screen-visible');
    }, 100);


    let zdStorage = localStorage.getItem('ZD-suid');
    let frontUserID;

    if(zdStorage) {
        let getUserID = JSON.parse(localStorage.getItem('ZD-suid'));
        frontUserID = getUserID['id'];
        frontUserID = frontUserID.substring(0, 12);
    }

    zE(function () {
        $zopim(function () {
            $zopim.livechat.setName(`visitor-${frontUserID}`);
        });
    });

    $(window).on('storage', function (e) {
        if (e.originalEvent.storageArea === sessionStorage) {
            alert('change');
        }
    });
});


$(window).on('load resize', function () {

    if ($(window).width() > 993) {

        var wt = $(window).scrollTop();
        var wh = $(window).height();
        var wh = wh / 2;

        if (wt >= wh) {
            $('.lets-chat-button').removeClass('small-btn');
        } else {
            $('.lets-chat-button__text').width(0);
        }


        $(window).scroll(function () {
            var wt = $(window).scrollTop();
            var wh = $(window).height();
            var wh = wh / 2;
            //var elementTop = $(document).offset().top;
            var eh = $(document).outerHeight();
            var dh = $(document).height();

            if (wt >= wh) {
                $('.lets-chat-button').removeClass('small-btn');

                let buttonText = $(".lets-chat-button__text-inner").text();

                if (buttonText === 'New') {
                    checkButtonTextWidth();
                } else {
                    checkButtonTextWidth();
                }

            } else {
                $('.lets-chat-button').addClass('small-btn');
                $('.lets-chat-button__text').width(0);
            }
        });
    } else {
        $('.lets-chat-button').addClass('small-btn');
    }
});


$('#js-close-chat').on('click', function () {
    $('#js-chat-screen').removeClass('screen-visible');
    $('#js-lets-chat-btn').removeClass('hide');
    zE(function () {
        zE('webWidget', 'hide');
        zE('webWidget', 'close');
    });
});