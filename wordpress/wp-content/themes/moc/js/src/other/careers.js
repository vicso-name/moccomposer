function careers(){

    jQuery(document).ready(function() {
        if (jQuery("#apply-job").length) {
            var Career = {
                config: {
                    social: jQuery("#social"),
                    facebookSvg: "<svg><use xlink:href='#social-facebook'></use></svg>",
                    twitterSvg: "<svg><use xlink:href='#social-twitter'></use></svg>",
                    linkedinSvg: "<svg><use xlink:href='#social-linkedin'></use></svg>",
                    googleSvg: "<svg><use xlink:href='#social-google'></use></svg>",
                    applyJobLink: jQuery("[data-apply-job]"),
                    applyJob: jQuery("#apply-job"),
                    topBar: jQuery("#top_bar")
                },
                addSocialSvg: function(){
                    if (Career.config.social.length) {
                        Career.config.social.find(".ssba_facebook_share").append(Career.config.facebookSvg);
                        Career.config.social.find(".ssba_twitter_share").append(Career.config.twitterSvg);
                        Career.config.social.find(".ssba_linkedin_share").append(Career.config.linkedinSvg);
                        Career.config.social.find(".ssba_google_share").append(Career.config.googleSvg);
                    }
                },
                applyJobHandler: function(e){
                    e.preventDefault();
                    jQuery('[data-menu]').removeClass('menu-opened');
                    jQuery('body').removeClass('with-menu-opened');
                    jQuery('html, body').animate({
                        scrollTop: Career.config.applyJob.offset().top - Career.config.topBar.height()
                    }, 1000);
                },
                init: function(){
                    this.config.applyJobLink.on("click", this.applyJobHandler);
                    Career.addSocialSvg();
                }
            };

            Career.init();
        }
    });

};
