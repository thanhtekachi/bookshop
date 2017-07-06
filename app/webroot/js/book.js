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
                console.log(data);
                //remove class show "No Comment"
                if ($('.no-comment').length > 0) {
                    $('.show-comment').empty();
                }
                $('.show-comment').prepend('<p>' + data.user_name + ' : ' + $('#CommentContent').val() + '</p>'); 
                //update count comment
                $('.count-comment').text('Nhận xét : ' + data.count_comment)
                //clear form after submit
                $('#CommentContent').val('');
            },
      
        }); 
    }
    
    return false;
}