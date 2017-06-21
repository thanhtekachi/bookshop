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
})