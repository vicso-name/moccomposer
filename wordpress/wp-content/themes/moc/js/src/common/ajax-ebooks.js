(function () {
    /*
       ajax params
   */

    let myajax = `//${window.location.host}/wp-admin/admin-ajax.php`,
        paramObj = {
            action: 'load_ebooks_post',
            postType: 'ebooks-whitepapers',
            url: myajax,
            currentPage: 1,
            catId: 'all'
        };

    /*
       Ajax helper function
   */
    function loadEvents(paramObj, target) {
        let $isLoadMore = $(target).hasClass('js-ebooks-load-more'),
            $this = $(target);
        $.ajax({
            url: paramObj.url,
            data: paramObj,
            type: 'POST',

            success(data) {
                if ($isLoadMore) {
                    $this.parents('.load-more-btn-wrap').before(data);
                    $('.ebooks-item').fadeOut(0).fadeIn(400);
                    $this.parents('.load-more-btn-wrap').remove();
                    let maxPage = parseInt($this.data('max-page'));
                    if (paramObj.currentPage === maxPage) {
                        $('.load-more-btn-wrap').remove();
                    }
                } else {

                    if (paramObj.catId === 'all') {
                        $('.ebooks-list').html(data).addClass('first-load');
                        $('.ebooks-item').fadeOut(0).fadeIn(400);
                    } else {
                        $('.ebooks-list').html(data).removeClass('first-load');
                        $('.ebooks-item').fadeOut(0).fadeIn(400);
                    }

                }
            }
        });
    }

    /*
        Load post
    */
    $('body').on("dblclick", ".js-load-ebook-post, .category-active", function (e) {
        e.preventDefault();
    });

    $('body').on('click', '.js-load-ebook-post', function H() {
        if (!$(this).hasClass('category-active')) {
            let $this = $(this),
                catID = $this.data('cat-id'),
                catIDArray = [],
                currentAction = 'filter';

            $(this).each(function H() {
                if (!$this.hasClass('category-active')) {
                    $this.addClass('category-active');
                }
            });

            $(".category-active").each(function H() {
                let $this = $(this),
                    catID = $this.data('cat-id');
                catIDArray.push(catID);
            });

            catID = catIDArray;

            if (catID.length === 0) {
                catID = 'all';
            } else {
                catID = catIDArray;
            }

            paramObj.currentPage = 1;
            paramObj.catId = catID ? catID : 'all';
            paramObj.currentAction = currentAction;
            loadEvents(paramObj, $this);
        }
    });

    $('body').on('click', '.js-remove-active-state', function H(e) {
        e.stopPropagation();
        let $this = $(this),
            catID = $this.parents().data('cat-id'),
            catIDArray = [],
            currentAction = 'filter';

        $(this).each(function H() {
            if ($this.parents().hasClass('category-active')) {
                $this.parents().removeClass('category-active');
            }
        });

        $(".category-active").each(function H() {
            let $this = $(this),
                catID = $this.data('cat-id');
            catIDArray.push(catID);
        });

        catID = catIDArray;

        if (catID.length === 0) {
            catID = 'all';
        } else {
            catID = catIDArray;
        }

        paramObj.currentPage = 1;
        paramObj.catId = catID ? catID : 'all';
        paramObj.currentAction = currentAction;
        loadEvents(paramObj, $this);
    });

    $(document).click(function (event) {
        if ($(event.target).is(".js-remove-active-state .close-btn")) {
            // console.log($(event.target));
        }
    });




    /*
        Load more btn
    */
    $('.ajax-container').on('click', '.js-ebooks-load-more', function H() {
        let $this = $(this),
            postType = 'ebooks-whitepapers',
            catId = $this.data('cat-id'),
            current = parseInt($this.data('current-page')),
            currentAction = 'load';
        paramObj.postType = postType;
        if (catId) {
            paramObj.catId = catId;
        }
        current = current + 1;
        paramObj.currentPage = current;
        paramObj.currentAction = currentAction;
        loadEvents(paramObj, $this);
    });
})();
