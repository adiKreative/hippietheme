(function($) {
    function find_page_number(element) {
        element.find('span').remove();
        return parseInt(element.html());
    }
    function getUrlVars(url) {
        //var url = "http://localhost:8162/UI/Link2.aspx?txt_temp=123abc&a=1&b=2";
        var vars = {};
        var hashes = url.split("?")[1];

        var hash = hashes.split('&');
   
        for (var i = 0; i < hash.length; i++) {
        params=hash[i].split("=");
        vars[params[0]] = params[1];
        }
        return vars;
    }

    $(document).on('click', '.blog-nav a', function(event) {
        event.preventDefault();
        var status_id = $(this).attr("href");
        var page_no =  parseInt(status_id.match(/\d+/));
        // var page = find_page_number($(this).clone());
    
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination',
                query_vars: ajaxpagination.query_vars,
                page: page_no
            },
            beforeSend: function(){
                $('.loader_svj').show();
            },
            success: function(html) {
                $('.col-lg-9 .row').empty();
                $('.col-lg-9 .row').append(html);
                $('.loader_svj').hide();
            }
        });
    });

/*-- Search Page --*/
    // $(document).on('click', '#blog-nav-se a', function(event) {
    //     event.preventDefault();
 
    //     var status_id = $(this).attr("href");
    //     var page_no =  parseInt(status_id.match(/\d+/));
    //     // var page = find_page_number($(this).clone());
    
    //     $.ajax({
    //         url: ajaxpagination.ajaxurl,
    //         type: 'post',
    //         data: {
    //             action: 'ajax_pagination_se',
    //             query_vars: ajaxpagination.query_vars,
    //             page: page_no
    //         },
    //         beforeSend: function(){
    //             $('.loader_svj').show();
    //         },
    //         success: function(html) {
    //             $('.col-lg-9 .row').empty();
    //             $('.col-lg-9 .row').append(html);
    //             $('.loader_svj').hide();
    //         }
    //     });
    // });


    $(document).on('click', '#blog-nav-arc a', function(event) {
        event.preventDefault(); 
        // var status_id = $(this).attr("href");
        // var page_no =  parseInt(status_id.match(/\d+/));
        var page = find_page_number($(this).clone());
 
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination_date',
                query_vars: ajaxpagination.query_vars,
                page: page
            },
            beforeSend: function(){
                $('.loader_svj').show();
            },
            success: function(html) {
                $('.col-lg-9 .row').empty();
                $('.col-lg-9 .row').append(html);
                $('.loader_svj').hide();
            }
        });
    });

/*-- taxonomy topic and sidebannner --*/
    $(document).on('click', '#topic-nav a', function(event) {
        event.preventDefault();
         var status_id = $(this).attr("href");
         var page_no =  parseInt(status_id.match(/\d+/));
       // var page = find_page_number($(this).clone());
 
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination_topic',
                query_vars: ajaxpagination.query_vars,
                page: page_no
            },
            beforeSend: function(){
                $('.loader_svj').show();
            },
            success: function(html) {
                $('.col-lg-9 .row').empty();
                $('.col-lg-9 .row').append(html);
                $('.loader_svj').hide();
            }
        });
    });


    $(document).on('click', '#sideban-nav a', function(event) {
        event.preventDefault();
         var status_id = $(this).attr("href");
         var page_no =  parseInt(status_id.match(/\d+/));
       // var page = find_page_number($(this).clone());
 
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination_sideban',
                query_vars: ajaxpagination.query_vars,
                page: page_no
            },
            beforeSend: function(){
                $('.loader_svj').show();
            },
            success: function(html) {
                $('.col-lg-9 .row').empty();
                $('.col-lg-9 .row').append(html);
                $('.loader_svj').hide();
            }
        });
    });
   


/*-- podcast pagination --*/

      $(document).on('click', '#pod-nav a', function(event) {
        event.preventDefault();
   
        //var page = find_page_number($(this).clone());
        var status_id = $(this).attr("href");
        var page_no =  parseInt(status_id.match(/\d+/));
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination_podcast',
                query_vars: ajaxpagination.query_vars,
                page: page_no
            },
            beforeSend: function(){
                $('.loader_svj').show();
            },
            success: function(html) {
                $('.podcast-page2 .row').empty();
                $('.podcast-page2 .row').append(html);
                $('.loader_svj').hide();
            }
        });
    });

    $(document).on('click', '#pod-nav-sub a', function(event) {
        event.preventDefault();
       // var term_id = $(this).attr('data-term');
      //  var page = find_page_number($(this).clone());
        var status_id = $(this).attr("href");
        var page_no =  parseInt(status_id.match(/\d+/));
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination_podcast_sub',
                query_vars: ajaxpagination.query_vars,
                page: page_no,
               // term_id: term_id
            },
            beforeSend: function(){
                $('.loader_svj').show();
            },
            success: function(html) {
                $('.podcast-page2 .row').empty();
                $('.podcast-page2 .row').append(html);
                $('.loader_svj').hide();
            }
        });
    });

/*-- Single Page --*/
    //  $(document).on('click', '.ajax-link a', function(e){
    //     e.preventDefault();
    //     // The rest of the code goes here, check below
    //     var postId = $(this).attr('data-id');
        
    //      $.ajax({
    //         url: ajaxpagination.ajaxurl,
    //         type: 'post',
    //         data: {
    //             action: 'ajax_pagination_singlepage',
    //             postId: postId
    //         },
    //         beforeSend: function(){
    //             $('.loader_svj').show();
    //         },
    //         success: function(html) {
    //             $('.single-post').empty();
    //             $('.single-post').append(html);
    //             $('.loader_svj').hide();
    //         }
    //     });
    // });



})(jQuery);