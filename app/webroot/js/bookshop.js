$(document).ready(function() {
    //Show 12 best-selling books use carousel effect
    $('#Carousel').carousel({
        interval: 3000
    });
    //show book info in category book list
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    );
    
    $('.nav .dropdown').hover(function() {
            $(this).addClass('open');
        }, function() {
            $(this).removeClass('open');
    });
});

function addComment() {
    //if user not login then can't add comment (redirect login page)
    if ($('#CommentUserId').val() == '') {
       window.location.href = "./login";
    }
    else {
        if ($('#CommentContent').val() !== '') {
            $.ajax({
                url: './comments/add',
                type: "POST",
                data: { 
                    user_id : $('#CommentUserId').val(),
                    book_id : $('#CommentBookId').val(),
                    content : $('#CommentContent').val()
                },
                dataType : 'json',
               
                success: function(data) {
                    
                    //remove class show "No Comment"
                    if ($('.no-comment').length > 0) {
                        $('.no-comment').remove();
                    }
                    $('.show-comment').prepend('<div class = "comment">' +
                                                    '<div class = "content-comment" >' + data.user_name + ' : ' + $('#CommentContent').val() + '</div>' +
                                                    '<div class="edit-comment dropdown">' +
                                                        '<div class=" dropdown-toggle" data-toggle="dropdown">' +
                                                            '<span class="caret"></span>' +
                                                        '</div>' + 
                                                        '<ul class="dropdown-menu">' +
                                                            '<li><a href="javascript:void(0)">Edit</a></li>' +
                                                            '<li><a href="javascript:void(0)" onclick = "deleteComment(' + data.id_comment + ')">Delete</a></li>' +
                                                        '</ul>' +
                                                    '</div>' +
                                                '</div>'
                                        ); 
                    //update count comment
                    $('.count-comment').text('Nhận xét : ' + data.count_comment);
                    //clear form after submit
                    $('#CommentContent').val('');

                    //if total comment of current book > 5,show load-more button
                    if ( $('.comment').length > 5) {
                        $('.clearfix').remove();
                        //show 5 comments in page
                        var data = $('.comment').slice(0, 5);
                        $('.show-comment').empty();
                        for (var i=0;i<5;i++) {
                            $('.show-comment').append(data[i]); 
                        }
                        $('.show-comment').append('<div class="clearfix"></div>');
                        //show load-more button when total comment >5
                        if ($('.load-comment').length == 0) {
                            $('.show-comment').append("<div class = 'text-center load-comment' onclick = 'loadMoreComment()'><button> Xem Thêm </button></div>");
                        }
                    } 
                    
                },
          
            });
        }
    }
    
    return false;
}

function loadMoreComment() {

    // each page show 5 comments
    var page = $('.comment').length / 5;
    
    $.ajax({
        url: './comments/loadMoreComment',
        type: "POST",
        data: { 
            page : page,
            book_id : $('#CommentBookId').val()
        },
        dataType : 'json',
       
        success: function(data) {
            
            $('.clearfix').remove();
            //remove button load more before show more comment
            if (data.comment.length >= 0) {
                $('.show-comment button').remove();
            } 
            //show more comment
            $.each( data.comment, function( key, value ) {
                $('.show-comment').append('<div class = "comment">' +
                                                '<div class = "content-comment" >' + value.User.username + ' : ' + value.Comment.content + '</div>' +
                                                '<div class="edit-comment dropdown">' +
                                                    '<div class=" dropdown-toggle" data-toggle="dropdown">' +
                                                        '<span class="caret"></span>' +
                                                    '</div>' + 
                                                    '<ul class="dropdown-menu">' +
                                                        '<li><a href="javascript:void(0)">Edit</a></li>' +
                                                        '<li><a href="javascript:void(0)" onclick = "deleteComment(' + value.Comment.id + ')">Delete</a></li>' +
                                                    '</ul>' +
                                                '</div>' +
                                            '</div>'
                                        );

            });
            $('.show-comment').append('<div class="clearfix"></div>');
            //if comment is still in the database,show button load more
            if (data.comment_remain > 0) {
                $('.show-comment').append("<div class = 'text-center load-comment' onclick = 'loadMoreComment()'><button> Xem Thêm </button></div>");
            } 
        },
  
    }); 
}

function deleteComment(id_comment) {
    
    var id_comment = id_comment;
    $.ajax({
        url: './comments/delete',
        type: "POST",
        data: { 
            id_comment : id_comment,
        },
        dataType : 'json',
       
        success: function(data) {

            
        },
  
    }); 
}