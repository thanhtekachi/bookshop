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
       window.location.href = "/bookshop/login";
    }
    else {
        if ($('#CommentContent').val() !== '') {
            $.ajax({
                url: '/bookshop/comments/add',
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
                        $('.show-comment').empty();
                    }
                    $('.show-comment').prepend('<p>' + data.user_name + ' : ' + $('#CommentContent').val() + '</p>'); 
                    
                    //if total comment of current book > 5,show load-more button
                    if ( $('.show-comment p').length > 5) {
                        var data = $('.show-comment p').slice(0, 5);
                        $('.show-comment').empty();
                        for (var i=0;i<5;i++) {
                            $('.show-comment').append(data[i]); 
                        }
                        if ($('.load-comment').length == 0) {
                            $('.show-comment').append('<button class = "load-comment" onclick = "loadMoreComment()""> Xem Thêm </button>');
                        }
                    } 
                    //update count comment
                    $('.count-comment').text('Nhận xét : ' + data.count_comment)
                    //clear form after submit
                    $('#CommentContent').val('');
                    
                },
          
            });
        }
    }
    
    return false;
}

function loadMoreComment() {

    // each page show 5 comments
    var page = $('.show-comment p').length / 5;
    
    $.ajax({
        url: '/bookshop/comments/loadMoreComment',
        type: "POST",
        data: { 
            page : page,
            book_id : $('#CommentBookId').val()
        },
        dataType : 'json',
       
        success: function(data) {
           
            //remove button load more before show more comment
            if (data.comment.length >= 0) {
                $('.show-comment button').remove();
            } 
            //show more comment
            $.each( data.comment, function( key, value ) {
                $('.show-comment').append('<p>' + value.User.username + ' : ' + value.Comment.content + '</p>'); 
            });
            //if comment is still in the database,show button load more
            if (data.comment_remain > 0) {
                $('.show-comment').append('<button class = "load-comment" onclick = "loadMoreComment()""> Xem Thêm </button>');
            } 
        },
  
    }); 
    
}