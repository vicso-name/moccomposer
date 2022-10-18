// (function($){
//     if ($(".search").length) {
//         var searchPage = {
//             config: {
//                 searchForm: $(".search-form-wrap"),
//                 input: $(".search-form-wrap").find(".search-field")
//             },
//             addCloseBtn: function(){
//                 var btn = "<a href='#' class='close-btn' id='search-field-close-btn'><svg><use xlink:href='#close-icon'></use></svg></a>";
//                 this.config.searchForm.append(btn);
//                 this.config.closeBtn = $("#search-field-close-btn");
//             },
//             closeBtnDisplay: function(){
//                 if (!searchPage.config.input.val()) {
//                     searchPage.config.closeBtn.hide();
//                 } else {
//                     searchPage.config.closeBtn.show();
//                 }
//             },
//             closeBtnHandler: function(e){
//                 e.preventDefault();
//                 searchPage.config.input.val("").focus();
//                 searchPage.config.closeBtn.hide();
//             },
//             init: function(){
//                 this.addCloseBtn();
//                 this.closeBtnDisplay();
//                 this.config.input.on("keyup", this.closeBtnDisplay);
//                 this.config.closeBtn.on("click", this.closeBtnHandler);
//             }
//         };
//
//         searchPage.init();
//     }
// })(jQuery);